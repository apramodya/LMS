<?php

namespace App\Http\Controllers;

use App\Course;
use Illuminate\Http\Request;

class ExamController extends Controller
{
    public function getAddResults(){
        $courses = Course::all();
        return view('exam/addResults', ['courses' => $courses]);
    }

    public function postAddResults(Request $request){
        $course_id = $request->course_id;
        return redirect(route('add-results-to',$course_id));
    }

    public function addResultsTo($id){
        $course = Course::where('id','=',$id)->first();
        return view('exam/addResultsTo', ['course' => $course]);
    }
}
