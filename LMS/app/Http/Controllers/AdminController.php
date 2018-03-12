<?php

namespace App\Http\Controllers;

use App\Announcement;
use App\Course;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function getAnnounce(){
        return view('announcements/create-announcement');
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
        return view('announcements/announcements',['announcements' => $announcements]);
    }

    public function lecturersList(){
        return view('admin/list-lecturers');
    }

    public function studentsList(){
        return view('admin/list-students');
    }

    public function coursesList(){
        $courses = Course::all();
        return view('admin/courses', ['courses' => $courses]);
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
}
