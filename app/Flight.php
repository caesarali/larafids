<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Flight extends Model
{
    protected $fillable = ['type', 'airline_id', 'aircraft_id', 'flight_number', 'origin_id', 'destination_id', 'etd', 'eta'];

    public function setTypeAttribute($value) {
        $this->attributes['type'] = strtolower($value);
    }

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

    public function getEtdAttribute($value) {
        return Carbon::parse($value);
    }

    public function airline() {
        return $this->belongsTo('App\Airline');
    }

    public function origin() {
        return $this->belongsTo('App\Region', 'origin_id');
    }

    public function destination() {
        return $this->belongsTo('App\Region', 'destination_id');
    }
}
