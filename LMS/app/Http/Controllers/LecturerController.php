<?php

namespace App\Http\Controllers;

use App\Answer;
use App\Assignment;
use App\Course;

use App\Forum;
use App\LectureNote;
use App\Lecturer;
use App\Notice;
use App\Question;
use App\Quiz;
use App\Submission;
use Illuminate\Http\Request;
use File;
use Illuminate\Support\Facades\Auth;

class LecturerController extends Controller {
	public function __construct() {
		$this->middleware('auth');
	}

	public function courses() {
		$courses = Auth::user()->lecturers->first()->courses;

		return view( 'lecturer/mycourses', [ 'courses' => $courses ] );
	}

	public function getCourse( $id ) {
		$course = Course::where( 'id', '=', $id )->first();

		return view( 'lecturer/course', [ 'course' => $course ] );
	}

	public function addAssignment( $id ) {
		$course = Course::where( 'id', '=', $id )->first();

		return view( 'lecturer/addAssignment', [ 'course' => $course ] );
	}

	public function storeAssignment( Request $request, $id ) {

		$course   = Course::where( 'id', '=', $id )->first();
		$userid   = $request->user()->id;
		$lecturer = Lecturer::where( 'user_id', '=', $userid )->first();

		if ( $request->hasFile( 'attachment' ) ) {

			$assignment                = new Assignment;
			$assignment->course_id     = $id;
			$assignment->lecturer_id   = $lecturer->id;
			$assignment->assignment_id = $request->assignment_id;
			$assignment->description   = $request->description;
			$assignment->start_date    = $request->start_date;
			$assignment->end_date      = $request->end_date;
			$assignment->start_time    = $request->start_time;
			$assignment->end_time      = $request->end_time;
			$assignment->sms           = $request->sms;
			$assignment->email         = $request->email;

			$folder   = $course->course_id;
			$folder2  = $request->assignment_id;
			$path     = base_path() . '/public/uploads/' . $folder . '/assignments/' . $folder2;
			$fileName = $request->file( 'attachment' )->getClientOriginalName();
			$request->file( 'attachment' )->move( $path, $fileName );
			File::makeDirectory( $path, 0775, true, true );

			$assignment->attachment = $fileName;
			$assignment->save();

		} else {

			$assignment                = new Assignment;
			$assignment->course_id     = $id;
			$assignment->lecturer_id   = $lecturer->id;
			$assignment->assignment_id = $request->assignment_id;
			$assignment->description   = $request->description;
			$assignment->start_date    = $request->start_date;
			$assignment->end_date      = $request->end_date;
			$assignment->start_time    = $request->start_time;
			$assignment->end_time      = $request->end_time;
			$assignment->sms           = $request->sms;
			$assignment->email         = $request->email;


			$folder  = $course->course_id;
			$folder2 = $request->assignment_id;
			$path    = base_path() . '/public/uploads/' . $folder . '/assignments/' . $folder2;


			File::makeDirectory( $path, 0775, true, true );


			$assignment->save();
		}


		flash('Assignment added')->success();
		return redirect( route( 'lecturer-course', $id ) );
	}

	public function editAssignment( $id, $id1 ) {
		$course     = Course::where( 'id', '=', $id )->first();
		$assignment = Assignment::where( 'id', '=', $id1 )->first();

		return view( 'lecturer/editAssignment', [ 'course' => $course, 'assignment' => $assignment ] );
	}

	public function getFileAssignment( $id, $id1 ) {
		$course     = Course::where( 'id', '=', $id )->first();
		$assignment = Assignment::where( 'id', '=', $id1 )->first();
		$folder     = $course->course_id;
		$folder2    = $assignment->assignment_id;
		$folder3    = $assignment->attachment;
		$pathToFile = base_path() . '/public/uploads/' . $folder . '/assignments/' . $folder2 . '/' . $folder3;

		return response()->file( $pathToFile );
	}

