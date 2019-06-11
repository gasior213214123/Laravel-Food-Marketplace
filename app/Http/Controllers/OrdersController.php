<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Invoice;
use App\User;
use App\Restaurant;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($user_id)
    {
        if (intval($user_id) !== Auth::id()) {
            abort(403, 'Brak dostępu do zamówień użytkownika');
        }
        $user = User::findorFail($user_id);

        $orders = $user->invoices;
        return view('orders.index', compact('orders'))->with(compact('user'));
    }
    public function restaurantindex($restaurant_id)
    {
        $restaurant = Restaurant::findorFail($restaurant_id);
        if ($restaurant->worker_id !== Auth::id()) {
            abort(403, 'Brak dostępu do zamowien restauracji');
        }
        $restaurant = Restaurant::findorFail($restaurant_id);
        $orders = $restaurant->restaurant_orders;
        return view('orders.restaurantorders', compact('orders'))->with(compact('restaurant'));
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
    public function update(Request $request, $id)
    {   
        $user = User::findorFail(Auth::id());
        $invoice = Invoice::findorFail($id);
        $restaurant = Restaurant::findorFail($invoice->restaurant_id);
        if ($restaurant->worker_id !== Auth::id() && $user->occupation !== 'Admin') {
            abort(403, 'Brak dostępu do zamowien restauracji');
        }

        $invoice->delivery = $request->confirmed;
        $invoice->save();
        
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
