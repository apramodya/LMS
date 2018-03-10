<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    public function lecturers(){
        return $this->hasMany(Lecturer::class);
    }
    public function students(){
        return $this->hasMany(Student::class);
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
