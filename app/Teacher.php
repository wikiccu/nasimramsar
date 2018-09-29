<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    //
    public function field()
    {
        return $this->belongsTo('App\Field');
    }
}
