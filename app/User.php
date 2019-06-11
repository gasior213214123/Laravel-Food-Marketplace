<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'occupation', 'phone', 'adress', 'city', 'email_token'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function favourites()
    {
        return $this->belongsToMany('App\Restaurant', 'favourites', 'user_id', 'restaurant_id');
    }

    public function orders()
    {
        return $this->belongsToMany('App\Restaurant', 'invoices', 'user_id', 'restaurant_id');
    }
    public function invoices()
    {
        return $this->hasMany('App\Invoice');
    }
    public function rates()
    {
        return $this->hasMany('App\Rate');
    }
    
}
