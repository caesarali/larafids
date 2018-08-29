<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FidsController extends Controller
{
    public function departures()
    {
        return view('departure');
    }

    public function arrivals()
    {
        return view('arrival');
    }
}
