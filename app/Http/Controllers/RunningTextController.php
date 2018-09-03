<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\RunningText;

class RunningTextController extends Controller
{
    public function index()
    {
        $runningtext = RunningText::all()->first();
        return view('admin.runningtext.index', compact('runningtext'));
    }

    public function update(Request $request, RunningText $running_text)
    {
        $running_text->update($request->all());
        return redirect()->back()->with([
            'alert' => 'swal',
            'header' => 'Success!',
            'text' => 'Running Text has been updated.',
            'type' => 'success'
        ]);
    }
}
