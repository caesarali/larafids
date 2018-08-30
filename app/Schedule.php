<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Schedule extends Model
{
    protected $fillable = ['flight_id', 'day'];

    public function getDay() {
        $day = $this->day;
        switch ($day) {
            case '1':
                return 'Monday';
            case '2':
                return 'Tuesday';
            case '3':
                return 'Wednesday';
            case '4':
                return 'Thursday';
            case '5':
                return 'Friday';
            case '6':
                return 'Saturday';
            case '7':
                return 'Sunday';
            default:
                return 'Error!';
        }
    }

    public function flight() {
        return $this->belongsTo('App\Flight');
    }
}
