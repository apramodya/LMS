<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LectureNote extends Model
{
    protected $fillable = ['course_id', 'title', 'description' , 'lecturer_id' ,'attachment','created_at'];

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
