<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class date extends Model
{
    //
    public function doctor()
    {
       return $this->belongsTo('App\doctor','doctor');
    }
}
