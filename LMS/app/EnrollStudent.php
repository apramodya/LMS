<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EnrollStudent extends Model
{

    protected $table = 'courses_students';

    protected $fillable = ['student_id', 'course_id'];

    public function student(){
        return $this->hasMany(Student::class,'user_id', 'student_id');
    }

    public function courses(){
        return $this->hasMany(Course::class,'course_id', 'course_id');
    }

}
