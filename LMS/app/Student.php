<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = ['id','first_name','last_name','email','phone','registration_year','index_number','user_id'];

    public function user(){
    return $this->belongsTo(User::class);
    }
    function courses(){
        return $this->belongsToMany(Course::class,'courses_students','student_id', 'course_id');
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
    public function lecturenotes(){
        return $this->hasMany(LectureNote::class);
    }
}
