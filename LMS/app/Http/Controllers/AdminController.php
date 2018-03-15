<?php

namespace App\Http\Controllers;

use App\Announcement;
use App\Course;
use App\EnrollLecturer;
use App\Lecturer;
use App\Position;
use App\Student;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function getAnnounce(){
        return view('admin/announcements/create-announcement');
    }

    public function postAnnounce(Request $request){
        $announcement = new Announcement([
            'year' => $request->input('year'),
            'degree' => $request->input('degree'),
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'attachment' => $request->input('attachment'),
        ]);
        $announcement->save();
        return redirect(route('dashboard'));
    }

    public function announcements()
    {
        $announcements = Announcement::all();
        return view('admin/announcements/announcements',['announcements' => $announcements]);
    }

    public function lecturersList(){
        $lecturers = Lecturer::orderBy('position_id')->get();
        return view('admin/list-lecturers', ['lecturers' => $lecturers]);
    }

    public function lecturer($id){
        $lecturer = Lecturer::where('user_id', '=', $id)->get();

        return view('admin/lecturer', ['lecturer' => $lecturer[0]]);
    }

    public function studentsList(){
        $students = Student::all();
        return view('admin/list-students', ['students' => $students]);
    }

    public function student($id){
        $student = Student::where('index_number', '=', $id)->get();

        return view('admin/student', ['student' => $student[0]]);
    }

    public function coursesList(){
        $courses = Course::all();
        return view('admin/courses', ['courses' => $courses]);
    }

    public function course($id){
        $course = Course::where('course_id', '=', $id)->first();
        $lecturers = EnrollLecturer::where('course_id', '=', $id)->get();

        return view('admin/course', ['course' => $course, 'lecturers' => $lecturers]);
    }

    public function getAddCourse(){
        return view('admin/addCourse');
    }

    public function postAddCourse(Request $request){
        $course = new Course([
            'course_id' => $request->input('course_id'),
            'name' => $request->input('name'),
            'enrollment_key' => $request->input('enrollment_key'),
            'year' => $request->input('year'),
            'degree' => $request->input('degree'),
        ]);
        $course->save();
        return redirect(route('dashboard'));
    }

    public function getEnrollCourse(){
        $courses = Course::all();
        $lecturers = Lecturer::all();
        return view('admin/enroll-course', ['courses' => $courses, 'lecturers' => $lecturers]);
    }

    public function postEnrollCourse(Request $request){
        $enroll = new EnrollLecturer([
            'course_id' => $request->input('course_id'),
            'lecturer_id' => $request->input('lecturer_id'),
        ]);
        $enroll->save();
        return redirect(route('dashboard'));
    }

}
