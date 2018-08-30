<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Flight extends Model
{
    protected $fillable = ['type', 'airline_id', 'aircraft_id', 'flight_number', 'origin', 'destination', 'etd', 'eta'];

    public function setAircraftIdAttribute($value) {
        $this->attributes['aircraft_id'] = strtoupper($value);
    }

    public function setFlightNumberAttribute($value) {
        $this->attributes['flight_number'] = strtoupper($value);
    }

    public function setEtdAttribute($value) {
        $this->attributes['etd'] = Carbon::createFromFormat('H:i', $value)->format('H:i:s');
    }

    public function setEtaAttribute($value) {
        $this->attributes['eta'] = Carbon::createFromFormat('H:i', $value)->format('H:i:s');
    }
}
