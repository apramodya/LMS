<?php

namespace App\Http\Controllers;

use App\Assignment;
use App\Course;
use App\EnrollLecturer;

use App\LectureNote;
use Illuminate\Http\Request;
use File;

use Illuminate\Support\Facades\Auth;

class LecturerController extends Controller
{
    public function __construct()
    {
        $this->middleware('lecturer');
    }

    public function courses(){
        $courses = Auth::user()->lecturers->first()->courses;

        return view('lecturer/mycourses', ['courses' => $courses]);
}

    public function getCourse($id){
        $course = Course::where('id','=',$id)->first();

        return view('lecturer/course', ['course' => $course]);
    }

    public function addAssignment($id){
        $course = Course::where('id', '=', $id)->first();
        return view('lecturer/addAssignment', ['course' => $course]);
    }

    public function storeAssignment(Request $request,$id){

        if ($request->hasFile('attachment')) {
            $course = Course::where('id', '=', $id)->first();
            $assignment = new Assignment;
            $assignment->course_id    = $id;
            $assignment->lecturer_id   = $request->user()->id;
            $assignment->assignment_id = $request->assignment_id;
            $assignment->description  = $request->description;
            $assignment->start_date   = $request->start_date;
            $assignment->end_date     = $request->end_date;
            $assignment->start_time   = $request->start_time;
            $assignment->end_time     = $request->end_time;

            $folder  = $course->course_id;
            $folder2 = $request->assignment_id;
            $path = base_path() . '/public/uploads/'. $folder .'/assignments/' . $folder2;
            $fileName = $request->file('attachment')->getClientOriginalName();
            $request->file('attachment')->move($path,$fileName);
            File::makeDirectory($path, 0775, true, true);

            $assignment->attachment  = $fileName;
            $assignment->save();

        }
        else{
            $course = Course::where('id', '=', $id)->first();
            $assignment = new Assignment;
            $assignment->course_id    = $id;
            $assignment->lecturer_id   = $request->user()->id;
            $assignment->assignment_id = $request->assignment_id;
            $assignment->description  = $request->description;
            $assignment->start_date   = $request->start_date;
            $assignment->end_date     = $request->end_date;
            $assignment->start_time   = $request->start_time;
            $assignment->end_time     = $request->end_time;

            $folder  = $course->course_id;
            $folder2 = $request->assignment_id;
            $path = base_path() . '/public/uploads/'. $folder .'/assignments/' . $folder2;


            File::makeDirectory($path, 0775, true, true);

            $assignment->attachment  = 'No File';
            $assignment->save();
        }



        return redirect(route('lecturer-course', $id));
    }

    public function addLectureNotes($id){
        $course = Course::where('id', '=', $id)->first();
        return view('lecturer/addLectureNotes', ['course' => $course]);
    }

    public function storeLectureNotes(Request $request,$id){

        $course = Course::where('id', '=', $id)->first();
        $lecturenote = new LectureNote;
        $lecturenote->course_id    = $id;
        $lecturenote->lecturer_id   = $request->user()->id;
        $lecturenote->description  = $request->description;
        $lecturenote->title        = $request->title;

        $folder  = $course->course_id;
        $path = base_path() . '/public/uploads/'. $folder .'/lecturenotes';

        $fileName = $request->file('attachment')->getClientOriginalName();

        $request->file('attachment')->move($path,$fileName);
        File::makeDirectory($path, 0775, true, true);

        $lecturenote->attachment  = $fileName;
        $lecturenote->save();

        return redirect(route('lecturer-course', $id));

    }

    public function addNotice($id){
        $course = Course::where('id', '=', $id)->first();
        return view('lecturer/addNotice', ['course' => $course]);
    }

    public function addQuiz($id){
        $course = Course::where('id', '=', $id)->first();
        return view('lecturer/addQuiz', ['course' => $course]);
    }

    public function addSubmission($id){
        $course = Course::where('id', '=', $id)->first();
        return view('lecturer/addSubmission', ['course' => $course]);
    }





}
