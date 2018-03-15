<?php

namespace App\Http\Controllers;

use App\Assignment;
use App\Course;
use App\EnrollLecturer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LecturerController extends Controller
{
    public function __construct()
    {
        $this->middleware('lecturer');
    }

    public function courses(Request $request){
        //dd($request->user());
        $courses = Course::all();
        $user_id = $request->user()->id;
        $enrolls = EnrollLecturer::where('lecturer_id', '=', $user_id)->get();
        return view('lecturer/mycourses', ['courses' => $courses, 'enrolls' => $enrolls]);
}

    public function getCourse($id){
        $course = Course::where('course_id','=',$id)->first();

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

    public function storeAssignment(Request $request,$id)
    {
        $course = Course::where('course_id', '=', $id)->first();


        $assignment = new Assignment;
        $assignment->course_id    = $course->course_id;
        $assignment->lecturer_id   = $request->user()->id;
        $assignment->assignment_id = $request->assignment_id;
        $assignment->description  = $request->description;
        $assignment->start_date   = $request->start_date;
        $assignment->end_date     = $request->end_date;
        $assignment->start_time   = $request->start_time;
        $assignment->end_time     = $request->end_time;


        $fileName = $request->file('attachment')->getClientOriginalName();


        $request->file('attachment')->move(
            base_path() . '/public/uploads', $fileName
        );

        $assignment->attachment  = $fileName;
        $assignment->save();
        $assignments = Assignment::where('course_id', '=', $id)->get();
        $lecturers = EnrollLecturer::where('course_id', '=', $id)->get();

        return view('lecturer/course', ['course' => $course, 'lecturers' => $lecturers, 'course' => $course, 'assignments' => $assignments]);

    }



}
