<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Flight;
use App\Schedule;

class FidsController extends Controller
{
    public function departures()
    {
        $schedules = Schedule::where('day', date('N'))->whereHas('flight', function ($query) {
            return $query->where('type', 'departure')->orderBy('etd', 'asc');
        })->get();
        return view('departure', compact('schedules'));
    }

    public function arrivals()
    {
        $schedules = Schedule::whereHas('flight', function ($query) {
            $query->where('type', 'arrival');
        })->where('day', date('N'))->get();
        return view('arrival', compact('schedules'));
    }
}
