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
    public function index()
    {
        $schedules = Schedule::orderBy('day', 'asc')->get();
        return view('admin.flight.index', compact('schedules'));
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
}
