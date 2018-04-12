<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class serial extends Model
{
    //
    public function date()
    {
        return $this->belongsTo('App\date','serial_date');
    }
}
