<?php

use Illuminate\Http\Request;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/departures', function () {
    $flights = App\Flight::where('type', 'departure')->whereHas('schedules', function ($query) {
        $query->where('day', date('N'));
    })->orderBy('etd', 'asc')->get();

    $flights->load(['airline', 'destination', 'schedule.remark']);

    return response()->json($flights);
});

Route::get('/arrivals', function () {
    $flights = App\Flight::where('type', 'arrival')->whereHas('schedules', function ($query) {
        $query->where('day', date('N'));
    })->orderBy('eta', 'asc')->get();

    $flights->load(['airline', 'origin', 'schedule.remark']);

    return response()->json($flights);
});

Route::get('/runningtext', function () {
    $runningtext = App\RunningText::all()->first();
    $runningtext = [
        'text' => $runningtext->text,
        'lastUpdate' => $runningtext->updated_at
    ];
    return response()->json($runningtext);
});