<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Remark extends Model
{
    protected $fillable = ['schedule_id', 'status', 'estimated'];

    public function setEstimatedAttribute($value) {
        if ($this->attributes['status'] > 0) {
            $this->attributes['estimated'] = $value;
        } else {
            $this->attributes['estimated'] = null;
        }
    }
}
