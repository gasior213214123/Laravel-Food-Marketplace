<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Cart;
use App\Dish;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cart =  Cart::content();

        
        /*$cartitems =  Cart::content();
        foreach ($cartitems as $item) {
            $cart[] = array('name' => $item->name, 'price' => $item->price, 'quantity' => $item->qty, 'restaurant_id' => $item->options->restaurant_id );
        }
        dd($cart);
        */

        return view('cart.cart', compact('cart'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update() {

        $rowId = Input::get('rowId');
        $quantity = Input::get('qty');

        Cart::update($rowId, $quantity);

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        Cart::destroy();

        return back();
    }


    //==============================CART FUNCTION==========================================//
    public function cart(Request $request) {
        $id = $request->product_id;
        $product = Dish::find($id);
        $cartitems =  Cart::content();
        //dd($cartitems);
        $a=0;
        foreach ($cartitems as $item) {
            if ($item->options->restaurant_id == $product->restaurant_id) {
                $a++;
            }
        }

        if ($cartitems->count() == $a) {
            $CartItem = Cart::add([
                'id' => $product->id,
                'name' => $product->name,
                'qty' => 1,
                'price' => $product->price, 
                'options' => ['restaurant_id' => $product->restaurant_id]
            ]);

            return \Redirect::back()->with(['code' => 'success', 'message' => 'Dodano produkt do koszyka']);

        } else { 
            return \Redirect::back()->with(['code' => 'danger', 'message' => 'Nie można dodać produktów z różnych restauracji']);
        }
    }

    public function increment($id, $qty) {

        $rowId = $id;
        $int = intval($qty);
        $increment = $int + 1;
        Cart::update($rowId, $increment);

        return back();
    }

    public function decrement($id, $qty) {

        $rowId = $id;
        $int = intval($qty);
        $decrement = $int - 1;
        Cart::update($rowId, $decrement);

        return back();
    }

    public function remove($id) {

        $rowId = $id;
        Cart::remove($rowId);

        return back();
    }

}
