<?php

namespace App\Http\Controllers;

use App\Assignment;
use App\AssignmentSubmission;
use App\Course;
use App\EnrollStudent;
use App\Feedback;
use App\LectureNote;
use App\Lecturer;
use App\Notice;
use App\Quiz;
use App\QuizQuestion;
use App\Result;
use App\Student;
use App\Submission;
use App\SubmitAssignment;
use App\SubmitSubmission;
use App\MedicalReports;
use App\Forum;
use App\Question;
use App\Answer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
Use PDF;

class StudentController extends Controller {
	public function __construct() {
		$this->middleware( 'auth' );
	}


    public function listStudents(){
        $students = Student::all();


        return view('student.studentList',
            ['students'=>$students
//            'lecturers'=>$lecturers
        ]
        );
        }

    public function studentFeedback() {

        $userid          = Auth::user()->id;
        $student         = Student::where( 'user_id', '=', $userid )->first();
        $courses         = Course::where('year','=',$student->year)->get();
        $lecturers       = Lecturer::all();

	    return view('student.feedback',['courses'=>$courses,
            'lecturers'=>$lecturers
        ]);
    }


    public function storeFeedback(Request $request) {

        $storeFeedback                = new Feedback();
        $storeFeedback->course    =   $request->input( 'course' );
        $storeFeedback->lecturer     = $request->input( 'lecturer' );
        $storeFeedback->lec_impression	= $request->q1;
        $storeFeedback->course_impression     = $request->q2;
        $storeFeedback->suggestions     = $request->q3;

        $storeFeedback->save();
        flash( 'Feedback Submitted' )->success();

        return redirect( route( 'student-feedback-forum' ) );



    }

//	results start
	public function getResults() {
		$userid = Auth::user()->id;
		$id     = Student::where( 'user_id', '=', $userid )->first()->index_number;
		$results = Result::where( 'index_number', '=', $id )->get();

		return view( 'student.results', [ 'results' => $results ] );
	}





