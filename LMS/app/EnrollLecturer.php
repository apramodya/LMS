<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EnrollLecturer extends Model
{
    protected $table = 'lecturers_courses';

    protected $fillable = ['lecturer_id', 'course_id'];

    public function lecturer(){
        return $this->hasMany(Lecturer::class,'user_id', 'lecturer_id');
    }

    public function courses(){
        return $this->hasMany(Course::class,'course_id', 'course_id');
    }

}
