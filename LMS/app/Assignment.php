<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{
    protected $fillable = ['course_id', 'assignment_id', 'lecturer_id', 'deadline'];

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
