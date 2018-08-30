<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    protected $fillable = ['flight_id', 'day'];

    public function flights() {
        return $this->belongsTo('App\Flight');
    }
}
