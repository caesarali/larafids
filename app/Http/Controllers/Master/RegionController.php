<?php

namespace App\Http\Controllers\Master;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Region;

class RegionController extends Controller
{
    public function index()
    {
        $regions = Region::orderBy('name', 'asc')->get();
        return view('admin.region.index', compact('regions'));
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
}
