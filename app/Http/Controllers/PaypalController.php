<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Srmklive\PayPal\Services\ExpressCheckout;
use App\Invoice;
use App\Restaurant;
use Illuminate\Support\Facades\Auth;
use Cart;
use Carbon\Carbon;


class PaypalController extends Controller
{

  protected $provider;

  public function __construct() {
      $this->provider = new ExpressCheckout();
  }

  public function expressCheckout(Request $request) {
    // check if payment is recurring
    $recurring = $request->input('recurring', false) ? true : false;

    // get new invoice id
    $invoice_id = Invoice::count() + 1;
        
    // Get the cart data
    $cart = $this->getCart($recurring, $invoice_id);
    $adress = $request->adress;
    $info = $request->info;
    $city = $request->city;
    $phone = $request->phone;
    $email = $request->email;
    $cartitems =  Cart::content();
    foreach ($cartitems as $item) {
        $restaurant = $item->options->restaurant_id;
    }
    //dd($cart);
    // create new invoice
    $invoice = new Invoice();
    $invoice->title = $cart['invoice_description'];
    $invoice->price = $cart['total'];
    $invoice->user_id = Auth::id();
    $invoice->restaurant_id = $restaurant;
    $invoice->adress = $adress;
    $invoice->city = $city;
    $invoice->phone = $phone;
    $invoice->email = $email;
    $invoice->info = $info;
    $invoice->price = $cart['total'];
    $invoice->save();

    // send a request to paypal 
    // paypal should respond with an array of data
    // the array should contain a link to paypal's payment system
    $response = $this->provider->setExpressCheckout($cart, $recurring);
    //dd($response);
    // if there is no link redirect back with error message
    if (!$response['paypal_link']) {
      return redirect('/status/' . $invoice->id)->with(['code' => 'danger', 'message' => 'Something went wrong with PayPal']);
      // For the actual error message dump out $response and see what's in there
    }

    // redirect to paypal
    // after payment is done paypal
    // will redirect us back to $this->expressCheckoutSuccess
    return redirect($response['paypal_link']);
  }
 

  private function getCart($recurring, $invoice_id)
      {

        $cartitems =  Cart::content();
        $totalprice = Cart::subtotal();
        foreach ($cartitems as $item) {
            $cart[] = array('name' => $item->name, 'price' => $item->price, 'qty' => $item->qty);
            $restaurant_q = $item->options->restaurant_id;
            $order_name[] = array('name' => $item->name, 'qty' => $item->qty);
        }
        $restaurant = Restaurant::FindOrFail($restaurant_q);
        $name = $restaurant->name; 

        $array = array_column($order_name, 'qty', 'name');
        $arrayname = json_encode($array);
        $descriptionname = str_replace(array('"', '{', '}'), "", $arrayname);
        $carbon = new Carbon(); 
          if ($recurring) {
              return [
                  // if payment is recurring cart needs only one item
                  // with name, price and quantity
                  'items' => [
                      [
                          'name' => 'Monthly Subscription ' . config('paypal.invoice_prefix') . ' #' . $invoice_id,
                          'price' => 20,
                          'qty' => 1,
                      ],
                  ],

                  // return url is the url where PayPal returns after user confirmed the payment
                  'return_url' => url('/paypal/express-checkout-success?recurring=1'),
                  'subscription_desc' => 'Monthly Subscription ' . config('paypal.invoice_prefix') . ' #' . $invoice_id,
                  // every invoice id must be unique, else you'll get an error from paypal
                  'invoice_id' => config('paypal.invoice_prefix') . '_' . $invoice_id,
                  'invoice_description' => "Order #". $invoice_id ." Invoice",
                  'cancel_url' => url('/status'),
                  // total is calculated by multiplying price with quantity of all cart items and then adding them up
                  // in this case total is 20 because price is 20 and quantity is 1
                  'total' => $totalprice, // Total price of the cart
              ];
          }

          return [
              // if payment is not recurring cart can have many items
              // with name, price and quantity
              'items' => $cart,
              // return url is the url where PayPal returns after user confirmed the payment
              'return_url' => url('/paypal/express-checkout-success'),
              // every invoice id must be unique, else you'll get an error from paypal
              'invoice_id' => $carbon . '_' . $invoice_id,
              'invoice_description' => $descriptionname . " w restauracji " . $name,
              //'invoice_description' => "Order #". $invoice_id ." Invoice",
              'cancel_url' => url('/status'),
              // total is calculated by multiplying price with quantity of all cart items and then adding them up
              // in this case total is 20 because Product 1 costs 10 (price 10 * quantity 1) and Product 2 costs 10 (price 5 * quantity 2)
              'total' => $totalprice,
          ];
      }

public function expressCheckoutSuccess(Request $request) {

        // check if payment is recurring
        $recurring = $request->input('recurring', false) ? true : false;

        $token = $request->get('token');

        $PayerID = $request->get('PayerID');

        // initaly we paypal redirects us back with a token
        // but doesn't provice us any additional data
        // so we use getExpressCheckoutDetails($token)
        // to get the payment details
        $response = $this->provider->getExpressCheckoutDetails($token);
        
        // if response ACK value is not SUCCESS or SUCCESSWITHWARNING
        // we return back with error
        if (!in_array(strtoupper($response['ACK']), ['SUCCESS', 'SUCCESSWITHWARNING'])) {
            return redirect('/status')->with(['code' => 'danger', 'message' => 'Error processing PayPal payment']);
        }

        // invoice id is stored in INVNUM
        // because we set our invoice to be xxxx_id
        // we need to explode the string and get the second element of array
        // witch will be the id of the invoice
        $invoice_id = explode('_', $response['INVNUM'])[1];

        // get cart data
        $cart = $this->getCart($recurring, $invoice_id);

        // check if our payment is recurring
        if ($recurring === true) {
            
            // if recurring then we need to create the subscription
            // you can create monthly or yearly subscriptions
            $response = $this->provider->createMonthlySubscription($response['TOKEN'], $response['AMT'], $cart['subscription_desc']);
            
            $status = 'Invalid';
            // if after creating the subscription paypal responds with activeprofile or pendingprofile
            // we are good to go and we can set the status to Processed, else status stays Invalid
            if (!empty($response['PROFILESTATUS']) && in_array($response['PROFILESTATUS'], ['ActiveProfile', 'PendingProfile'])) {
                $status = 'Processed';
            }

        } else {

            // if payment is not recurring just perform transaction on PayPal
            // and get the payment status
            $payment_status = $this->provider->doExpressCheckoutPayment($cart, $token, $PayerID);
            $status = $payment_status['PAYMENTINFO_0_PAYMENTSTATUS'];

        }

        // find invoice by id
        $invoice = Invoice::find($invoice_id);

        // set invoice status
        $invoice->payment_status = $status;

        // if payment is recurring lets set a recurring id for latter use
        if ($recurring === true) {
            $invoice->recurring_id = $response['PROFILEID'];
        }

        // save the invoice
        $invoice->save();

        // App\Invoice has a paid attribute that returns true or false based on payment status
        // so if paid is false return with error, else return with success message
        if ($invoice->paid) {
            return redirect('/status/' . $invoice->id)->with(['code' => 'success', 'message' => 'Zamówienie nr ' . $invoice->id . ' zostało zapłacone pomyślnie!']);
        }
        
        return redirect('/status/' . $invoice->id)->with(['code' => 'danger', 'message' => 'Error processing PayPal payment for Order ' . $invoice->id . '!']);
    }

}

