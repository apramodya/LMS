<?php

namespace App\Http\Controllers;

use App\Course;
use App\Result;
use Illuminate\Http\Request;

class ExamController extends Controller
{
    public function getAddResults()
    {
        $courses = Course::all();
        return view('exam/addResultsManually', ['courses' => $courses]);
    }

    public function postAddResults(Request $request)
    {
        $course_id = $request->course_id;
        return redirect(route('add-results-to', $course_id));
    }

    public function getAddResultsTo($id)
    {
        $course = Course::where('id', '=', $id)->first();
        return view('exam/addResultsTo', ['course' => $course]);
    }

    public function postAddResultsTo(Request $request, $id){

        $course = Course::where('id', '=', $id)->first();
        dd($request);
        $course_id = $course->course_id;

	    flash('Results added')->success();
	    return redirect(route('add-results-to',$id));
    }

    public function getAddResultsUsingCSV()
    {
        $courses = Course::all();
        return view('exam/addResultsUsingCSV', ['courses' => $courses]);
    }

    public function postAddResultsUsingCSV(Request $request)
    {
        $id = $request->course_id;
        $course = Course::where('id', '=', $id)->first();
        $course_id = $course->course_id;

        if ($request->hasFile('attachment')) {
            //$request->attachment->storeAs( $course_id, $request->attachment->getClientOriginalName());
            $results = csv2json($request->attachment);
            $results = json_decode($results);
            foreach ($results as $result) {
                $item = new Result;
                $item->course_id = $course_id;
                $item->index_number = $result->index_number;
                $item->final_grade = $result->final_grade;
                $item->save();
            }

        }
	    flash('Results added')->success();
	    return redirect(route('dashboard'));
    }


}