	public function getGpa() {
	    $studs = Student::all();
        $studCourses = Course::all();
        $rank = array();
        $index = Auth::user()->username;


	    foreach($studs as $stud){
            $studResults = Result::where( 'index_number', '=', $stud->index_number )->get();
//            foreach($studCourses as $studCourse) {
//                foreach ($studResults as $studResult) {
//                }}

            $Sgpa = 0; $StotalCredits =0 ; $Scgpa =0; $SgpaFinal=0;

            if($studResults != NULL) {
                foreach ($studCourses as $studCourse) {
                    foreach ($studResults as $studResult) {
                        if ($studResult->course_id == $studCourse->course_id) {
                            if ($studResult->final_grade == 'A+') {
                                $StotalCredits = $StotalCredits + $studCourse->credits;
                                $Scgpa = $Scgpa + $studCourse->credits * 4.25;
                            }
                            if ($studResult->final_grade == 'A') {
                                $StotalCredits = $StotalCredits + $studCourse->credits;
                                $Scgpa = $Scgpa + $studCourse->credits * 4.00;
                            }
                            if ($studResult->final_grade == 'A-') {
                                $StotalCredits = $StotalCredits + $studCourse->credits;
                                $Scgpa = $Scgpa + $studCourse->credits * 3.75;
                            }
                            if ($studResult->final_grade == 'B+') {
                                $StotalCredits = $StotalCredits + $studCourse->credits;
                                $Scgpa = $Scgpa + $studCourse->credits * 3.25;
                            }
                            if ($studResult->final_grade == 'B') {
                                $StotalCredits = $StotalCredits + $studCourse->credits;
                                $Scgpa = $Scgpa + $studCourse->credits * 3.00;
                            }
                            if ($studResult->final_grade == 'B-') {
                                $StotalCredits = $StotalCredits + $studCourse->credits;
                                $Scgpa = $Scgpa + $studCourse->credits * 2.75;
                            }


                        }
                    }
                }
                if($StotalCredits == 0){
                    $SgpaFinal == 0 ;
                }

                else{
                    $Sgpa = $Scgpa / $StotalCredits;
                    $SgpaFinal = floor($Sgpa * 10000) / 10000;

                }


//            dd($SgpaFinal);

//            $age=array($stud->index_number=>$SgpaFinal);
                $rank[$stud->index_number] = $SgpaFinal;
//            array_push($age,$stud->index_number,$SgpaFinal);

//


                $sortedRanks = collect($rank)->sortBy($SgpaFinal[0])->reverse()->toArray();
//                dd($sortedRanks);
//            foreach ($Offer as $key => $value) {
//                $offerArray[$key] = $value[4];
//            }

            }
	                }

     //   dd($sortedRanks);
// *********************************
        $userid  = Auth::user()->id;
        $student = Student::where( 'user_id', '=', $userid )->first();
        $courses = Course::all();
        $results = Result::where( 'index_number', '=', $student->index_number )->get();
        $gpa = 0;
        $totalCredits =0 ;
        $cgpa =0;
        $gpaFinal=0;

        foreach($courses as $course) {
            foreach ($results as $result) {
                if ($result->course_id == $course->course_id) {
                    if($result->final_grade == 'A+'){
                        $totalCredits = $totalCredits + $course->credits;
                        $cgpa = $cgpa + $course->credits*4.25;
                    }
                    if($result->final_grade == 'A'){
                        $totalCredits = $totalCredits + $course->credits;
                        $cgpa = $cgpa + $course->credits*4.0;
                    }
                    if($result->final_grade == 'A-'){
                        $totalCredits = $totalCredits + $course->credits;
                        $cgpa = $cgpa + $course->credits*3.75;
                    }
                    if($result->final_grade == 'B+'){
                        $totalCredits = $totalCredits + $course->credits;
                        $cgpa = $cgpa+ $course->credits*3.25;
                    }
                    if($result->final_grade == 'B'){
                        $totalCredits = $totalCredits + $course->credits;
                        $cgpa = $cgpa+ $course->credits*3.0;
                    }
                    if($result->final_grade == 'B-'){
                        $totalCredits = $totalCredits + $course->credits;
                        $cgpa = $cgpa+ $course->credits*2.75;
                    }
                    if($result->final_grade == 'C+'){
                        $totalCredits = $totalCredits + $course->credits;
                        $cgpa = $cgpa+ $course->credits*2.25;
                    }
                    if($result->final_grade == 'C'){
                        $totalCredits = $totalCredits + $course->credits;
                        $cgpa = $cgpa+ $course->credits*2.0;
                    }
                    if($result->final_grade == 'C-'){
                        $totalCredits = $totalCredits + $course->credits;
                        $cgpa = $cgpa+ $course->credits*1.75;
                    }
                    if($result->final_grade == 'D+'){
                        $totalCredits = $totalCredits + $course->credits;
                        $cgpa = $cgpa+ $course->credits*1.25;
                    }
                    if($result->final_grade == 'D'){
                        $totalCredits = $totalCredits + $course->credits;
                        $cgpa = $cgpa+ $course->credits*1.00;
                    }
                    if($result->final_grade == 'D-'){
                        $totalCredits = $totalCredits + $course->credits;
                        $cgpa = $cgpa+ $course->credits*0.75;
                    }
                    if($result->final_grade == 'E'){
                        $totalCredits = $totalCredits + $course->credits;
                        $cgpa = $cgpa+ $course->credits*0.00;
                    }

                    $gpa = $cgpa/$totalCredits;
                    $gpaFinal = floor($gpa * 10000) / 10000;

                }}
        }
//        dd($rank);

		return view( 'student.gpa',['student'=> $student,

            'results'=>$results,
            'userid'=>$userid,
            'gpaFinal'=>$gpaFinal,
            'rank'=>$rank,
        'sortedRanks'=>$sortedRanks,
            'index'=>$index,
//
        ]);
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
        $semesterSevens = Course::where('semester','=','7')->get();
        $semesterEights = Course::where('semester','=','8')->get();

        $results = Result::where( 'index_number', '=', $student->index_number )->get();
//        dd($semesterOnes);

        return view( 'student.results',['student'=> $student,
            'semesterOnes'=>$semesterOnes,
            'semesterTwos'=>$semesterTwos,
            'semesterThrees'=>$semesterThrees,
            'semesterFours'=>$semesterFours,
            'semesterFives'=>$semesterFives,
            'semesterSixs'=>$semesterSixs,
            'semesterSevens'=>$semesterSevens,
            'semesterEights'=>$semesterEights,
            'results'=>$results
        ]);

    }





//	results end

