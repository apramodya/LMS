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
        return $this->belongsToMany(Course::class,'lecturers_courses','lecturer_id', 'cid');
    }
    public function questions(){
        return $this->belongsToMany(Question::class,'questions_lecturers','lecturer_id', 'question_id');
    }
    public function assignments(){
        return $this->hasMany(Assignment::class);
    }
    public function quizzes(){
        return $this->hasMany(Quiz::class);
    }
    public function answers(){
        return $this->belongsToMany(Answer::class,'answers_lecturers','lecturer_id', 'answer_id');
    }
    public function lecturenotes(){
        return $this->hasMany(LectureNote::class);
    }
    public function submissions(){
        return $this->hasMany(Submission::class);
    }
    public function notices(){
        return $this->hasMany(Notice::class);
    }


}
