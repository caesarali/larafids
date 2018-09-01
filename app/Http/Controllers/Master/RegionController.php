<?php

namespace App\Http\Controllers\Master;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Region;
use App\DefaultLocation;

class RegionController extends Controller
{
    public function index()
    {
        $regions = Region::orderBy('name', 'asc')->get();
        $default = DefaultLocation::all()->first();
        return view('admin.region.index', compact('regions', 'default'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:20',
            'code' => 'required|string|max:3|min:3|unique:regions'
        ]);
        $region = Region::create($data);
        return redirect()->back()->with([
            'alert' => 'swal',
            'header' => 'Success!',
            'text' => 'Region has been created.',
            'type' => 'success'
        ]);
    }

    public function edit(Region $region)
    {
        return view('admin.region.edit', compact('region'));
    }

    public function update(Request $request, Region $region)
    {
        $data = $request->validate([
            'name' => 'required|string|max:20',
            'code' => 'required|string|max:3|min:3|unique:regions,code,'.$region->id
        ]);
        $region->update($data);
        return redirect()->back()->with([
            'alert' => 'swal',
            'header' => 'Success!',
            'text' => 'Region has been updated.',
            'type' => 'success'
        ]);
    }

    public function destroy(Region $region)
    {
        $region->delete();
        return redirect()->back()->with([
            'alert' => 'swal',
            'header' => 'Success!',
            'text' => 'Region has been deleted.',
            'type' => 'success'
        ]);
    }

    public function setDefault(Region $region)
    {
        $default = DefaultLocation::all()->first();
        if ($default) {
            $default->update([
                'region_id' => $region->id
            ]);
        } else {
            $default = DefaultLocation::create([
                'region_id' => $region->id
            ]);
        }
        return redirect()->back()->with([
            'alert' => 'swal',
            'header' => 'Success!',
            'text' => "$region->name has been set as Default Location.",
            'type' => 'success'
        ]);
    }
}
