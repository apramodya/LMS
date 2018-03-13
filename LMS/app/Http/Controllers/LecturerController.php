<?php

namespace App\Http\Controllers;

use App\Assignment;
use App\Course;
use App\EnrollLecturer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LecturerController extends Controller
{
    public function courses(Request $request){
        $courses = Course::all();
        $user_id = $request->user()->id;
        $enrolls = EnrollLecturer::where('lecturer_id', '=', $user_id)->get();
        return view('lecturer/mycourses', ['courses' => $courses, 'enrolls' => $enrolls]);
    }

    public function getCourse($id){
        $course = Course::where('course_id', '=', $id)->first();

        $assignments = Assignment::where('course_id', '=', $id)->get();

        $lecturers = EnrollLecturer::where('course_id', '=', $id)->get();
        return view('lecturer/course', ['course' => $course, 'lecturers' => $lecturers, 'course' => $course, 'assignments' => $assignments]);
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
