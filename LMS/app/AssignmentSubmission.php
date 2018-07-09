<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AssignmentSubmission extends Model
{
    protected $fillable = ['course_id', 'title', 'description', 'student_id', 'attachment', 'created_at', 'updated_at'];

    public function course(){
        return $this->belongsTo(Course::class);
    }
    public function lecturer(){
        return $this->belongsTo(Lecturer::class);
    }
    function students(){
        return $this->belongsToMany(Student::class,'student_assignments_submissions','assignment_submission_id', 'student_id');
    }
    public function assignment(){
        return $this->belongsTo(Assignment::class);
    }


}
