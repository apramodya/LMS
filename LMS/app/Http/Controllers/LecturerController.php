<?php

namespace App\Http\Controllers;

use App\Course;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LecturerController extends Controller
{
    public function courses(){
        $courses = Course::all();
        return view('lecturer/mycourses', ['courses' => $courses]);
    }

    public function getCourse($id){
        $course = Course::where('course_id', '=', $id)->first();
        return view('lecturer/course', ['course' => $course]);
    }
}
