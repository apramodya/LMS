<?php

namespace App\Http\Controllers;

use App\Assignment;
use App\Course;
use App\EnrollStudent;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StudentController extends Controller
{
    public function __construct()
    {
        $this->middleware('student');
    }

    public function courses(Request $request){
        $courses = Course::all();
        $user_id = $request->user()->id;
        $enrolls = EnrollStudent::where('student_id', '=', $user_id)->get();
        return view('student/mycourses' , ['courses' => $courses, 'enrolls' => $enrolls]);
    }

    public function getCourse($id){
        $course = Course::where('course_id','=',$id)->first();

        $assignments = Assignment::where('course_id', '=', $id)->get();

        $student = EnrollStudent::where('course_id', '=', $id)->get();
        return view('student/course', ['course' => $course, 'students' => $student, 'assignments' => $assignments]);
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