	public function deleteFileAssignment( Request $request, $id, $id1 ) {

		$course     = Course::where( 'id', '=', $id )->first();
		$assignment = Assignment::where( 'id', '=', $id1 )->first();
		$folder     = $course->course_id;
		$folder2    = $assignment->assignment_id;
		$folder3    = $assignment->attachment;
		$path       = base_path() . '/public/uploads/' . $folder . '/assignments/' . $folder2 . '/' . $folder3;

		if ( File::exists( $path ) ) {

			File::delete( $path, $folder3 );
			$assignment             = Assignment::find( $id1 );
			$assignment->attachment = $request->attachment1;
			$assignment->save();

		}

		flash('Attachment deleted')->success();
		return redirect( route( 'lecturer-editAssignment', [ 'id' => $course->id, 'id1' => $assignment->id ] ) );

	}

	public function changeAssignment( Request $request, $id, $id1 ) {

		$course   = Course::where( 'id', '=', $id )->first();
		$userid   = $request->user()->id;
		$lecturer = Lecturer::where( 'user_id', '=', $userid )->first();

		if ( $request->hasFile( 'attachment' ) ) {

			$assignment                = Assignment::find( $id1 );
			$assignment->course_id     = $id;
			$assignment->lecturer_id   = $lecturer->id;
			$assignment->assignment_id = $request->assignment_id;
			$assignment->description   = $request->description;
			$assignment->start_date    = $request->start_date;
			$assignment->end_date      = $request->end_date;
			$assignment->start_time    = $request->start_time;
			$assignment->end_time      = $request->end_time;
			$assignment->sms           = $request->sms;
			$assignment->email         = $request->email;

			$folder   = $course->course_id;
			$folder2  = $request->assignment_id;
			$path     = base_path() . '/public/uploads/' . $folder . '/assignments/' . $folder2;
			$fileName = $request->file( 'attachment' )->getClientOriginalName();
			$request->file( 'attachment' )->move( $path, $fileName );


			$assignment->attachment = $fileName;
			$assignment->save();

		} else {

			$assignment                = Assignment::find( $id1 );
			$assignment->course_id     = $id;
			$assignment->lecturer_id   = $lecturer->id;
			$assignment->assignment_id = $request->assignment_id;
			$assignment->description   = $request->description;
			$assignment->start_date    = $request->start_date;
			$assignment->end_date      = $request->end_date;
			$assignment->start_time    = $request->start_time;
			$assignment->end_time      = $request->end_time;
			$assignment->sms           = $request->sms;
			$assignment->email         = $request->email;


			$assignment->save();
		}


		flash('Assignment edited')->success();
		return redirect( route( 'lecturer-course', $id ) );
	}

	public function downAssignment( $id, $id1 ) {

		$course     = Course::where( 'id', '=', $id )->first();
		$assignment = Assignment::where( 'id', '=', $id1 )->first();
		$folder     = $course->course_id;
		$folder2    = $assignment->assignment_id;
		$folder3    = $assignment->attachment;
		$pathToFile = base_path() . '/public/uploads/' . $folder . '/assignments/' . $folder2 . '/' . $folder3;

		if ( ! empty ( $folder3 ) ) {
			return response()->download( $pathToFile );

		} else {

			return redirect( route( 'lecturer-course', $id ) );
		}


	}

	public function deleteAssignment( $id, $id1 ) {

		$course     = Course::where( 'id', '=', $id )->first();
		$assignment = Assignment::where( 'id', '=', $id1 )->first();
		$folder     = $course->course_id;
		$folder2    = $assignment->assignment_id;
		$pathToFile = base_path() . '/public/uploads/' . $folder . '/assignments/' . $folder2;
		File::deleteDirectory( $pathToFile );

		$assignment->delete();

		flash('Assignment deleted')->success();
		return redirect( route( 'lecturer-course', $id ) );

	}

	public function addLectureNotes( $id ) {
		$course = Course::where( 'id', '=', $id )->first();

		return view( 'lecturer/addLectureNotes', [ 'course' => $course ] );
	}

