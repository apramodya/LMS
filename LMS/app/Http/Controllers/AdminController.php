<?php

namespace App\Http\Controllers;

use App\Announcement;
use App\Course;
use App\Forum;
use App\Lecturer;
use App\Student;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use File;

class AdminController extends Controller {
	public function __construct() {
		$this->middleware( 'admin' );
	}

	public function registerUser( Request $request ) {

		$validator = Validator::make( $request->all(), [
			'first_name'        => 'required|string',
			'last_name'         => 'required|string',
			'email'             => 'required|string|max:255',
			'phone'             => 'required|min:9|max:11',
			'registration_year' => 'min:4|max:4',
			'index_number'      => 'min:8|max:8',
		] );

		if ( $validator->fails() ) {
			return redirect()->to( '/register' )
			                 ->withErrors( $validator )
			                 ->withInput();
		}

		// if a lecturer registration
		if ( $request->type == 'student' ) {
			$user           = new User();
			$user->username = $request->index_number;
			$user->password = Hash::make( $request->index_number );
			$user->type     = 'student';

			$user->save();

			$student                    = new Student();
			$student->first_name        = $request->first_name;
			$student->last_name         = $request->last_name;
			$student->email             = $request->email;
			$student->phone             = $request->phone;
			$student->registration_year = $request->registration_year;
			$student->index_number      = $request->index_number;
			$student->degree            = $request->degree;
			$student->user_id           = $user->id;

			$student->save();

			return redirect( route( 'admin-student', $student->id ) );
		} // if a lecturer registration
		elseif ( $request->type == 'lecturer' ) {
			$user           = new User();
			$user->username = $request->username;
			$user->password = Hash::make( $request->username );
			$user->type     = 'lecturer';

			$user->save();

			$lecturer              = new Lecturer();
			$lecturer->first_name  = $request->first_name;
			$lecturer->last_name   = $request->last_name;
			$lecturer->email       = $request->email;
			$lecturer->phone       = $request->phone;
			$lecturer->user_id     = $user->id;
			$lecturer->position_id = $request->position_id;

			$lecturer->save();

			return redirect( route( 'admin-lecturer', $lecturer->id ) );
		}

	}

	public function getAnnounce() {
		return view( 'admin/announcements/create-announcement' );
	}

	public function postAnnounce( Request $request ) {
		$announcement = new Announcement( [
			'year'       => $request->input( 'year' ),
			'degree'     => $request->input( 'degree' ),
			'title'      => $request->input( 'title' ),
			'content'    => $request->input( 'content' ),
			'attachment' => $request->input( 'attachment' ),
		] );
		$announcement->save();

		return redirect( route( 'dashboard' ) );
	}

	public function announcements() {
		$announcements = Announcement::all()->sortByDesc( 'created_at' );

		return view( 'admin/announcements/announcements', [ 'announcements' => $announcements ] );
	}

	public function lecturersList() {
		$lecturers = Lecturer::orderBy( 'position_id' )->get();

		return view( 'admin/list-lecturers', [ 'lecturers' => $lecturers ] );
	}

	public function lecturer( $id ) {
		$lecturer = Lecturer::where( 'id', '=', $id )->first();
		$courses  = Course::all();

		return view( 'admin/lecturer', [ 'lecturer' => $lecturer, 'courses' => $courses ] );
	}

	public function studentsList() {
		$students = Student::all();

		return view( 'admin/list-students', [ 'students' => $students ] );
	}

	public function student( $id ) {
		$student = Student::where( 'id', '=', $id )->first();

		return view( 'admin/student', [ 'student' => $student ] );
	}

	public function coursesList() {
		$courses = Course::all();

		return view( 'admin/courses/courses', [ 'courses' => $courses ] );
	}

	public function course( $id ) {
		$course = Course::where( 'course_id', '=', $id )->first();

		return view( 'admin/courses/course', [ 'course' => $course ] );
	}

	public function getAddCourse() {
		return view( 'admin/courses/addCourse' );
	}

	public function postAddCourse( Request $request ) {
		// create new course
		$course = new Course( [
			'course_id'      => $request->input( 'course_id' ),
			'name'           => $request->input( 'name' ),
			'enrollment_key' => $request->input( 'enrollment_key' ),
			'year'           => $request->input( 'year' ),
			'semester'       => $request->input( 'semester' ),
			'degree'         => $request->input( 'degree' ),
		] );
		$course->save();
		$folder = $request->course_id;
		$path   = base_path() . '/public/uploads/' . $folder;
		File::makeDirectory( $path, 0775, true, true );

		// create the forum relevant to the course
		$forum = new Forum( [
			'forum_id'  => $request->input( 'course_id' ),
			'course_id' => $course->id,
		] );
		$forum->save();

		return redirect( route( 'dashboard' ) );
	}

	public function getEditCourse( $id ) {
		$course = Course::where( 'id', '=', $id )->first();

		return view( 'admin.courses.editCourse', [ 'course' => $course ] );
	}

	public function postEditCourse( Request $request, $id ) {
		$course                 = Course::find( $id );
		$course->name           = $request->name;
		$course->enrollment_key = $request->enrollment_key;
		$course->year           = $request->year;
		$course->semester       = $request->semester;
		$course->degree         = $request->degree;
		$course->save();

		return redirect( route( 'admin-courses' ) );
	}

	public function getEnrollCourse() {
		$courses   = Course::all();
		$lecturers = Lecturer::all();

		return view( 'admin/courses/enroll-course', [ 'courses' => $courses, 'lecturers' => $lecturers ] );
	}

	public function postEnrollCourse( Request $request ) {
		$lecturer = Lecturer::findOrFail( $request->lecturer_id );
		$lecturer->courses()->attach( $request->course_id );

		return redirect( route( 'dashboard' ) );
	}

	public function forum( $id ) {
		$forum = Forum::where( 'course_id', '=', $id )->first();

		return view( 'admin/forum', [ 'forum' => $forum ] );
	}

}
