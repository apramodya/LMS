<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubmitSubmission extends Model
{

    public function course(){
        return $this->belongsTo(Course::class);
    }
    public function lecturer(){
        return $this->belongsTo(Lecturer::class);
    }
    function students(){
        return $this->belongsToMany(Student::class,'student_submissions','submission_submission_id', 'student_id');
    }
    public function submission(){
        return $this->belongsTo(Submission::class);
    }


}