	public function courses() {
		$courses = Auth::user()->students->first()->courses;

		return view( 'student/mycourses', [ 'courses' => $courses ] );
	}

	public function getCourse( $id ) {
		$userid  = Auth::user()->id;
		$student = Student::where( 'user_id', '=', $userid )->first();

		$currentstudent = $student->id;
		$course         = Course::where( 'id', '=', $id )->first();
		$assignments    = Assignment::where( 'course_id', '=', $id )->get();
		$notices        = Notice::where( 'course_id', '=', $id )->get();
		$lectureNotes   = LectureNote::where( 'course_id', '=', $id )->get();
		$submissions    = Submission::where( 'course_id', '=', $id )->get();
		$results        = AssignmentSubmission::where( 'student_id', '=', $currentstudent )->where( 'course_id', '=', $id )->get();

		$res = SubmitSubmission::where( 'student_id', '=', $currentstudent )->where( 'course_id', '=', $id )->get();

		$count = 0;

		$quiz = Quiz::where( 'course_id', '=', $id )->get();

		return view( 'student/course', [
			'course'       => $course,
			'assignments'  => $assignments,
			'notices'      => $notices,
			'lectureNotes' => $lectureNotes,
			'submissions'  => $submissions,
			'results'      => $results,
			'count'        => $count,
			'res'          => $res,
			'quizes'       => $quiz
		] );
	}

	public function submitQuiz( $id ) {
		$course = Course::where( 'course_id', '=', $id )->first();

		return view( 'student/submitQuiz', [ 'course' => $course ] );
	}

	public function showQuizz( $id ) {
		$quiz      = Quiz::where( 'id', '=', $id )->first();
		$questions = QuizQuestion::where( 'quiz_id', '=', $id )->get();

		return view( 'student/showQuiz', [ 'quiz' => $quiz, 'questions' => $questions ] );
	}

	public function showThisQuiz( Request $request ) {
//        $course = Course::where( 'course_id', '=', $id )->first();

//        $answer = QuizQuestion::where()

//        $result= $request->$question->id;
//        dd($result);

//        $result = $
//        return 123;

//        return view( 'student/submitQuiz', [ 'course' => $course ] );
	}


	public function courseAction() {
		$userid          = Auth::user()->id;
		$student         = Student::where( 'user_id', '=', $userid )->first();
		$degree = $student->degree;
		$courses         = Course::where('year','=',$student->year)->where('degree','=',$degree)->get();
		$enrolledCourses = DB::table( 'courses_students' )->select( 'course_id', 'student_id' )->get();
		$courseCount     = count( $enrolledCourses );

		return view( 'student/student-enroll-course', [
			'courses'         => $courses,
			'enrolledCourses' => $enrolledCourses,
			'courseCount'     => $courseCount,
			'student'         => $student
		] );
	}

//    public function postEnrollCourse(Request $request){
//        $student_id = Auth::user()->students->first()->id;
//        $student = Student::findOrFail($student_id);
//        $student->courses()->attach($request->course_id);
//
//        return redirect(route('dashboard'));
//    }


	public function enrollCourse( Request $request, $id ) {

		$userid  = $request->user()->id;
		$student = Student::where( 'user_id', '=', $userid )->first();
		$course  = Course::findOrFail( $id );
		$course->students()->attach( $student->id );

		flash( 'Course enrolled' )->success();

		return redirect( route( 'student-course-action' ) );
	}

	public function unEnrollCourse( Request $request ) {

		$userid  = $request->user()->id;
		$course  = Course::findOrFail( $request->course_id );
		$student = Student::where( 'user_id', '=', $userid )->first();
		$course->students()->detach( $student->id );

		flash( 'Course unenrolled' )->success();

		return redirect( route( 'student-course-action' ) );
	}

