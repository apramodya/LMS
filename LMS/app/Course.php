<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = ['course_id', 'name', 'enrollment_key', 'year', 'degree'];

    // ORM
    public function lecturers(){
        return $this->hasMany(EnrollLecturer::class,'course_id', 'course_id');
    }
    public function students(){
        return $this->hasMany(Student::class);
    }
    public function quizzes(){
        return $this->hasMany(Quiz::class);
    }
    public function assignments(){
        return $this->hasMany(Assignment::class);
    }
    public function forum(){
        return $this->hasOne(Forum::class);
    }

    public function lecturerCount($course_id){
        $enrolled = EnrollLecturer::where('course_id', '=', $course_id)->get();
//        dd($enrolled);
        $count = 0;
        foreach ($enrolled as $item)
            if (Lecturer::where('user_id', '=',$item->lecturer_id )->get() && Lecturer::where('position_id', '=', 5)->get())
                $count+=1;

        return $count;
    }
}
