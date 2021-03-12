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
});

Auth::routes();

Route::middleware('auth')->namespace('User')->prefix('user')->name('user.')->group(function(){

  Route::get('/home', 'HomeController@index')->name('home');
  Route::get('/graphs', 'UserPageController@graphs')->name('graphs');
  Route::get('/profile', 'UserPageController@profile')->name('profile');

  Route::resource('/dish', 'DishController');
});




Route::middleware('guest:admin')->namespace('Auth')->prefix('admin')->name('admin.')->group(function(){

  Route::get('/login', 'AdminLoginController@showLoginForm')->name('login');
  Route::post('/login', 'AdminLoginController@login')->name('login.submit');

});
Route::get('/admin', 'AdminController@index')->name('admin')->middleware('auth:admin');
