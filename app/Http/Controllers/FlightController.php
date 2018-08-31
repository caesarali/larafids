<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Region;
use App\Airline;
use App\Flight;
use App\Schedule;
use Carbon\Carbon;

class FlightController extends Controller
{
    public function index(Request $request)
    {
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

        return view('admin.flight.index', compact('departures', 'arrivals', 'd', 'a'));
    }

    public function create($type)
    {
        $routes = Region::all();
        $airlines = Airline::all();
        return view('admin.flight.create', compact('type', 'routes', 'airlines'));
    }

    public function store(Request $request, $type)
    {
        $request->request->add(['type' => $type]);
        $flight = Flight::create($request->all());
        foreach ($request->days as $day) {
            Schedule::create([
                'flight_id' => $flight->id,
                'day' => $day
            ]);
        }
        return redirect()->route('control-panel')->with([
            'alert' => 'swal',
            'header' => 'Success!',
            'text' => 'Flight schedule has been created.',
            'type' => 'success'
        ]);
    }

    public function edit(Flight $flight)
    {
        $routes = Region::all();
        $airlines = Airline::all();
        return view('admin.flight.edit', compact('flight', 'routes', 'airlines'));
    }

    public function update(Request $request, Flight $flight)
    {
        $flight->update($request->all());
        foreach ($flight->schedules as $schedule) {
            $schedule->delete();
        }
        foreach ($request->days as $day) {
            Schedule::create([
                'flight_id' => $flight->id,
                'day' => $day
            ]);
        }

        return redirect()->back()->with([
            'alert' => 'swal',
            'header' => 'Success!',
            'text' => 'Flight schedule has been updated.',
            'type' => 'success'
        ]);
    }

    public function destroy(Flight $flight)
    {
        $flight->delete();
        return redirect()->back()->with([
            'alert' => 'swal',
            'header' => 'Success!',
            'text' => 'Flight schedule has been deleted.',
            'type' => 'success'
        ]);
    }
}