	public function storeLectureNotes( Request $request, $id ) {

		$course   = Course::where( 'id', '=', $id )->first();
		$userid   = $request->user()->id;
		$lecturer = Lecturer::where( 'user_id', '=', $userid )->first();
		if ( $request->hasFile( 'attachment' ) ) {

			$lecturenote              = new LectureNote;
			$lecturenote->course_id   = $id;
			$lecturenote->lecturer_id = $lecturer->id;
			$lecturenote->description = $request->description;
			$lecturenote->title       = $request->title;

			$folder = $course->course_id;
			$path   = base_path() . '/public/uploads/' . $folder . '/lecturenotes';

			$fileName = $request->file( 'attachment' )->getClientOriginalName();

			$request->file( 'attachment' )->move( $path, $fileName );
			File::makeDirectory( $path, 0775, true, true );

			$lecturenote->attachment = $fileName;
			$lecturenote->save();

		} else {
			$lecturenote              = new LectureNote;
			$lecturenote->course_id   = $id;
			$lecturenote->lecturer_id = $lecturer->id;
			$lecturenote->description = $request->description;
			$lecturenote->title       = $request->title;

			$folder = $course->course_id;
			$path   = base_path() . '/public/uploads/' . $folder . '/lecturenotes';

			File::makeDirectory( $path, 0775, true, true );

			$lecturenote->save();
		}


		flash('Lecture note added')->success();
		return redirect( route( 'lecturer-course', $id ) );

	}

	public function editLectureNotes( $id, $id1 ) {
		$course      = Course::where( 'id', '=', $id )->first();
		$lecturenote = LectureNote::where( 'id', '=', $id1 )->first();

		return view( 'lecturer/editLectureNote', [ 'course' => $course, 'lecturenote' => $lecturenote ] );
	}

	public function getFileLectureNote( $id, $id1 ) {
		$course      = Course::where( 'id', '=', $id )->first();
		$lecturenote = LectureNote::where( 'id', '=', $id1 )->first();
		$folder      = $course->course_id;
		$folder2     = $lecturenote->attachment;
		$pathToFile  = base_path() . '/public/uploads/' . $folder . '/lecturenotes/' . $folder2;

		return response()->file( $pathToFile );
	}

	public function deleteFileLectureNote( Request $request, $id, $id1 ) {

		$course      = Course::where( 'id', '=', $id )->first();
		$lecturenote = LectureNote::where( 'id', '=', $id1 )->first();
		$folder      = $course->course_id;
		$folder2     = $lecturenote->attachment;
		$path        = base_path() . '/public/uploads/' . $folder . '/lecturenotes/' . $folder2;

		if ( File::exists( $path ) ) {

			File::delete( $path, $folder2 );
			$lecturenote             = LectureNote::find( $id1 );
			$lecturenote->attachment = $request->attachment1;
			$lecturenote->save();


		}

		flash('Lecture note file deleted')->success();
		return redirect( route( 'lecturer-editLectureNotes', [ 'id' => $course->id, 'id1' => $lecturenote->id ] ) );

	}

	public function changeLectureNotes( Request $request, $id, $id1 ) {

		$course   = Course::where( 'id', '=', $id )->first();
		$userid   = $request->user()->id;
		$lecturer = Lecturer::where( 'user_id', '=', $userid )->first();
		if ( $request->hasFile( 'attachment' ) ) {
			$lecturenote              = LectureNote::find( $id1 );
			$lecturenote->course_id   = $id;
			$lecturenote->lecturer_id = $lecturer->id;
			$lecturenote->description = $request->description;
			$lecturenote->title       = $request->title;

			$folder = $course->course_id;
			$path   = base_path() . '/public/uploads/' . $folder . '/lecturenotes';

			$fileName = $request->file( 'attachment' )->getClientOriginalName();

			$request->file( 'attachment' )->move( $path, $fileName );

			$lecturenote->attachment = $fileName;
			$lecturenote->save();

		} else {

			$lecturenote              = LectureNote::find( $id1 );
			$lecturenote->course_id   = $id;
			$lecturenote->lecturer_id = $lecturer->id;
			$lecturenote->description = $request->description;
			$lecturenote->title       = $request->title;

			$lecturenote->save();
		}


		flash('Lecture note edited')->success();
		return redirect( route( 'lecturer-course', $id ) );

	}