	public function getSubmitAssignment( $courseid, $assignmentid ) {
		$course            = Course::where( 'id', '=', $courseid )->first();
		$userid            = Auth::user()->id;
		$student           = Student::where( 'user_id', '=', $userid )->first();
		$assignment        = Assignment::where( 'id', '=', $assignmentid )->first();
		$currentstudent    = $student->id;
		$currentassignment = $assignment->id;
		$result            = AssignmentSubmission::where( 'student_id', '=', $currentstudent )->where( 'assignment_id', '=', $currentassignment )->first();
		$ldate             = date( 'Y-m-d H:i:s' );


//        $date = new \DateTime("2006-12-12");
//        $date->modify("+7 day");
//        $dat = $date->format("Y-m-d");
//        $end 	= date_create();
//
////        $date1 = new \DateTime("now");
//
//        return $end;
		return view( 'student/submitAssignment', [
			'course'     => $course,
			'assignment' => $assignment,
			'result'     => $result
		] );
	}

	public function storeSubmitAssignment( Request $request, $courseid, $assignmentid ) {

		$course     = Course::where( 'id', '=', $courseid )->first();
		$userid     = $request->user()->id;
		$student    = Student::where( 'user_id', '=', $userid )->first();
		$assignment = Assignment::where( 'id', '=', $assignmentid )->first();

		if ( $request->has( 'attachment' ) ) {

			$fileNameWithExt = $request->file( 'attachment' )->getClientOriginalName();
			//$fileName        = pathinfo( $fileNameWithExt, PATHINFO_FILENAME );
			$courseID     = $course->course_id;
			$assignmentID = $assignment->assignment_id;
			$path         = 'public/Student Uploads/AssignmentSubmissions/' . $courseID . '/' . $assignmentID;

			$request->file( 'attachment' )->storeAs( $path, $fileNameWithExt );

			$submitAssignment                = new AssignmentSubmission();
			$submitAssignment->student_id    = $student->id;
			$submitAssignment->course_id     = $courseid;
			$submitAssignment->assignment_id = $assignmentid;
			$submitAssignment->title         = $request->title;
			$submitAssignment->description   = $request->description;
			$submitAssignment->attachment    = $fileNameWithExt;
			$submitAssignment->save();

			$student = Student::findOrFail( $student->id );
			$student->assignmentsubmissions()->attach( $submitAssignment->id );

		} else {

			$submitAssignment                = new AssignmentSubmission();
			$submitAssignment->student_id    = $student->id;
			$submitAssignment->course_id     = $courseid;
			$submitAssignment->assignment_id = $assignmentid;
			$submitAssignment->title         = $request->title;
			$submitAssignment->description   = $request->description;
			$submitAssignment->attachment    = NULL;
			$submitAssignment->save();

			$student = Student::findOrFail( $student->id );
			$student->assignmentsubmissions()->attach( $submitAssignment->id );

		}

		flash( 'Assignment submitted' )->success();

		return redirect( route( 'student-submitAssignment-get', [ 'id' => $course->id, 'id1' => $assignment->id ] ) );

	}

	public function editAssignmentSubmission( $courseid, $assignmentid ) {

		$course            = Course::where( 'id', '=', $courseid )->first();
		$userid            = Auth::user()->id;
		$student           = Student::where( 'user_id', '=', $userid )->first();
		$assignment        = Assignment::where( 'id', '=', $assignmentid )->first();
		$currentstudent    = $student->id;
		$currentassignment = $assignment->id;
		$result            = AssignmentSubmission::where( 'student_id', '=', $currentstudent )->where( 'assignment_id', '=', $currentassignment )->first();

		return view( 'student/editSubmissionAssignment', [
			'course'     => $course,
			'assignment' => $assignment,
			'result'     => $result
		] );

	}


