<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Favourite;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Restaurant;

class FavouritesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($user_id)
    {
        if (intval($user_id) !== Auth::id()) {
            abort(403, 'Brak dostępu do ulubionych restauracji użytkownika');
        }
        $user = User::findOrFail($user_id);
        $favourites = User::findOrFail($user_id)->favourites;
        return view('favourites.index', compact('favourites'))->with(compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function add($restaurant_id)
    {
        if ( ! Favourite_restaurants($restaurant_id)) {
            Favourite::create([
                'user_id' => Auth::id(),
                'restaurant_id' => $restaurant_id,
            ]);
        }

        return back();
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($restaurant_id)
    {
            Favourite::where([
                'user_id' => Auth::id(),
                'restaurant_id' => $restaurant_id,
            ])->delete();

        return back();
    }
}
