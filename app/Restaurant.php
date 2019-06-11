<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
 	protected $table = 'restaurants';

    protected $fillable = ['name','type','city','open_from', 'open_till', 'avg_wait', 'adress', 'description', 'avatar', 'worker_id'];

    public function restaurant_dishes()
    {
        return $this->hasMany('App\Dish', 'restaurant_id');
    }
    public function restaurant_orders()
    {
        return $this->hasMany('App\Invoice');
    }
    public function restaurant_rates()
    {
        return $this->hasMany('App\Rate');
    }
}