	public function storeEditSubmissionAssignment( Request $request, $courseid, $assignmentid ) {

		$course     = Course::where( 'id', '=', $courseid )->first();
		$userid     = $request->user()->id;
		$student    = Student::where( 'user_id', '=', $userid )->first();
		$assignment = Assignment::where( 'id', '=', $assignmentid )->first();

		if ( $request->has( 'attachment' ) ) {

			$fileNameWithExt = $request->file( 'attachment' )->getClientOriginalName();
			//$fileName        = pathinfo( $fileNameWithExt, PATHINFO_FILENAME );
			$courseID     = $course->course_id;
			$assignmentID = $assignment->assignment_id;
			$path         = 'public/Student Uploads/AssignmentSubmissions/' . $courseID . '/' . $assignmentID;

			$request->file( 'attachment' )->storeAs( $path, $fileNameWithExt );

			$submitAssignment                = AssignmentSubmission::find( $assignmentid );
			$submitAssignment->student_id    = $student->id;
			$submitAssignment->course_id     = $courseid;
			$submitAssignment->assignment_id = $assignmentid;
			$submitAssignment->title         = $request->title;
			$submitAssignment->description   = $request->description;
			$submitAssignment->attachment    = $fileNameWithExt;
			$submitAssignment->save();
		} else {

			$submitAssignment                = AssignmentSubmission::find( $assignmentid );
			$submitAssignment->student_id    = $student->id;
			$submitAssignment->course_id     = $courseid;
			$submitAssignment->assignment_id = $assignmentid;
			$submitAssignment->title         = $request->title;
			$submitAssignment->description   = $request->description;
			$submitAssignment->attachment    = null;
			$submitAssignment->save();

		}

		flash( 'Assignment edited' )->success();

		return redirect( route( 'student-submitAssignment-get', [ 'id' => $course->id, 'id1' => $assignment->id ] ) );
	}

	public function downloadNotice( $courseid, $noticeid ) {
		$course   = Course::where( 'id', '=', $courseid )->first();
		$notice   = Notice::where( 'id', '=', $noticeid )->first();
		$courseID = $course->course_id;
		$filename = $notice->attachment;

		$filepath = base_path() . '/public/uploads/' . $courseID . '/notices/' . $filename;

		return response()->download( $filepath );
//        return response()->file($filepath);
	}

	public function downloadLectureNote( $courseid, $lectureNoteid ) {
		$course      = Course::where( 'id', '=', $courseid )->first();
		$lecturenote = LectureNote::where( 'id', '=', $lectureNoteid )->first();
		$courseID    = $course->course_id;
		$filename    = $lecturenote->attachment;

		$filepath = base_path() . '/public/uploads/' . $courseID . '/lecturenotes/' . $filename;

		return response()->download( $filepath );
	}


	public function downloadAssignment( $courseid, $assignmentid ) {
		$course       = Course::where( 'id', '=', $courseid )->first();
		$assignment   = Assignment::where( 'id', '=', $assignmentid )->first();
		$assignmentID = $assignment->assignment_id;
		$courseID     = $course->course_id;
		$filename     = $assignment->attachment;

		$filepath = base_path() . '/public/uploads/' . $courseID . '/assignments/' . $assignmentID . '/' . $filename;

		return response()->download( $filepath );


	}

	public function downloadSubmission( $courseid, $submissionid ) {
		$course       = Course::where( 'id', '=', $courseid )->first();
		$submission   = Submission::where( 'id', '=', $submissionid )->first();
		$submissionID = $submission->title;
		$courseID     = $course->course_id;
		$filename     = $submission->attachment;

		$filepath = base_path() . '/public/uploads/' . $courseID . '/submissions/' . $submissionID . '/' . $filename;

		return response()->download( $filepath );
	}

	public function getSubmissions( $courseid, $submissionid ) {
		$course            = Course::where( 'id', '=', $courseid )->first();
		$userid            = Auth::user()->id;
		$student           = Student::where( 'user_id', '=', $userid )->first();
		$submission        = Submission::where( 'id', '=', $submissionid )->first();
		$currentStudent    = $student->id;
		$currentSubmission = $submission->id;
		$result            = SubmitSubmission::where( 'student_id', '=', $currentStudent )->where( 'submission_id', '=', $currentSubmission )->first();

		return view( 'student/submitSubmission', [
			'course'     => $course,
			'submission' => $submission,
			'result'     => $result
		] );
	}

