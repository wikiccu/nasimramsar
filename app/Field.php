<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Field extends Model
{
    //
    protected $fillable = ['title'];

    public function teachers()
    {
        return $this->hasMany('App\Teacher');
    }

    public function courses()
    {
        return $this->hasMany('App\Course');
    }
}
