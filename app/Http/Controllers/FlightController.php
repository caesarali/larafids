<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Region;
use App\Airline;
use App\Flight;
use App\Schedule;
use App\Status;
use App\DefaultLocation;
use Carbon\Carbon;

class FlightController extends Controller
{
    public function index(Request $request, $type)
    {
        $status = new Status;
        $statList = $status->list;
        $f = $request->f ?? null;

        $schedules = Schedule::whereHas('flight', function ($query) use ($type) {
            $query->where('type', $type);
        });

        if ($f == 'all') {
            $schedules = $schedules->orderBy('day', 'asc')->get();
        } else {
            $schedules = $schedules->where('day', date('N'))->get();
        }

        return view('admin.flight.index', compact('schedules', 'type', 'f', 'statList'));
    }

    public function create($type)
    {
        $routes = Region::all();
        $airlines = Airline::all();
        $location = DefaultLocation::all()->first();
        return view('admin.flight.create', compact('type', 'routes', 'airlines', 'location'));
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
        return redirect()->route('flights.index', $type)->with([
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
