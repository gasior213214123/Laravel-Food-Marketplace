<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Restaurant;
use Intervention\Image\Facades\Image;

class ImagesController extends Controller
{
    public function restaurant_avatar($id, $size)
    {
        $restaurant = Restaurant::findOrFail($id);
        if (is_null($restaurant->avatar)) {
            $img = Image::make('storage/site/no_logo_restaurant.png')->fit($size)->response('jpg', 90);
        } elseif (strpos($restaurant->avatar, 'http') !== false) {
            $img = Image::make($restaurant->avatar)->fit($size)->response('jpg', 90);
        } else {
            $avatar_path = asset('storage/restaurants/' . $id . '/avatars/' . $restaurant->avatar);
            $img = Image::make($avatar_path)->fit($size)->response('jpg', 90);
        }
        return $img;
    }
}
