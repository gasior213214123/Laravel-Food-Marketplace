<?php 

use App\Favourite;
use App\Invoice;
use App\Restaurant;
use App\User;
use App\Dish;
use App\Rate;


function Favourite_restaurants($restaurant_id)
{

	return Favourite::where([
		'user_id' => Auth::id(),
		'restaurant_id' => $restaurant_id,
	])->exists();

}

function User_Orders($user_id)
{

	$invoice[] = Invoice::findorFail([
		'user_id' => $user_id,
	]);
	return $invoice;
}

function Unfinished_Orders(){

        $restaurant = Restaurant::where([
        	'worker_id' => Auth::id()
        ])->first();
        if ($restaurant == null) {
	        return [
	        'name' => null,
	        'restaurant' => null
	        ];
        }
        else 
	        $id = $restaurant->id;
	        $invoice = Invoice::where([
	        	'restaurant_id' => $id
	        ])->get();
	        $delivery_count = 0;
	        foreach ($invoice as $order) {
	            if ($order->payment_status == 'Completed') {
	                if ($order->delivery == 0) {
	                    $delivery_count++;
	                }
	            }
	        }

	        return [
	        'name' => $delivery_count,
	        'restaurant' => $restaurant->id,
	        ];
}

function is_user_worker() {
	$user = User::findorFail(Auth::id());
	if ($user->occupation == 'Worker') {
		return True;
	}
	return False;
}

function user_restaurant() {
	if (is_user_worker() == true) {
		$exist = Restaurant::where([
			'worker_id' => Auth::id(),
		])->exists();
		if ($exist == true) {
			$restaurant = Restaurant::where([
				'worker_id' => Auth::id(),
			])->first(); 
			return $restaurant;
		}
		return false;
	}
}
function invoice_has_rate($invoice_id) {
	$exist = Rate::where([
		'invoice_id' => $invoice_id,
	])->exists();
	if ($exist == true) {
		$get = Rate::where([
			'invoice_id' => $invoice_id,
		])->first();
		$rating = $get->rate;
		return $rating;
	}
	return false;
}

function user_name($user_id) {
	$user = User::where([
		'id' => $user_id,
	])->first();
	$name = $user->name;
	return $name;
}
function restaurant_name($restaurant_id) {
	$restaurant = Restaurant::where([
		'id' => $restaurant_id,
	])->first();

	$restaurant_name = $restaurant->name;
	return $restaurant_name;
}

