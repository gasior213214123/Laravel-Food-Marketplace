<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rate extends Model
{
    protected $fillable = ['rate', 'comment', 'user_id', 'restaurant_id', 'invoice_id' ];


}
