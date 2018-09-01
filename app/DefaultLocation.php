<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DefaultLocation extends Model
{
    protected $table = 'default_location';
    protected $fillable = ['region_id'];

    public function region() {
        return $this->belongsTo('App\Region');
    }
}
