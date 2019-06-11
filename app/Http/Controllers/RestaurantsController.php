<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Dishes;
use App\Restaurant;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class RestaurantsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $restaurant = Restaurant::all();
        return view('home', compact('restaurant'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        if (is_user_worker() == True) {
            if (user_restaurant() == false) {
                return view('restaurants.create');
            }
        }
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
            'name' => 'required|string|max:255',
            'city' => 'required|string',
            'open_from' => 'date_format:H:i',
            'open_till' => 'date_format:H:i',
            'avg_wait' => 'required|integer',
            'adress' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'type' => 'required|string|max:255',
        ]);

        if (is_user_worker() == True) {
            if (user_restaurant() == false) {
                Restaurant::create([
                    'name' => $request->name,
                    'city' => $request->city,
                    'open_from' => $request->open_from,
                    'open_till' => $request->open_till,
                    'avg_wait' => $request->avg_wait,
                    'adress' => $request->adress,
                    'description' => $request->description,
                    'type' => $request->type,
                    'worker_id' => Auth::id(),
                ]);

                $restaurant = Restaurant::where([
                    'worker_id' => Auth::id(),
                ])->first();

                return redirect('/restaurants/' . $restaurant->id);
            }
        }


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $restaurant = Restaurant::FindOrFail($id);  
        $delivery_count = 0;
        foreach ($restaurant->restaurant_orders as $order) {
            if ($order->payment_status == 'Completed') {
                if ($order->delivery == 0) {
                    $delivery_count++;
                }
            }
        }
        return view('restaurants.show', compact('restaurant'))->with(['number' => $delivery_count]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    { 
        $restaurant = Restaurant::FindOrFail($id);     

        if ($restaurant->worker_id !== Auth::id()) {
            abort(403, 'Uzytkownik nie ma dostępu do edycji restauracji');
        }

        return view('restaurants.edit', compact('restaurant'));
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
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'city' => 'required|string',
            'open_from' => 'date_format:H:i',
            'open_till' => 'date_format:H:i',
            'avg_wait' => 'required|integer',
            'adress' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'type' => 'required|string|max:255',
        ]);

        $restaurant = Restaurant::find($id);
        $restaurant->name = $request->name;
	$restaurant->city = $request->city;
	$restaurant->open_from = $request->open_from;
	$restaurant->open_till = $request->open_till;
	$restaurant->adress = $request->adress;
	$restaurant->description = $request->description;
	$restaurant->type = $request->type;
	$restaurant->avg_wait = $request->avg_wait;

        if ($request->file('avatar')) {
            $restaurant_avatar_path = 'public/restaurants/' . $id . '/avatars';
            $upload_path = $request->file('avatar')->store($restaurant_avatar_path);
            $avatar_filename = str_replace($restaurant_avatar_path . '/', '', $upload_path);
            $restaurant->avatar = $avatar_filename;
        }
        
        $restaurant->save();

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
        $restaurant = Restaurant::FindOrFail($id);
        $admin = User::FindOrFail(Auth::id());

        if ($admin->occupation == 'Admin') {
            Restaurant::where([
                'id' => $id
            ])->delete();

            return back();
        }
        elseif ($restaurant->worker_id == Auth::id()) {
            Restaurant::where([
                'id' => $id
            ])->delete();

            return back();
        }

        abort(403, 'Tylko administrator i pracownik restauracji może usuwać restauracje');
    }

    public function info($id){

        $restaurant = Restaurant::findorFail($id);

        return view('restaurants.info', compact('restaurant'));

    }
}
