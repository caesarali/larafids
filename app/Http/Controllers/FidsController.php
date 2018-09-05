<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Schedule;
use App\Flight;
use App\RunningText;

class FidsController extends Controller
{
    public function departures()
    {
        // $flights = Flight::where('type', 'departure')->whereHas('schedules', function ($query) {
        //     $query->where('day', date('N'));
        // })->orderBy('etd', 'asc')->get();
        // $runningtext = RunningText::all()->first();

        // return view('departure', compact('runningtext', 'flights'));
        return view('departure');
    }

    public function arrivals()
    {
        // $flights = Flight::where('type', 'arrival')->whereHas('schedules', function ($query) {
        //     $query->where('day', date('N'));
        // })->orderBy('etd', 'asc')->get();
        // $runningtext = RunningText::all()->first();

        // return view('arrival', compact('runningtext', 'flights'));
        return view('arrival');
    }
}
