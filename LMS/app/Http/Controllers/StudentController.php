<?php

namespace App\Http\Controllers;

use App\Course;
use App\EnrollStudent;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StudentController extends Controller
{
    public function courses(Request $request){
        $courses = Course::all();
        $user_id = $request->user()->id;
        $enrolls = EnrollStudent::where('student_id', '=', $user_id)->get();
        return view('student/mycourses', ['courses' => $courses, 'enrolls' => $enrolls]);

    }
}
