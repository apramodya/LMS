<?php

namespace App\Http\Controllers;

use App\Assignment;
use App\Course;
use App\EnrollStudent;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    public function __construct()
    {
        $this->middleware('student');
    }

    public function courses(){
        $courses = Auth::user()->students->first()->courses;
        return view('student/mycourses' , ['courses' => $courses]);
    }

    public function getCourse($id){
        $course = Course::where('course_id','=',$id)->first();
        $assignments = Assignment::where('course_id', '=', $id)->get();

        return view('student/course', ['course' => $course, 'assignments' => $assignments]);
    }

    public function submitAssignment($id){
        $course = Course::where('course_id', '=', $id)->first();

        return view('student/submitAssignment', ['course' => $course]);
    }

    public function submitQuiz($id){
        $course = Course::where('course_id', '=', $id)->first();

        return view('student/submitQuiz', ['course' => $course]);
    }



}
