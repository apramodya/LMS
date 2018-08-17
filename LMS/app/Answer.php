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
    public function students(){
        return $this->belongsToMany(Student::class,'answers_students','answer_id', 'student_id');
    }
}