	public function downLectureNote( $id, $id1 ) {

		$course      = Course::where( 'id', '=', $id )->first();
		$lecturenote = LectureNote::where( 'id', '=', $id1 )->first();
		$folder      = $course->course_id;
		$folder2     = $lecturenote->attachment;
		$pathToFile  = base_path() . '/public/uploads/' . $folder . '/lecturenotes/' . $folder2;
		if ( ! empty ( $folder2 ) ) {
			return response()->download( $pathToFile );
		} else {
			return redirect( route( 'lecturer-course', $id ) );
		}


	}

	public function deleteLectureNote( $id, $id1 ) {

		$course      = Course::where( 'id', '=', $id )->first();
		$lecturenote = LectureNote::where( 'id', '=', $id1 )->first();
		$folder      = $course->course_id;
		$folder2     = $lecturenote->attachment;
		$pathToFile  = base_path() . '/public/uploads/' . $folder . '/lecturenotes/' . $folder2;
		if ( ! empty( $folder2 ) ) {

			File::delete( $pathToFile, $folder2 );
		}
		$lecturenote->delete();

		flash('Lecture note deleted')->success();
		return redirect( route( 'lecturer-course', $id ) );

	}

	public function addNotice( $id ) {
		$course = Course::where( 'id', '=', $id )->first();

		return view( 'lecturer/addNotice', [ 'course' => $course ] );
	}

	public function storeNotice( Request $request, $id ) {

		$course   = Course::where( 'id', '=', $id )->first();
		$userid   = $request->user()->id;
		$lecturer = Lecturer::where( 'user_id', '=', $userid )->first();

		if ( $request->hasFile( 'attachment' ) ) {

			$notice              = new Notice;
			$notice->course_id   = $id;
			$notice->lecturer_id = $lecturer->id;
			$notice->title       = $request->title;
			$notice->description = $request->description;
			$notice->sms         = $request->sms;
			$notice->email       = $request->email;

			$folder   = $course->course_id;
			$path     = base_path() . '/public/uploads/' . $folder . '/notices';
			$fileName = $request->file( 'attachment' )->getClientOriginalName();
			$request->file( 'attachment' )->move( $path, $fileName );
			File::makeDirectory( $path, 0775, true, true );

			$notice->attachment = $fileName;
			$notice->save();

		} else {

			$notice              = new Notice;
			$notice->course_id   = $id;
			$notice->lecturer_id = $lecturer->id;
			$notice->title       = $request->title;
			$notice->description = $request->description;
			$notice->sms         = $request->sms;
			$notice->email       = $request->email;

			$folder = $course->course_id;
			$path   = base_path() . '/public/uploads/' . $folder . '/notices';

			File::makeDirectory( $path, 0775, true, true );
			$notice->save();
		}

		if ( $notice->sms == 1 ) {
			sms( $notice->description );
		}

		flash('Notice posted')->success();
		return redirect( route( 'lecturer-course', $id ) );
	}

	public function editNotice( $id, $id1 ) {
		$course = Course::where( 'id', '=', $id )->first();
		$notice = Notice::where( 'id', '=', $id1 )->first();

		return view( 'lecturer/editNotice', [ 'course' => $course, 'notice' => $notice ] );
	}

	public function getFileNotice( $id, $id1 ) {
		$course     = Course::where( 'id', '=', $id )->first();
		$notice     = Notice::where( 'id', '=', $id1 )->first();
		$folder     = $course->course_id;
		$folder2    = $notice->attachment;
		$pathToFile = base_path() . '/public/uploads/' . $folder . '/notices/' . $folder2;

		return response()->file( $pathToFile );
	}

	public function deleteFileNotice( Request $request, $id, $id1 ) {

		$course  = Course::where( 'id', '=', $id )->first();
		$notice  = Notice::where( 'id', '=', $id1 )->first();
		$folder  = $course->course_id;
		$folder2 = $notice->attachment;
		$path    = base_path() . '/public/uploads/' . $folder . '/notices/' . $folder2;

		if ( File::exists( $path ) ) {

			File::delete( $path, $folder2 );
			$notice             = Notice::find( $id1 );
			$notice->attachment = $request->attachment1;
			$notice->save();


		}

		flash('Notice file deleted')->success();
		return redirect( route( 'lecturer-editNotice', [ 'id' => $course->id, 'id1' => $notice->id ] ) );

	}

