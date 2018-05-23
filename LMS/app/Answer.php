<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    public function question(){
        return $this->belongsTo(Question::class);
    }
    public function lecturers(){
        return $this->belongsToMany(Lecturer::class,'answers_lecturers','answer_id', 'lecturer_id');
    }
    public function student(){
        return $this->belongsTo(Student::class);
    }
}
