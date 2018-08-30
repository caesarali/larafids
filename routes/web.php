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

Route::get('/departures', 'FidsController@departures')->name('departures');
Route::get('/arrivals', 'FidsController@arrivals')->name('arrivals');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::middleware('auth')->group(function () {
    Route::namespace('Master')->group(function () {
        Route::resource('airlines', 'AirlineController');
        Route::resource('regions', 'RegionController');
    });


    Route::get('control-panel', 'FlightController@index')->name('control-panel');
    Route::get('flight/{type}/create', 'FlightController@create')->name('flight.create');
    Route::post('flight/{type}', 'FlightController@store')->name('flight.store');
});
