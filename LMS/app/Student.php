<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    public function user(){
        return $this->belongsTo(User::class);
    }
    function courses(){
        return $this->hasMany(Course::class);
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
