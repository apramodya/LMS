<?php

namespace App\Http\Controllers;

use App\Assignment;
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
        $assignments = Assignment::where('course_id', '=', $id)->get();
        $data = array('course' => $course,
            'assignments' => $assignments);
        return view('lecturer/course')->with($data);
    }

    public function addAssignment($id){
        $course = Course::where('course_id', '=', $id)->first();
        return view('lecturer/addAssignment', ['course' => $course]);
    }
    public function addLectureNotes($id){
        $course = Course::where('course_id', '=', $id)->first();
        return view('lecturer/addLectureNotes', ['course' => $course]);
    }
    public function addNotice($id){
        $course = Course::where('course_id', '=', $id)->first();
        return view('lecturer/addNotice', ['course' => $course]);
    }
    public function addQuiz($id){
        $course = Course::where('course_id', '=', $id)->first();
        return view('lecturer/addQuiz', ['course' => $course]);
    }
    public function addSubmission($id){
        $course = Course::where('course_id', '=', $id)->first();
        return view('lecturer/addSubmission', ['course' => $course]);
    }



}
