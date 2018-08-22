<?php

namespace App\Http\Controllers;

use App\Course;
use App\Grade;
use App\Student;
use App\Result;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class ExamController extends Controller {
	public function __construct() {
		$this->middleware( 'auth' );
	}

	public function getApplyGrades() {
		$grades = Grade::all()->first();

//		dd($grades);
		return view( 'exam.applyGrades', [ 'grades' => $grades ] );

	}

	public function postApplyGrades( Request $request ) {
		$validator = Validator::make( $request->all(), [
			'a'     => 'required|max:50',
			'amin'  => 'required',
			'aplus' => 'required',
			'b'     => 'required',
			'bmin'  => 'required',
			'bplus' => 'required',
			'c'     => 'required',
			'cmin'  => 'required',
			'cplus' => 'required',
			'd'     => 'required',
			'dmin'  => 'required',
			'dplus' => 'required',
			'e'     => 'required'
		] );
		if ( $validator->fails() ) {
			flash( 'Please fill all' )->error();

			return redirect()->to( route( 'apply-grades' ) );
		}

		$grades        = Grade::findOrFail( 1 );
		$grades->a     = $request->a;
		$grades->amin  = $request->amin;
		$grades->aplus = $request->aplus;
		$grades->b     = $request->b;
		$grades->bmin  = $request->bmin;
		$grades->bplus = $request->bplus;
		$grades->c     = $request->c;
		$grades->cmin  = $request->cmin;
		$grades->cplus = $request->cplus;
		$grades->d     = $request->d;
		$grades->dmin  = $request->dmin;
		$grades->dplus = $request->dplus;
		$grades->e     = $request->e;

		$grades->update();

		flash( 'Grades added' )->success();

		return redirect( route( 'apply-grades' ) );
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
			'mark'         => 'required'
		] );
		if ( $validator->fails() ) {
			flash( 'Please check again' )->error();

			return redirect()->to( route( 'add-results-to', $id ) );
		}

		$course    = Course::where( 'id', '=', $id )->first();
		$course_id = $course->course_id;

		$result               = new Result();
		$result->course_id    = $course_id;
		$result->index_number = $request->index_number;
		$result->final_mark   = $request->mark;

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
				$item->final_mark   = $result->final_mark;
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


}
