<?php

use Illuminate\Support\Facades\Route;

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
})->name('index');

Route::get('/checkout', function () {
	return view('endCheckout');
})->name('checkout');

Auth::routes();

Route::middleware('auth')->namespace('User')->prefix('user')->name('user.')->group(function(){
	Route::get('/users/home', 'HomeController@index')->name('home');
	Route::get('/graphs', 'UserPageController@graphs')->name('graphs');
	Route::get('/profile', 'UserPageController@profile')->name('profile');

	Route::resource('/restaurant', 'RestaurantController');

	Route::resource('/dish', 'DishController');
});


Route::get('/payment', function () {
	return view('payment');
})->name('payment');

Route::get('/guests/restaurant', function () {
	return view('/guests/restaurant');
})->name('restaurant');