	public function postSubmissions( Request $request, $courseid, $submissionid ) {

		$course      = Course::where( 'id', '=', $courseid )->first();
		$userid      = $request->user()->id;
		$student     = Student::where( 'user_id', '=', $userid )->first();
		$submisssion = Submission::where( 'id', '=', $submissionid )->first();

		if ( $request->has( 'attachment' ) ) {

			$fileNameWithExt = $request->file( 'attachment' )->getClientOriginalName();
			//$fileName        = pathinfo( $fileNameWithExt, PATHINFO_FILENAME );
			$courseID     = $course->course_id;
			$submissionID = $submisssion->id;
			$path         = 'public/Student Uploads/Task Submissions/' . $courseID . '/' . $submissionID;

			$request->file( 'attachment' )->storeAs( $path, $fileNameWithExt );

			$submitTask                = new SubmitSubmission();
			$submitTask->student_id    = $student->id;
			$submitTask->course_id     = $courseid;
			$submitTask->submission_id = $submissionid;
			$submitTask->title         = $request->title;
			$submitTask->description   = $request->description;
			$submitTask->attachment    = $fileNameWithExt;
			$submitTask->save();

			$student = Student::findOrFail( $student->id );
			$student->submissionsubmissions()->attach( $submitTask->id );

		} else {
			$submitTask                = new SubmitSubmission();
			$submitTask->student_id    = $student->id;
			$submitTask->course_id     = $courseid;
			$submitTask->submission_id = $submissionid;
			$submitTask->title         = $request->title;
			$submitTask->description   = $request->description;
			$submitTask->attachment    = NULL;
			$submitTask->save();

			$student = Student::findOrFail( $student->id );
			$student->submissionsubmissions()->attach( $submitTask->id );

		}

		flash( 'Submission submitted' )->success();

		return redirect( route( 'student-submit-submissions', [
			'courseid'     => $course->id,
			'submissionid' => $submisssion->id
		] ) );
	}


	public function editTaskSubmissions( Request $request, $courseid, $submissionid ) {

		$course  = Course::where( 'id', '=', $courseid )->first();
		$userid  = $request->user()->id;
		$student = Student::where( 'user_id', '=', $userid )->first();
		// $submisssion = Submission::where('id', '=', $submissionid)->first();
		$current = SubmitSubmission::where( 'id', '=', $submissionid )->first();

		if ( $request->has( 'attachment' ) ) {

			$fileNameWithExt = $request->file( 'attachment' )->getClientOriginalName();
			//$fileName        = pathinfo( $fileNameWithExt, PATHINFO_FILENAME );
			$courseID     = $course->course_id;
			$submissionID = $current->submission_id;
			$path         = 'public/Student Uploads/Task Submissions/' . $courseID . '/' . $submissionID;

			$request->file( 'attachment' )->storeAs( $path, $fileNameWithExt );

			$submitTask                = SubmitSubmission::find( $submissionid );
			$submitTask->student_id    = $student->id;
			$submitTask->course_id     = $courseid;
			$submitTask->submission_id = $submissionid;
			$submitTask->title         = $request->title;
			$submitTask->description   = $request->description;
			$submitTask->attachment    = $fileNameWithExt;
			$submitTask->save();

		} else {

			$submitTask                = SubmitSubmission::find( $submissionid );
			$submitTask->student_id    = $student->id;
			$submitTask->course_id     = $courseid;
			$submitTask->submission_id = $submissionid;
			$submitTask->title         = $request->title;
			$submitTask->description   = $request->description;
			$submitTask->attachment    = null;
			$submitTask->save();
		}

		flash( 'Submission edited' )->success();

		return redirect( route( 'student-submit-submissions', [
			'courseid'     => $course->id,
			'submissionid' => $submissionid
		] ) );
//        return redirect(route('student-submit-submissions', ['courseid' => $course->id, 'submissionid' => $submisssion->id]));

	}

	public function viewForum( $id ) {

		$forum    = Forum::where( 'course_id', '=', $id )->first();
		$question = Question::where( 'forum_id', '=', $forum->id )->get();
		$qCount   = $question->count();

		return view( 'student.studentForum', [ 'forum' => $forum, 'qCount' => $qCount ] );

	}