function restaurant_rate_stats($restaurant_id) {

	$rates = Rate::where([
		'restaurant_id' => $restaurant_id,
	])->get();
	$invoices = Invoice::where([
		'restaurant_id' => $restaurant_id,
	])->get();
	$invoice_count = $invoices->count();
	$count = $rates->count();
	$sum = 0;
	$one_star = 0;
	$two_star = 0;
	$three_star = 0;
	$four_star = 0;
	$five_star = 0;

	foreach ($rates as $rate) {
		$sum = $sum + $rate->rate;
		if ($rate->rate == 1) {
			$one_star++;
		} elseif ($rate->rate == 2) {
			$two_star++;
		} elseif ($rate->rate == 3) {
			$three_star++;
		} elseif ($rate->rate == 4) {
			$four_star++;
		} elseif ($rate->rate == 5) {
			$five_star++;
		}
	}

	if ($sum != 0) {
		$avg_rate = $sum/$count;
		$star_display = round($avg_rate*2) / 2;
		$one_percentage = (($one_star/$count) * 100);
		$two_percentage = (($two_star/$count) * 100);
		$three_percentage = (($three_star/$count) * 100);
		$four_percentage = (($four_star/$count) * 100);
		$five_percentage = (($five_star/$count) * 100);
		$collection = collect([
			0 => ['number' => 1, 'count' => $one_star],
			1 => ['number' => 2, 'count' => $two_star],
			2 => ['number' => 3, 'count' => $three_star],
			3 => ['number' => 4, 'count' => $four_star],
			4 => ['number' => 5, 'count' => $five_star],
		]);
		$max = $collection->where('count', $collection->max('count'))->first();
		$common_rate = $max['number'];

	} elseif ($sum == 0) {
		$avg_rate = -10;
		$star_display = -10;
		$one_percentage = 0;
		$two_percentage = 0;
		$three_percentage = 0;
		$four_percentage = 0;
		$five_percentage = 0;
		$common_rate = 0;
	}	

	$stats = collect([
		'count' => $count, 
		'avg_rate' => $avg_rate, 
		'one_star' => $one_star, 
		'two_star' => $two_star, 
		'three_star' => $three_star, 
		'four_star' => $four_star, 
		'five_star' => $five_star,
		'star_display' => $star_display,  
		'invoice_count' => $invoice_count,  
		'one_percentage' => $one_percentage, 
		'two_percentage' => $two_percentage, 
		'three_percentage' => $three_percentage, 
		'four_percentage' => $four_percentage, 
		'five_percentage' => $five_percentage,
		'common_rate' => $common_rate, 
		'restaurant_id' => $restaurant_id,
	]);

	return $stats;

}
function user_rate_stats($user_id) {

	$rates = Rate::where([
		'user_id' => $user_id,
	])->get();
	$invoices = Invoice::where([
		'user_id' => $user_id,
	])->get();
	$invoice_count = $invoices->count();
	$count = $rates->count();
	$sum = 0;
	$one_star = 0;
	$two_star = 0;
	$three_star = 0;
	$four_star = 0;
	$five_star = 0;

	foreach ($rates as $rate) {
		$sum = $sum + $rate->rate;
		if ($rate->rate == 1) {
			$one_star++;
		} elseif ($rate->rate == 2) {
			$two_star++;
		} elseif ($rate->rate == 3) {
			$three_star++;
		} elseif ($rate->rate == 4) {
			$four_star++;
		} elseif ($rate->rate == 5) {
			$five_star++;
		}
	}

	if ($sum != 0) {
		$avg_rate = $sum/$count;
		$star_display = round($avg_rate*2) / 2;
		$one_percentage = (($one_star/$count) * 100);
		$two_percentage = (($two_star/$count) * 100);
		$three_percentage = (($three_star/$count) * 100);
		$four_percentage = (($four_star/$count) * 100);
		$five_percentage = (($five_star/$count) * 100);
		$collection = collect([
			0 => ['number' => 1, 'count' => $one_star],
			1 => ['number' => 2, 'count' => $two_star],
			2 => ['number' => 3, 'count' => $three_star],
			3 => ['number' => 4, 'count' => $four_star],
			4 => ['number' => 5, 'count' => $five_star],
		]);
		$max = $collection->where('count', $collection->max('count'))->first();
		$common_rate = $max['number'];

	} elseif ($sum == 0) {
		$avg_rate = -10;
		$star_display = -10;
		$one_percentage = 0;
		$two_percentage = 0;
		$three_percentage = 0;
		$four_percentage = 0;
		$five_percentage = 0;
		$common_rate = 0;
	}	

	$stats = collect([
		'count' => $count, 
		'avg_rate' => $avg_rate, 
		'one_star' => $one_star, 
		'two_star' => $two_star, 
		'three_star' => $three_star, 
		'four_star' => $four_star, 
		'five_star' => $five_star,
		'star_display' => $star_display,  
		'invoice_count' => $invoice_count,  
		'one_percentage' => $one_percentage, 
		'two_percentage' => $two_percentage, 
		'three_percentage' => $three_percentage, 
		'four_percentage' => $four_percentage, 
		'five_percentage' => $five_percentage,
		'common_rate' => $common_rate, 
	]);
	return $stats;
}


function user_possible_rates(){

	$invoices = Invoice::where([
		'user_id' => Auth::id(),
	])->get();
	$count = 0;
	foreach ($invoices as $order) {
		if ($order->delivery == 1) {
			if (invoice_has_rate($order->id) == false) {
				$count++;
			}
		}
	}
	if ($count == 0) {
		return null;
	}
	return $count;
}

function dishes_category($restaurant_id){
	$restaurant = Restaurant::findorFail($restaurant_id);
	$dishes = $restaurant->restaurant_dishes;
	if ($dishes->count() == 0) {
		return null;
	}
	else {
		foreach ($dishes as $dish) {
			$categories[] = $dish->category;
		}
		$array = array_unique($categories);
		$results = collect($array)->values();
		
		return $results;
	}
}

function find_user($user_id) {

	$user = User::findorFail($user_id);

	return $user;

}

function have_restaurant_dishes($restaurant_id) {

	$dishes = Dish::where([
		'restaurant_id' => $restaurant_id,
	])->exists();

	return $dishes;
}
