<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    function course(){
        return $this->hasMany(Course::class);
    }
}
