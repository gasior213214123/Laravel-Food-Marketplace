<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/search', 'SearchController@restaurants');
Route::get('/citysearch', 'SearchController@citysearch');

Route::resource('/users', 'UsersController', ['except' => ['index', 'store', 'create', 'destroy']]);
Route::delete('/users/{user}/delete', 'UsersController@delete');

Route::get('/restaurant-avatar/{id}/{size}', 'ImagesController@restaurant_avatar');

Route::resource('/restaurants', 'RestaurantsController');
Route::get('restaurants/{id}/info', 'RestaurantsController@info');

Route::get('users/{user}/favourites', 'FavouritesController@index');
Route::post('/favourites/{favourite}', 'FavouritesController@add');
Route::delete('/favourites/{favourite}', 'FavouritesController@delete');



Route::get('/restaurants/{restaurant_id}/dishes', 'DishesController@index');


Route::post('/restaurants/dishes/{id}/store', 'DishesController@store');
Route::get('/restaurants/dishes/{id}/edit', 'DishesController@edit');
Route::patch('/restaurants/dishes/{id}/update', 'DishesController@update');
Route::delete('/restaurants/dishes/{id}/destroy', 'DishesController@destroy');

Route::get('/cart', 'CartController@index');
Route::post('/cart/add', 'CartController@cart');
Route::get('/cart/{id}/increment/{qty}', 'CartController@increment');
Route::get('/cart/{id}/decrement/{qty}', 'CartController@decrement');
Route::get('/cart/edit', 'CartController@update');
Route::get('/cart/{id}/remove', 'CartController@remove');
Route::get('/cart/destroy', 'CartController@destroy');

Route::get('/verifyemail/{token}', 'Auth\RegisterController@verify');



Route::get('paypal/express-checkout', 'PaypalController@expressCheckout')->name('paypal.express-checkout');
Route::get('paypal/express-checkout-success', 'PaypalController@expressCheckoutSuccess');
Route::post('paypal/notify', 'PaypalController@notify');


Route::resource('/status', 'StatusController');

Route::get('users/{user}/orders', 'OrdersController@index');
Route::get('restaurants/{restaurant}/orders', 'OrdersController@restaurantindex');
Route::patch('orders/{order}/delivered', 'OrdersController@update');

Route::resource('/admin/dashboard', 'AdminController');

Route::get('/orders/{order}/rate/create', 'RatesController@create');
Route::post('/rates/store', 'RatesController@store');
Route::delete('/rates/{rate}', 'RatesController@destroy');
Route::get('/restaurants/{restaurant}/rates', 'RatesController@restaurant_rates_index');
Route::get('/users/{user}/rates', 'RatesController@user_rates_index');
Route::get('/rates/ranking', 'RatesController@ranking');