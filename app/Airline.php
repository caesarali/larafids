<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Airline extends Model
{
    protected $fillable = ['name', 'corporate', 'logo'];

    public function getLogo() {
        if ($this->logo) {
            $logo = '<img src="'.asset('storage/'.$this->logo).'" alt="'.$this->name.'" class="img-fluid">';
            return $logo;
        }

        return '-';
    }
}
