<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Remark extends Model
{
    protected $fillable = ['schedule_id', 'status', 'estimated'];
}
