<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Restaurant;
use App\Dish;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class DishesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($restaurant_id)
    {
        $restaurant = Restaurant::findOrFail($restaurant_id);

        if ($restaurant->worker_id !== Auth::id()) {
            abort(403, 'Brak dostępu do educji restauracji');
        }
        return view('dishes.index', compact('restaurant'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($restaurant_id)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $restaurant_id)
    {
        $restaurant = Restaurant::findOrFail($restaurant_id);

        if ($restaurant->worker_id !== Auth::id()) {
            abort(403, 'Brak dostępu do menu');
        }

        $this->validate($request, [
            'name' => 'required|string|max:255',
            'price' => 'required|integer',
            'category' => 'required|string|max:255',
            'description' => 'required|string|max:500',
        ]);


        Dish::create([
            'restaurant_id' => $restaurant->id,
            'name' => $request->name,
            'price' => $request->price,
            'category' => $request->category,
            'description' => $request->description,
        ]);

        return back();
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
    public function edit($dish_id)
    {
        $dish = Dish::findOrFail($dish_id); 

        return view('dishes.edit', compact('dish'));
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
            'price' => 'required|integer',
            'category' => 'required|string|max:255',
            'description' => 'required|string|max:500',
        ]);

        $dish = Dish::findOrFail($id);
        $dish->name = $request->name;
        $dish->price = $request->price;
        $dish->category = $request->category;
        $dish->description = $request->description;
        $dish->save();
        
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
        Dish::where([
            'id' => $id,
        ])->delete();

        return back();
    }
}
