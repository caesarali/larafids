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

    public function store(Request $request)
    {
        if ($request->hasFile('picture') && $request->file('picture')->isValid()) {
            $logo = $request->picture->store('images/airlines/logo');
            $request->request->add(['logo' => $logo]);
        }
        $airline = Airline::create($request->all());
        return redirect()->back()->with([
            'alert' => 'swal',
            'header' => 'Success!',
            'text' => 'Airlines has been added.',
            'type' => 'success'
        ]);
    }
}