	public function askQuestionAnswer( Request $request, $id ) {

		if ( $request->has( 'Ask' ) ) {
			$course  = Course::findOrFail( $id );
			$forum   = Forum::where( 'course_id', '=', $id )->first();
			$userid  = $request->user()->id;
			$student = Student::where( 'user_id', '=', $userid )->first();

			$question           = new Question;
			$question->forum_id = $forum->id;
			$question->question = $request->question;
			$question->save();

//            dd($question->id);

			$student = Student::findOrFail( $student->id );
//           dd($student);
//            $student->questions()->attach( $question->id );
			DB::table( 'questions_students' )->insert(
				[
					'question_id' => $question->id,
					'student_id'  => $student->id,
					'created_at'  => date( 'Y-m-d H:i:s' ),
					'updated_at'  => date( 'Y-m-d H:i:s' )
				]
			);
			flash( 'Question posted' )->success();

			return redirect( route( 'student-forum', $course->id ) );
		}

		if ( $request->has( 'Reply' ) ) {
			$question = Question::findOrFail( $id );
			$forum    = Forum::where( 'id', '=', $question->forum_id )->first();
			$userid   = $request->user()->id;
			$student  = Student::where( 'user_id', '=', $userid )->first();

			$answer              = new Answer;
			$answer->question_id = $id;
			$answer->answer      = $request->answer;
			$answer->save();

//            $student = Student::findOrFail( $student->id );
//            $student->answers()->attach( $answer->id );

			DB::table( 'answers_students' )->insert(
				[
					'answer_id'  => $answer->id,
					'student_id' => $student->id,
					'created_at' => date( 'Y-m-d H:i:s' ),
					'updated_at' => date( 'Y-m-d H:i:s' )
				]
			);

			flash( 'Reply posted' )->success();

			return redirect( route( 'student-forum', $forum->course_id ) );

		}


	}


	public function studentAttendaceExcuses() {

		$courses  = Auth::user()->students->first()->courses;
		$userid   = Auth::user()->id;
		$students = Student::where( 'user_id', '=', $userid )->first();


		return view( 'student/studentAttendaceExcuses', [ 'courses' => $courses, 'student' => $students ] );
	}

	public function studentExamMedicals() {

		$courses  = Auth::user()->students->first()->courses;
		$userid   = Auth::user()->id;
		$students = Student::where( 'user_id', '=', $userid )->first();

		return view( 'student/examMedicals', [ 'courses' => $courses, 'student' => $students ] );
	}

	public function storeMedicalPDF( Request $request ) {
		$userid  = $request->user()->id;
		$student = Student::where( 'user_id', '=', $userid )->first();

		if ( $request->has( 'attachment' ) ) {

			$fileNameWithExt = $request->file( 'attachment' )->getClientOriginalName();
			$fileName        = pathinfo( $fileNameWithExt, PATHINFO_FILENAME );
			$courseID        = $request->course_name;
			$path            = 'public/Student Uploads/Medical Reports/' . $courseID;

			$request->file( 'attachment' )->storeAs( $path, $fileNameWithExt );

			$report             = new MedicalReports();
			$report->student_id = $student->id;
			$report->course_id  = $request->course_id;
			$report->year       = $request->input( 'years' );
			$report->semester   = $request->input( 'semester' );
			$report->causes     = $request->causes;
			$report->remarks    = $request->remarks;
			$report->attachment = $fileName;

			$report->save();

			$lastInsertedID = $report->id;
			$medical        = MedicalReports::find( $lastInsertedID );

		} else {
			$report             = new MedicalReports();
			$report->student_id = $student->id;
			$report->course_id  = $request->course_id;
			$report->causes     = $request->causes;
			$report->remarks    = $request->remarks;
			$report->attachment = null;
			$report->save();

		}

		flash( 'Medical submitted' )->success();

		return view( 'student/MedicalReport', [
			'lastID'  => $lastInsertedID,
			'medical' => $medical,
			'student' => $student
		] );
	}

	public function generateMedicalPDF( $id ) {

		$medical = MedicalReports::find( $id );
		$userid  = Auth::user()->id;
		$student = Student::where( 'user_id', '=', $userid )->first();

		$pdf = PDF::loadView( 'student/convertedPdf', compact( 'medical', 'student' ) );

		return $pdf->download( 'Medical_Report.pdf' );


//        $medical = MedicalReports::where('id', '=', $id)->first();
//
//        $a=$medical->id;
//
//
//        return $a;


	}


//    public function Testing()
//    {
//
////        $user = DB::table('submit_submissions')->where('submission_id', '1')->first();
////        DB::table('submit_submissions')->where('submission_id', '==', '1')->delete();
//
////        $del = SubmitSubmission::find($submissionid);
////        $del->delete();
//
////        dd($submissionid);


////
////        return 123;
//
//
//    }


}

