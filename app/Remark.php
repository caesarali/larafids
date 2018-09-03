<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

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

    public function getEstimatedAttribute($value) {
        if ($value) {
            return Carbon::parse($value)->format('H:i');
        }
        return null;
    }

    public function getStatus() {
        $status = $this->status;
        switch ($status) {
            case '1':
                $status = 'DELAYED';
                break;
            case '2':
                $status = 'DEPARTED';
                break;
            case '3':
                $status = 'CANCELED';
                break;

            default:
                $status = 'ON TIME';
                break;
        }
        return $status;
    }

    public function getBackgroundStatus() {
        $status = $this->status ?? null;
        switch ($status) {
            case '1':
                $status = 'bg-warning ';
                break;
            case '2':
                $status = 'bg-success ';
                break;
            case '3':
                $status = 'bg-danger ';
                break;

            default:
                $status = 'bg-primary ';
                break;
        }
        return $status;
    }
}
