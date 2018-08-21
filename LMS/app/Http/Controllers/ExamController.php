<?php

namespace App\Http\Controllers;

use App\Course;
use App\Student;
use App\Result;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class ExamController extends Controller {
	public function __construct() {
		$this->middleware( 'auth' );
	}

	public function getAddResults() {
		$courses = Course::all();

		return view( 'exam/addResultsManually', [ 'courses' => $courses ] );
	}

	public function postAddResults( Request $request ) {
		$course_id = $request->course_id;

		return redirect( route( 'add-results-to', $course_id ) );
	}

	public function getAddResultsTo( $id ) {
		$course = Course::where( 'id', '=', $id )->first();

		return view( 'exam/addResultsTo', [ 'course' => $course ] );
	}

	public function postAddResultsTo( Request $request, $id ) {
		$validator = Validator::make( $request->all(), [
			'index_number' => 'required|min:8|max:8',
			'grade' => 'required'
		] );
		if ( $validator->fails() ) {
			flash( 'Please check again' )->error();

			return redirect()->to( route( 'add-results-to', $id ) );
		}

		$course = Course::where( 'id', '=', $id )->first();
		$course_id = $course->course_id;

//		dd($course->semester);

		$result = new Result();
		$result->course_id = $course_id;
		$result->index_number = $request->index_number;
		$result->final_mark = $request->mark;

		$result->save();

		flash( 'Results added' )->success();

		return redirect( route( 'add-results-to', $id ) );
	}

	public function getAddResultsUsingCSV() {
		$courses = Course::all();

		return view( 'exam/addResultsUsingCSV', [ 'courses' => $courses ] );
	}

	public function postAddResultsUsingCSV( Request $request ) {
		$id        = $request->course_id;
		$course    = Course::where( 'id', '=', $id )->first();
		$course_id = $course->course_id;

		if ( $request->hasFile( 'attachment' ) ) {
			//$request->attachment->storeAs( $course_id, $request->attachment->getClientOriginalName());
			$results = csv2json( $request->attachment );
			$results = json_decode( $results );
			foreach ( $results as $result ) {
				$item               = new Result;
				$item->course_id    = $course_id;
				$item->index_number = $result->index_number;
				$item->final_mark  = $result->final_mark;
				$item->save();
			}
		}
		flash( 'Results added' )->success();

		return redirect( route( 'dashboard' ) );
	}

	public function getCheckResults() {
		$courses = Course::all();

		return view( 'exam.checkResults', [ 'courses' => $courses ] );
	}

	public function getResultsByIndex( $id ) {
		$results = Result::where( 'index_number', '=', $id )->get();

		return view( 'exam.resultsByIndex', [ 'results' => $results ] );

	}

	public function postResultsByIndex( Request $request ) {
		$validator = Validator::make( $request->all(), [
			'index_number' => 'required|min:8|max:8'
		] );
		if ( $validator->fails() ) {
			flash( 'Please enter a valid index number' )->error();

			return redirect()->to( route( 'check-results' ) );
		}

		$id = $request['index_number'];

		return redirect( route( 'get-results-by-index', $id ) );
	}

	public function getResultsByCourse( $id ) {
		$results = Result::where( 'course_id', '=', $id )->get();

		return view( 'exam.resultsByCourse', [ 'results' => $results ] );
	}

	public function postResultsByCourse( Request $request ) {
		$id = $request['course_id'];

		return redirect( route( 'get-results-by-course', $id ) );
	}

    public function viewStudentResults() {

        $userid  = Auth::user()->id;
//        dd($userid);
        $student = Student::where( 'user_id', '=', $userid )->first();
        $semesterOnes = Course::where('semester','=','1')->get();
        $semesterTwos = Course::where('semester','=','2')->get();
        $semesterThrees = Course::where('semester','=','3')->get();
        $semesterFours = Course::where('semester','=','4')->get();
        $semesterFives = Course::where('semester','=','5')->get();
        $semesterSixs = Course::where('semester','=','6')->get();
        $results = Result::where( 'index_number', '=', $student->index_number )->get();
//        dd($semesterOnes);

        return view( 'student.results',['student'=> $student,
            'semesterOnes'=>$semesterOnes,
            'semesterTwos'=>$semesterTwos,
            'semesterThrees'=>$semesterThrees,
            'semesterFours'=>$semesterFours,
            'semesterFives'=>$semesterFives,
            'semesterSixs'=>$semesterSixs,

            'results'=>$results
            ]);

    }




}
