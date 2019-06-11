<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Invoice;
use App\Restaurant;
use Cart;
use Session;
use Carbon\Carbon;

class StatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

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
        if (Session::get('code') == 'success') {
            Cart::destroy();
            $invoice = Invoice::findorFail($id);
            $restaurant = Restaurant::findorFail($invoice->restaurant_id);
            $date = Carbon::now('Europe/Warsaw')->format('G:i');
            $newdate = Carbon::now('Europe/Warsaw')->addMinutes($restaurant->avg_wait)->format('G:i');
            //$delivery_time = ($newdate->hour . ':' . $newdate->minute);
            //$order_time = ($date->hour . ':' . $date->minute);
            return view('status')->with([
                'delivery_time' => $newdate, 
                'order_time' => $date, 
                'restaurant_name' => $restaurant->name,
                'name' => $invoice->title,
                'invoice_id' => $id,
                'user_id' => $invoice->user_id]);
        }
	else {
		return view('status');
	}
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
        //
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
