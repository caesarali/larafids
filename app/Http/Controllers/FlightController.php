<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Region;
use App\Airline;

class FlightController extends Controller
{
    public function create($type)
    {
        $routes = Region::all();
        $airlines = Airline::all();
        return view('admin.flight.create', compact('type', 'routes', 'airlines'));
    }

    public function store(Request $request, $type)
    {
        dd($request->all());
    }
}
