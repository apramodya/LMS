<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = ['question', 'forum_id'];

    public function lecturers(){
        return $this->belongsToMany(Lecturer::class,'questions_lecturers','question_id', 'lecturer_id');
    }
    public function forum(){
        return $this->belongsTo(Forum::class);
    }
    public function student(){
        return $this->belongsTo(Student::class);
    }
    public function answers(){
        return $this->hasMany(Answer::class);
    }
}
