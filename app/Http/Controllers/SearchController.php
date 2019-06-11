<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Restaurant;
use App\Rate;

class SearchController extends Controller
{
    public function restaurants()
    {
        $type = Input::get('type');
        $search_phrase = Input::get('q');
        $city = Input::get('city');
        $star = Input::get('star');
        $wait = Input::get('wait_time');
        $wait_time = intval($wait);


        $results = Restaurant::wherein('type', $type)
            ->where('name', 'like', '%' . $search_phrase . '%')
            ->where('city', $city)
            ->where('avg_wait', '<=', $wait_time)->get();
        if ($results->count() == null) {
            $search_results = null;
        }
        else {
            foreach ($results as $rst) {
                $rates = restaurant_rate_stats($rst->id);
                if ($rates['avg_rate'] > $star || $rates['avg_rate'] = $star) {
                    $id[] = $rates['restaurant_id'];
                }
            }
	    if (isset($id)) {
            foreach ($id as $restaurant) {
                $s_results[] = Restaurant::findorFail($restaurant);
            }
            $search_results = collect($s_results);
	    }
	    else {
		$search_results = null;
	    }
        }


        return view('search.search', compact('search_results'));
    }
    public function citysearch()
    {
        $adress = Input::get('adress');
        $city = explode(', ', $adress);
        $search_results = Restaurant::wherein('city', $city)->get();
        
        return view('search.search', compact('search_results'));
    }
}
