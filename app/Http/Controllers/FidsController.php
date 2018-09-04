<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Schedule;
use App\RunningText;

class FidsController extends Controller
{
    public function departures()
    {
        $schedules = Schedule::where('day', date('N'))->whereHas('flight', function ($query) {
            return $query->where('type', 'departure')->orderBy('etd', 'asc');
        })->get();
        $runningtext = RunningText::all()->first();
        return view('departure', compact('schedules', 'runningtext'));
    }

    public function arrivals()
    {
        $schedules = Schedule::whereHas('flight', function ($query) {
            $query->where('type', 'arrival');
        })->where('day', date('N'))->get();
        $runningtext = RunningText::all()->first();
        return view('arrival', compact('schedules', 'runningtext'));
    }
}
