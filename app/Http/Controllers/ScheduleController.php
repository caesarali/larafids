<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Schedule;
use App\Remark;

class ScheduleController extends Controller
{
    public function destroy(Schedule $schedule)
    {
        if ($schedule->flight->schedules->count() <= 1) {
            $schedule->flight->delete();
        } else {
            $schedule->delete();
        }
        return redirect()->back()->with([
            'alert' => 'swal',
            'header' => 'Success!',
            'text' => 'Flight schedule has been deleted.',
            'type' => 'success'
        ]);
    }

    public function remark(Request $request, Schedule $schedule)
    {
        $remark = $schedule->remark;
        if ($remark) {
            $remark->update($request->all());
        } else {
            $request->request->add(['schedule_id' => $schedule->id]);
            $remark = Remark::create($request->all());
        }

        return redirect()->back()->with([
            'alert' => 'swal',
            'header' => 'Success!',
            'text' => 'Flight schedule has been updated.',
            'type' => 'success'
        ]);
    }
}
