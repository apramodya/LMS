<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{
    public function course(){
        return $this->belongsTo(Course::class);
    }
    public function lecturer(){
        return $this->belongsTo(Lecturer::class);
    }
    public function students(){
        return $this->hasMany(Student::class);
    }
}
