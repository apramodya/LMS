<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = ['course_id', 'name', 'enrollment_key', 'year', 'degree'];

    // ORM
    public function lecturers(){
        return $this->belongsToMany( Lecturer::class,'lecturers_courses', 'course_id', 'lecturer_id');
    }
    public function students(){
        return $this->belongsToMany( Student::class,'courses_students', 'course_id', 'student_id');
    }
    public function quizzes(){
        return $this->hasMany(Quiz::class);
    }
    public function assignments(){
        return $this->hasMany(Assignment::class);
    }
    public function forum(){
        return $this->hasOne(Forum::class);
    }

}
