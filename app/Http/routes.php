<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'ViewController@showHome');

Route::get('reservations', 'ReservationController@show');
Route::get('reservations/create', 'ReservationController@create');
Route::get('reservations/delete/{id}', 'ReservationController@delete');
Route::post('reservations/update/{id}/{col}', 'ReservationController@update');
Route::post('reservations', 'ReservationController@store');

Route::get('hotels', 'HotelController@show');
Route::get('hotels/create', 'HotelController@create');
Route::get('hotels/delete/{id}', 'HotelController@delete');
Route::post('hotels/update/{id}/{col}', 'HotelController@update');
Route::post('hotels', 'HotelController@store');

Route::get('users', 'UserController@show');
Route::get('users/create', 'UserController@create');
Route::get('users/delete/{id}', 'UserController@delete');
Route::post('users/update/{id}/{col}', 'UserController@update');
Route::post('users', 'UserController@store');

Route::get('search', 'SearchController@show');
Route::post('search', 'SearchController@find');


Route::get('/contact', 'ViewController@showContact');
Route::post('/contact', 'ViewController@storeContact');

Route::get('/admin', 'ViewController@showAdmin');

Route::get('/deny', 'ViewController@showDeny');

Route::get('/login', array('uses' => 'ViewController@showLogin'));
Route::post('/login', array('uses' => 'ViewController@doLogin'));

Route::get('/logout', array('uses' => 'ViewController@doLogout'));
