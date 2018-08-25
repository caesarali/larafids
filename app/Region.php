<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    protected $fillable = ['code', 'name'];

    public function setCodeAttribute($value) {
        $this->attributes['code'] = strtoupper($value);
    }
}
