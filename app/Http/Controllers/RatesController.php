<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Invoice;
use App\Rate;
use App\User;
use App\Restaurant;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class RatesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function ranking()
    {
        $restaurants = Restaurant::all();
        foreach ($restaurants as $restaurant) {
            $stats = restaurant_rate_stats($restaurant->id);
            $array[] = array(
                    'name' => $restaurant->name,
                    'city' => $restaurant->city,
                    'id' => $restaurant->id,
                    'type' => $restaurant->type,
                    'star_display' => $stats->get('star_display'), 
                    'avg_rate' => $stats->get('avg_rate'), 
                    'count' => $stats->get('count')
            );
        }
        $collection = collect($array);
        $sort = $collection->sortBy('avg_rate')->reverse()->values();
        //dd($sort);
        return view('rates.ranking', compact('sort'));   
    }
    public function restaurant_rates_index($restaurant_id)
    {
        $rates = Rate::where([
            'restaurant_id' => $restaurant_id,
        ])->get();
        $restaurant = Restaurant::where([
            'id' => $restaurant_id,
        ])->first();
        return view('restaurants.rates', compact('rates'))->with(compact('restaurant'));
    }
    public function user_rates_index($user_id)
    {
        $rates = Rate::where([
            'user_id' => $user_id,
        ])->get();
        $user = User::findorFail($user_id);

        return view('users.rates', compact('rates'))->with(compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $invoice = Invoice::findorFail($id);

        return view('rates.create', compact('invoice'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'comment' => 'required|string|min:5|max:500',
        ]);
        if (invoice_has_rate($request->invoice_id) == true) {
            abort(403, 'Zamówienie ma już ocene');   
        } 

        Rate::create([
            'user_id' => $request->user_id,
            'restaurant_id' => $request->restaurant_id,
            'invoice_id' => $request->invoice_id,
            'rate' => $request->rate,
            'comment' => $request->comment,
        ]);

        return back()->with(['code' => 'success', 'message' => 'Sukces']);
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
        $rate = Rate::FindOrFail($id);

        $admin = User::FindOrFail(Auth::id());

        if ($admin->occupation == 'Admin') {
            Rate::where([
                'id' => $id
            ])->delete();

            return back();
        }
        else {
            abort(403, 'Tylko administrator i pracownik restauracji może usuwać restauracje');
        }

    }
}