	public function changeNotice( Request $request, $id, $id1 ) {

		$course   = Course::where( 'id', '=', $id )->first();
		$userid   = $request->user()->id;
		$lecturer = Lecturer::where( 'user_id', '=', $userid )->first();
		if ( $request->hasFile( 'attachment' ) ) {
			$notice              = Notice::find( $id1 );
			$notice->course_id   = $id;
			$notice->lecturer_id = $lecturer->id;
			$notice->description = $request->description;
			$notice->title       = $request->title;
			$notice->sms         = $request->sms;
			$notice->email       = $request->email;

			$folder = $course->course_id;
			$path   = base_path() . '/public/uploads/' . $folder . '/notices';

			$fileName = $request->file( 'attachment' )->getClientOriginalName();

			$request->file( 'attachment' )->move( $path, $fileName );

			$notice->attachment = $fileName;
			$notice->save();

		} else {
			$notice              = Notice::find( $id1 );
			$notice->course_id   = $id;
			$notice->lecturer_id = $lecturer->id;
			$notice->description = $request->description;
			$notice->title       = $request->title;
			$notice->sms         = $request->sms;
			$notice->email       = $request->email;

			$notice->save();
		}


		flash('Notice edited')->success();
		return redirect( route( 'lecturer-course', $id ) );

	}

	public function downNotice( $id, $id1 ) {

		$course     = Course::where( 'id', '=', $id )->first();
		$notice     = Notice::where( 'id', '=', $id1 )->first();
		$folder     = $course->course_id;
		$folder2    = $notice->attachment;
		$pathToFile = base_path() . '/public/uploads/' . $folder . '/notices/' . $folder2;
		if ( ! empty( $folder2 ) ) {

			return response()->download( $pathToFile );
		} else {
			return redirect( route( 'lecturer-course', $id ) );
		}

	}

	public function deleteNotice( $id, $id1 ) {

		$course     = Course::where( 'id', '=', $id )->first();
		$notice     = Notice::where( 'id', '=', $id1 )->first();
		$folder     = $course->course_id;
		$folder2    = $notice->attachment;
		$pathToFile = base_path() . '/public/uploads/' . $folder . '/notices/' . $folder2;
		if ( ! empty( $folder2 ) ) {

			File::delete( $pathToFile, $folder2 );
		}
		$notice->delete();

		flash('Notice deleted')->success();
		return redirect( route( 'lecturer-course', $id ) );

	}

	public function getAddQuiz( $id ) {
		$course = Course::where( 'id', '=', $id )->first();

		return view( 'lecturer/addQuiz', [ 'course' => $course ] );
	}

	public function postAddQuiz( Request $request, $id ) {
		$quiz              = new Quiz;
		$quiz->quiz_name   = $request->quiz_name;
		$quiz->lecturer_id = $request->lecturer_id;
		$quiz->course_id   = $id;
		$quiz->save();

		flash('Quiz added')->success();
		return redirect( route( 'add-question', [ $id, $quiz->id ] ) );
	}

	public function addSubmission( $id ) {
		$course = Course::where( 'id', '=', $id )->first();

		return view( 'lecturer/addSubmission', [ 'course' => $course ] );
	}

