<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lecturer extends Model
{
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function position(){
        return $this->hasOne(Position::class,'id','position_id');
    }
    public function courses(){
        return $this->belongsToMany(Course::class,'lecturers_courses','lecturer_id', 'course_id');
    }
    public function assignments(){
        return $this->hasMany(Assignment::class);
    }
    public function quizzes(){
        return $this->hasMany(Quiz::class);
    }
    public function questions(){
        return $this->hasMany(Question::class);
    }
    public function answers(){
        return $this->hasMany(Answer::class);
    }


}
