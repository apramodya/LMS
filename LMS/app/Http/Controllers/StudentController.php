<?php

namespace App\Http\Controllers;

use App\Assignment;
use App\Course;
use App\EnrollStudent;
use App\LectureNote;
use App\Notice;
use App\Student;
use App\Submission;
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
        $course = Course::where('id','=',$id)->first();
        $assignments = Assignment::where('course_id', '=', $id)->get();
        $notices = Notice::where('course_id', '=', $id)->get();
        $lectureNotes = LectureNote::where('course_id', '=', $id)->get();
        $submissions = Submission::where('course_id', '=', $id)->get();

        return view('student/course', ['course' => $course, 'assignments'=>$assignments,'notices'=> $notices,'lectureNotes'=>$lectureNotes,'submissions'=>$submissions]);
    }

    public function submitAssignment($id){
        $course = Course::where('course_id', '=', $id)->first();

        return view('student/submitAssignment', ['course' => $course]);
    }

    public function submitQuiz($id){
        $course = Course::where('course_id', '=', $id)->first();

        return view('student/submitQuiz', ['course' => $course]);
    }

    public function courseAction(){
        $courses = Course::all();
        return view('student/student-enroll-course', ['courses' => $courses]);
    }

//    public function postEnrollCourse(Request $request){
//        $student_id = Auth::user()->students->first()->id;
//        $student = Student::findOrFail($student_id);
//        $student->courses()->attach($request->course_id);
//
//        return redirect(route('dashboard'));
//    }


    public function enrollCourse(Request $request,$id){

        $userid = $request->user()->id;
        $student = Student::where('user_id', '=', $userid)->first();
        $course = Course::findOrFail($id);
        $course->students()->attach($student->id);
        return redirect(route('student-course-action'));
    }

    public function unEnrollCourse(Request $request){

        $userid = $request->user()->id;
        $student = Student::where('user_id', '=', $userid)->first();
        $course = Course::findOrFail($request->course_id);
        $course->students()->detach($student->id);

        return redirect(route('student-course-action'));
    }


}