	public function storeSubmission( Request $request, $id ) {

		$course   = Course::where( 'id', '=', $id )->first();
		$userid   = $request->user()->id;
		$lecturer = Lecturer::where( 'user_id', '=', $userid )->first();
		if ( $request->hasFile( 'attachment' ) ) {


			$submission              = new Submission;
			$submission->course_id   = $id;
			$submission->lecturer_id = $lecturer->id;
			$submission->title       = $request->title;
			$submission->description = $request->description;
			$submission->start_date  = $request->start_date;
			$submission->end_date    = $request->end_date;
			$submission->start_time  = $request->start_time;
			$submission->end_time    = $request->end_time;
			$submission->sms         = $request->sms;
			$submission->email       = $request->email;

			$folder   = $course->course_id;
			$folder2  = $request->title;
			$path     = base_path() . '/public/uploads/' . $folder . '/submissions/' . $folder2;
			$fileName = $request->file( 'attachment' )->getClientOriginalName();
			$request->file( 'attachment' )->move( $path, $fileName );
			File::makeDirectory( $path, 0775, true, true );

			$submission->attachment = $fileName;
			$submission->save();

		} else {


			$submission              = new Submission;
			$submission->course_id   = $id;
			$submission->lecturer_id = $lecturer->id;
			$submission->title       = $request->title;
			$submission->description = $request->description;
			$submission->start_date  = $request->start_date;
			$submission->end_date    = $request->end_date;
			$submission->start_time  = $request->start_time;
			$submission->end_time    = $request->end_time;
			$submission->sms         = $request->sms;
			$submission->email       = $request->email;


			$folder  = $course->course_id;
			$folder2 = $request->title;
			$path    = base_path() . '/public/uploads/' . $folder . '/submissions/' . $folder2;

			File::makeDirectory( $path, 0775, true, true );
			$submission->save();
		}

		flash('Submission added')->success();
		return redirect( route( 'lecturer-course', $id ) );

	}

	public function editSubmission( $id, $id1 ) {
		$course     = Course::where( 'id', '=', $id )->first();
		$submission = Submission::where( 'id', '=', $id1 )->first();

		return view( 'lecturer/editSubmission', [ 'course' => $course, 'submission' => $submission ] );
	}

	public function getFileSubmission( $id, $id1 ) {
		$course     = Course::where( 'id', '=', $id )->first();
		$submission = Submission::where( 'id', '=', $id1 )->first();
		$folder     = $course->course_id;
		$folder2    = $submission->title;
		$folder3    = $submission->attachment;
		$pathToFile = base_path() . '/public/uploads/' . $folder . '/submissions/' . $folder2 . '/' . $folder3;

		return response()->file( $pathToFile );
	}

	public function deleteFileSubmission( Request $request, $id, $id1 ) {

		$course     = Course::where( 'id', '=', $id )->first();
		$submission = Submission::where( 'id', '=', $id1 )->first();
		$folder     = $course->course_id;
		$folder2    = $submission->title;
		$folder3    = $submission->attachment;
		$path       = base_path() . '/public/uploads/' . $folder . '/submissions/' . $folder2 . '/' . $folder3;

		if ( File::exists( $path ) ) {

			File::delete( $path, $folder3 );
			$submission             = Submission::find( $id1 );
			$submission->attachment = $request->attachment1;
			$submission->save();


		}

		flash('Submission file deleted')->success();
		return redirect( route( 'lecturer-editSubmission', [ 'id' => $course->id, 'id1' => $submission->id ] ) );

	}

	public function changeSubmission( Request $request, $id, $id1 ) {

		$course   = Course::where( 'id', '=', $id )->first();
		$userid   = $request->user()->id;
		$lecturer = Lecturer::where( 'user_id', '=', $userid )->first();
		if ( $request->hasFile( 'attachment' ) ) {
			$submission              = Submission::find( $id1 );
			$submission->course_id   = $id;
			$submission->lecturer_id = $lecturer->id;
			$submission->description = $request->description;
			$submission->title       = $request->title;
			$submission->start_date  = $request->start_date;
			$submission->end_date    = $request->end_date;
			$submission->start_time  = $request->start_time;
			$submission->end_time    = $request->end_time;
			$submission->sms         = $request->sms;
			$submission->email       = $request->email;

			$folder  = $course->course_id;
			$folder2 = $request->title;
			$path    = base_path() . '/public/uploads/' . $folder . '/submissions/' . $folder2;

			$fileName = $request->file( 'attachment' )->getClientOriginalName();

			$request->file( 'attachment' )->move( $path, $fileName );

			$submission->attachment = $fileName;
			$submission->save();

		} else {
			$submission              = Submission::find( $id1 );
			$submission->course_id   = $id;
			$submission->lecturer_id = $lecturer->id;
			$submission->description = $request->description;
			$submission->title       = $request->title;
			$submission->start_date  = $request->start_date;
			$submission->end_date    = $request->end_date;
			$submission->start_time  = $request->start_time;
			$submission->end_time    = $request->end_time;
			$submission->sms         = $request->sms;
			$submission->email       = $request->email;

			$submission->save();
		}


		flash('Submission edited')->success();
		return redirect( route( 'lecturer-course', $id ) );

	}

