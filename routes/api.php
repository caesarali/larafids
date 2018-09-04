<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/departures', 'FidsController@departures');
Route::get('/arrivals', 'FidsController@arrivals');
Route::get('/runningtext', function () {
    $runningtext = App\RunningText::all()->first();
    $runningtext = [
        'text' => $runningtext->text,
        'lastUpdate' => $runningtext->updated_at
    ];
    return response()->json($runningtext);
});