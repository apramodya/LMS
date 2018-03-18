<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Submission extends Model
{
    protected $fillable = ['course_id', 'title', 'description' , 'lecturer_id', 'start_date','end_date','start_time','end_time','attachment' ,'sms','email'];

    public function course(){
        return $this->belongsTo(Course::class);
    }
    public function lecturer(){
        return $this->belongsTo(Lecturer::class);
    }
    public function students(){
        return $this->hasMany(Student::class);
    }
}