	public function downSubmission( $id, $id1 ) {

		$course     = Course::where( 'id', '=', $id )->first();
		$submission = Submission::where( 'id', '=', $id1 )->first();
		$folder     = $course->course_id;
		$folder2    = $submission->title;
		$folder3    = $submission->attachment;
		$pathToFile = base_path() . '/public/uploads/' . $folder . '/submissions/' . $folder2 . '/' . $folder3;
		if ( ! empty ( $folder3 ) ) {

			return response()->download( $pathToFile );
		} else {
			return redirect( route( 'lecturer-course', $id ) );
		}


	}

	public function deleteSubmission( $id, $id1 ) {

		$course     = Course::where( 'id', '=', $id )->first();
		$submission = Submission::where( 'id', '=', $id1 )->first();
		$folder     = $course->course_id;
		$folder2    = $submission->title;
		$pathToFile = base_path() . '/public/uploads/' . $folder . '/submissions/' . $folder2;
		File::deleteDirectory( $pathToFile );

		$submission->delete();

		flash('Submission deleted')->success();
		return redirect( route( 'lecturer-course', $id ) );

	}


	public function unenrollCourse( Request $request ) {

		$userid   = $request->user()->id;
		$lecturer = Lecturer::where( 'user_id', '=', $userid )->first();
		$course   = Course::findOrFail( $request->course_id );
		$course->lecturers()->detach( $lecturer->id );

		flash('Course unenrolled')->success();
		return redirect( route( 'lecturer-courses' ) );
	}

//	forum
	public function viewForum( $id ) {
		$forum = Forum::where( 'course_id', '=', $id )->first();
        $question = Question::where( 'forum_id', '=', $forum->id )->get();
        $qCount = $question->count();


		return view( 'lecturer.forum', [ 'forum' => $forum ,'qCount' => $qCount ] );
	}

    public function askQuestionAnswer( Request $request, $id) {

        if ($request->has('Ask')) {
        $course   = Course::findOrFail( $id );
        $forum = Forum::where( 'course_id', '=', $id )->first();
        $userid   = $request->user()->id;
        $lecturer = Lecturer::where( 'user_id', '=', $userid )->first();

        $question                = new Question;
        $question->forum_id   = $forum->id;
        $question->question = $request->question;
        $question->save();

        $lecturer = Lecturer::findOrFail( $lecturer->id );
        $lecturer->questions()->attach( $question->id );

	        flash('Question posted')->success();
	        return redirect( route( 'lecturer-forum', $course->id ) );
    }

        if ($request->has('Reply')) {
            $question   = Question::findOrFail( $id );
            $forum = Forum::where( 'id', '=', $question->forum_id )->first();
            $userid   = $request->user()->id;
            $lecturer = Lecturer::where( 'user_id', '=', $userid )->first();

            $answer                = new Answer;
            $answer->question_id   = $id;
            $answer->answer        = $request->answer;
            $answer->save();

            $lecturer = Lecturer::findOrFail( $lecturer->id );
            $lecturer->answers()->attach( $answer->id );

	        flash('Reply posted')->success();
            return redirect( route( 'lecturer-forum', $forum->course_id ) );


    }


    }

    public function viewAssignmentSubmissions( $id, $id1){

        $course     = Course::where( 'id', '=', $id )->first();
        $assignment = Assignment::where( 'id', '=', $id1 )->first();

        return view( 'lecturer/viewAssignmentSubmissions', [ 'course' => $course, 'assignment' => $assignment ] );


    }



}
