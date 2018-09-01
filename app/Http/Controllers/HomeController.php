<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Schedule;
use App\Status;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function controlPanel()
    {
        $status = new Status;
        $statList = $status->list;
        $d = $request->d ?? null;
        $a = $request->a ?? null;

        if ($d == 'all') {
            $departures = Schedule::whereHas('flight', function ($query) {
                $query->where('type', 'departure');
            })->orderBy('day', 'asc')->get();
        }
        else {
            $departures = Schedule::whereHas('flight', function ($query) {
                $query->where('type', 'departure');
            })->where('day', date('N'))->get();
        }

        if ($a == 'all') {
            $arrivals = Schedule::whereHas('flight', function ($query) {
                $query->where('type', 'arrival');
            })->orderBy('day', 'asc')->get();
        }
        else {
            $arrivals = Schedule::whereHas('flight', function ($query) {
                $query->where('type', 'arrival');
            })->where('day', date('N'))->get();
        }

        return view('admin.index', compact('departures', 'arrivals', 'd', 'a', 'statList'));
    }
}
