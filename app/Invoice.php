<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
	protected $fillable = ['title', 'price', 'payment_status', 'user_id', 'restaurant_id', 'adress', 'delivery'];

    public function getPaidAttribute() {
		if ($this->payment_status == 'Invalid') {
			return false;
		}
	return true;
    }
    public function Invoice_rate()
    {
        return $this->hasOne('App\Rate');
    }

}