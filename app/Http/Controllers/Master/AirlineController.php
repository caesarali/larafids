<?php

namespace App\Http\Controllers\Master;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\AirlineRequest;
use App\Airline;
use Storage;

class AirlineController extends Controller
{
    public function index()
    {
        $airlines = Airline::all();
        return view('admin.airline.index', compact('airlines'));
    }

    public function store(AirlineRequest $request)
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

    public function edit(Airline $airline)
    {
        return view('admin.airline.edit', compact('airline'));
    }

    public function update(AirlineRequest $request, Airline $airline)
    {
        if ($request->hasFile('picture') && $request->file('picture')->isValid()) {
            if ($airline->logo) {
                Storage::delete($airline->logo);
            }
            $logo = $request->picture->store('images/airlines/logo');
            $request->request->add(['logo' => $logo]);
        }

        $airline->update($request->all());
        return redirect()->back()->with([
            'alert' => 'swal',
            'header' => 'Success!',
            'text' => 'Airlines has been updated.',
            'type' => 'success'
        ]);
    }

    public function destroy(Airline $airline)
    {
        if ($airline->logo) {
            Storage::delete($airline->logo);
        }
        $airline->delete();
        return redirect()->back()->with([
            'alert' => 'swal',
            'header' => 'Success!',
            'text' => 'Airlines has been deleted.',
            'type' => 'success'
        ]);
    }
}
