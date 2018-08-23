<?php

namespace App\Http\Controllers\Master;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Airline;

class AirlineController extends Controller
{
    public function index()
    {
        $airlines = Airline::all();
        return view('admin.airline.index', compact('airlines'));
    }
}
