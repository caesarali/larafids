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
        $schedules = Schedule::where('day', date('N'))->whereHas('flight', function ($query) {
            $query->where('type', 'departure')->orderBy('etd', 'asc');
        })->get();
        $flights = Flight::where('type', 'departure')->whereHas('schedules', function ($query) {
            $query->where('day', date('N'));
        })->orderBy('etd', 'asc')->get();
        $runningtext = RunningText::all()->first();
        return view('departure', compact('schedules', 'runningtext', 'flights'));
    }

    public function arrivals()
    {
        $schedules = Schedule::whereHas('flight', function ($query) {
            $query->where('type', 'arrival');
        })->where('day', date('N'))->get();
        $flights = Flight::where('type', 'arrival')->whereHas('schedules', function ($query) {
            $query->where('day', date('N'));
        })->orderBy('etd', 'asc')->get();
        $runningtext = RunningText::all()->first();
        return view('arrival', compact('schedules', 'runningtext', 'flights'));
    }
}
