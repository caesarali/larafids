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

Route::namespace('Auth')->group(function () {
    Route::get('/login', 'LoginController@showLoginForm')->middleware('guest')->name('login');
    Route::post('/login', 'LoginController@login')->middleware('guest');
    Route::post('/logout', 'LoginController@logout')->name('logout');
});

Route::get('/home', 'HomeController@index')->name('home');
Route::get('control-panel', 'HomeController@controlPanel')->name('control-panel');

Route::middleware('auth')->group(function () {
    Route::namespace('Master')->group(function () {
        Route::resource('airlines', 'AirlineController')->except(['create', 'show']);
        Route::resource('regions', 'RegionController')->except(['create', 'show']);
        Route::post('regions/{region}/set-default', 'RegionController@setDefault')->name('regions.setDefault');
    });

    Route::get('flights/{type}', 'FlightController@index')->name('flights.index');
    Route::get('flights/{type}/create', 'FlightController@create')->name('flights.create');
    Route::post('flights/{type}', 'FlightController@store')->name('flights.store');
    Route::get('flights/{flight}/edit', 'FlightController@edit')->name('flights.edit');
    Route::patch('flights/{flight}', 'FlightController@update')->name('flights.update');
    Route::delete('flights/{flight}', 'FlightController@destroy')->name('flights.destroy');

    Route::delete('schedule/{schedule}', 'ScheduleController@destroy')->name('schedule.destroy');
    Route::post('{schedule}/remark', 'ScheduleController@remark')->name('schedule.remark');

    Route::resource('running-text', 'RunningTextController')->only(['index', 'update']);
});
