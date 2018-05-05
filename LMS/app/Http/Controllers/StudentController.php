<?php

namespace App\Http\Controllers;

use App\Assignment;
use App\AssignmentSubmission;
use App\Course;
use App\EnrollStudent;
use App\LectureNote;
use App\Notice;
use App\Student;
use App\Submission;
use App\SubmitAssignment;
use App\SubmitSubmission;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    public function __construct()
    {
        $this->middleware('student');
    }

    public function courses()
    {
        $courses = Auth::user()->students->first()->courses;
        return view('student/mycourses', ['courses' => $courses]);
    }

    public function getCourse($id)
    {
        $userid = Auth::user()->id;
        $student = Student::where('user_id', '=', $userid)->first();

        $currentstudent = $student->id;
        $course = Course::where('id', '=', $id)->first();
        $assignments = Assignment::where('course_id', '=', $id)->get();
        $notices = Notice::where('course_id', '=', $id)->get();
        $lectureNotes = LectureNote::where('course_id', '=', $id)->get();
        $submissions = Submission::where('course_id', '=', $id)->get();
        $results = AssignmentSubmission::where('student_id', '=', $currentstudent)->where('course_id', '=', $id)->get();

        $res = SubmitSubmission::where('student_id', '=', $currentstudent)->where('course_id', '=', $id)->get();

        $count = 0;


        return view('student/course', ['course' => $course, 'assignments' => $assignments, 'notices' => $notices, 'lectureNotes' => $lectureNotes, 'submissions' => $submissions, 'results' => $results, 'count' => $count,'res'=>$res]);
    }

    public function submitQuiz($id)
    {
        $course = Course::where('course_id', '=', $id)->first();

        return view('student/submitQuiz', ['course' => $course]);
    }

    public function courseAction()
    {
        $courses = Course::all();
        return view('student/student-enroll-course', ['courses' => $courses]);
    }

//    public function postEnrollCourse(Request $request){
//        $student_id = Auth::user()->students->first()->id;
//        $student = Student::findOrFail($student_id);
//        $student->courses()->attach($request->course_id);
//
//        return redirect(route('dashboard'));
//    }


    public function enrollCourse(Request $request, $id)
    {

        $userid = $request->user()->id;
        $student = Student::where('user_id', '=', $userid)->first();
        $course = Course::findOrFail($id);
        $course->students()->attach($student->id);
        return redirect(route('student-course-action'));
    }

    public function unEnrollCourse(Request $request)
    {

        $userid = $request->user()->id;
        $student = Student::where('user_id', '=', $userid)->first();
        $course = Course::findOrFail($request->course_id);
        $course->students()->detach($student->id);

        return redirect(route('student-course-action'));
    }

    public function getSubmitAssignment($courseid, $assignmentid)
    {
        $course = Course::where('id', '=', $courseid)->first();
        $userid = Auth::user()->id;
        $student = Student::where('user_id', '=', $userid)->first();
        $assignment = Assignment::where('id', '=', $assignmentid)->first();
        $currentstudent = $student->id;
        $currentassignment = $assignment->id;
        $result = AssignmentSubmission::where('student_id', '=', $currentstudent)->where('assignment_id', '=', $currentassignment)->first();
        return view('student/submitAssignment', ['course' => $course, 'assignment' => $assignment, 'result' => $result]);
    }

    public function storeSubmitAssignment(Request $request, $courseid, $assignmentid)
    {

        $course = Course::where('id', '=', $courseid)->first();
        $userid = $request->user()->id;
        $student = Student::where('user_id', '=', $userid)->first();
        $assignment = Assignment::where('id', '=', $assignmentid)->first();

        if ($request->has('attachment')) {

            $fileNameWithExt = $request->file('attachment')->getClientOriginalName();
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            $courseID = $course->course_id;
            $assignmentID = $assignment->assignment_id;
            $path = 'public/Student Uploads/AssignmentSubmissions/' . $courseID . '/' . $assignmentID;

            $request->file('attachment')->storeAs($path, $fileNameWithExt);

            $submitAssignment = new AssignmentSubmission();
            $submitAssignment->student_id = $student->id;
            $submitAssignment->course_id = $courseid;
            $submitAssignment->assignment_id = $assignmentid;
            $submitAssignment->title = $request->title;
            $submitAssignment->description = $request->description;
            $submitAssignment->attachment = $fileName;
            $submitAssignment->save();
        } else {

            $submitAssignment = new AssignmentSubmission();
            $submitAssignment->student_id = $student->id;
            $submitAssignment->course_id = $courseid;
            $submitAssignment->assignment_id = $assignmentid;
            $submitAssignment->title = $request->title;
            $submitAssignment->description = $request->description;
            $submitAssignment->attachment = NULL;
            $submitAssignment->save();

        }

        return redirect(route('student-submitAssignment-get', ['id' => $course->id, 'id1' => $assignment->id]));

    }

    public function editAssignmentSubmission($courseid, $assignmentid)
    {

        $course = Course::where('id', '=', $courseid)->first();
        $userid = Auth::user()->id;
        $student = Student::where('user_id', '=', $userid)->first();
        $assignment = Assignment::where('id', '=', $assignmentid)->first();
        $currentstudent = $student->id;
        $currentassignment = $assignment->id;
        $result = AssignmentSubmission::where('student_id', '=', $currentstudent)->where('assignment_id', '=', $currentassignment)->first();

        return view('student/editSubmissionAssignment', ['course' => $course, 'assignment' => $assignment, 'result' => $result]);

    }


    public function storeEditSubmissionAssignment(Request $request, $courseid, $assignmentid)
    {

        $course = Course::where('id', '=', $courseid)->first();
        $userid = $request->user()->id;
        $student = Student::where('user_id', '=', $userid)->first();
        $assignment = Assignment::where('id', '=', $assignmentid)->first();

        if ($request->has('attachment')) {

            $fileNameWithExt = $request->file('attachment')->getClientOriginalName();
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            $courseID = $course->course_id;
            $assignmentID = $assignment->assignment_id;
            $path = 'public/Student Uploads/AssignmentSubmissions/' . $courseID . '/' . $assignmentID;

            $request->file('attachment')->storeAs($path, $fileNameWithExt);

            $submitAssignment = AssignmentSubmission::find($assignmentid);
            $submitAssignment->student_id = $student->id;
            $submitAssignment->course_id = $courseid;
            $submitAssignment->assignment_id = $assignmentid;
            $submitAssignment->title = $request->title;
            $submitAssignment->description = $request->description;
            $submitAssignment->attachment = $fileName;
            $submitAssignment->save();
        } else
            {

            $submitAssignment = AssignmentSubmission::find($assignmentid);
            $submitAssignment->student_id = $student->id;
            $submitAssignment->course_id = $courseid;
            $submitAssignment->assignment_id = $assignmentid;
            $submitAssignment->title = $request->title;
            $submitAssignment->description = $request->description;
            $submitAssignment->attachment = NULL;
            $submitAssignment->save();

        }
        return redirect(route('student-submitAssignment-get', ['id' => $course->id, 'id1' => $assignment->id]));
    }

    public function downloadNotice($courseid,$noticeid)
    {
            $course = Course::where('id','=',$courseid)->first();
            $notice = Notice::where('id','=',$noticeid)->first();
            $courseID = $course->course_id;
            $filename= $notice->attachment;

        $filepath     = base_path() . '/public/uploads/' . $courseID . '/notices/'.$filename;
        return response()->download($filepath);
    }

    public function downloadLectureNote($courseid,$lectureNoteid)
    {
        $course = Course::where('id','=',$courseid)->first();
        $lecturenote = LectureNote::where('id','=',$lectureNoteid)->first();
        $courseID = $course->course_id;
        $filename= $lecturenote->attachment;

        $filepath     = base_path() . '/public/uploads/' . $courseID . '/lecturenotes/'.$filename;
        return response()->download($filepath);
    }

    public function downloadAssignment($courseid,$assignmentid)
    {
        $course = Course::where('id','=',$courseid)->first();
        $assignment=Assignment::where('id','=',$assignmentid)->first();
        $assignmentID = $assignment->assignment_id;
        $courseID = $course->course_id;
        $filename= $assignment->attachment;

        $filepath     = base_path() . '/public/uploads/' . $courseID . '/assignments/'.$assignmentID.'/'. $filename;
        return response()->download($filepath);
    }

    public function downloadSubmission($courseid,$submissionid)
    {
        $course = Course::where('id','=',$courseid)->first();
        $submission=Submission::where('id','=',$submissionid)->first();
        $submissionID = $submission->title;
        $courseID = $course->course_id;
        $filename= $submission->attachment;

        $filepath     = base_path() . '/public/uploads/' . $courseID . '/submissions/'.$submissionID.'/'. $filename;
        return response()->download($filepath);
    }

    public function getSubmissions($courseid, $submissionid)
    {
        $course = Course::where('id', '=', $courseid)->first();
        $userid = Auth::user()->id;
        $student = Student::where('user_id', '=', $userid)->first();
        $submission = Submission::where('id', '=', $submissionid)->first();
        $currentStudent = $student->id;
        $currentSubmission = $submission->id;
        $result = SubmitSubmission::where('student_id', '=', $currentStudent)->where('submission_id', '=', $currentSubmission)->first();
        return view('student/submitSubmission', ['course' => $course, 'submission' => $submission, 'result' => $result]);
    }

    public function postSubmissions(Request $request, $courseid, $submissionid)
    {

        $course = Course::where('id', '=', $courseid)->first();
        $userid = $request->user()->id;
        $student = Student::where('user_id', '=', $userid)->first();
        $submisssion = Submission::where('id', '=', $submissionid)->first();

        if ($request->has('attachment')) {

            $fileNameWithExt = $request->file('attachment')->getClientOriginalName();
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            $courseID = $course->course_id;
            $submissionID = $submisssion->id;
            $path = 'public/Student Uploads/Task Submissions/' . $courseID . '/' . $submissionID;

            $request->file('attachment')->storeAs($path, $fileNameWithExt);

            $submitTask = new SubmitSubmission();
            $submitTask->student_id = $student->id;
            $submitTask->course_id = $courseid;
            $submitTask->submission_id = $submissionid;
            $submitTask->title = $request->title;
            $submitTask->description = $request->description;
            $submitTask->attachment = $fileName;
            $submitTask->save();
        } else
        {
            $submitTask = new SubmitSubmission();
            $submitTask->student_id = $student->id;
            $submitTask->course_id = $courseid;
            $submitTask->submission_id = $submissionid;
            $submitTask->title = $request->title;
            $submitTask->description = $request->description;
            $submitTask->attachment = NULL;
            $submitTask->save();

        }
        return redirect(route('student-submit-submissions', ['courseid' => $course->id, 'submissionid' => $submisssion->id]));
    }


    public function editTaskSubmissions(Request $request, $courseid, $submissionid)
    {

        $course = Course::where('id', '=', $courseid)->first();
        $userid = $request->user()->id;
        $student = Student::where('user_id', '=', $userid)->first();
        // $submisssion = Submission::where('id', '=', $submissionid)->first();
        $current = SubmitSubmission::where('id', '=', $submissionid)->first();

        if ($request->has('attachment')) {

            $fileNameWithExt = $request->file('attachment')->getClientOriginalName();
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            $courseID = $course->course_id;
            $submissionID = $current->submission_id;
            $path = 'public/Student Uploads/Task Submissions/' . $courseID . '/' . $submissionID;

            $request->file('attachment')->storeAs($path, $fileNameWithExt);

            $submitTask = SubmitSubmission::find($submissionid);
            $submitTask->student_id = $student->id;
            $submitTask->course_id = $courseid;
            $submitTask->submission_id = $submissionid;
            $submitTask->title = $request->title;
            $submitTask->description = $request->description;
            $submitTask->attachment = $fileName;
            $submitTask->save();

        } else {

            $submitTask = SubmitSubmission::find($submissionid);
            $submitTask->student_id = $student->id;
            $submitTask->course_id = $courseid;
            $submitTask->submission_id = $submissionid;
            $submitTask->title = $request->title;
            $submitTask->description = $request->description;
            $submitTask->attachment = NULL;
            $submitTask->save();
        }

        return redirect(route('student-submit-submissions', ['courseid' => $course->id, 'submissionid' => $submissionid]));
//        return redirect(route('student-submit-submissions', ['courseid' => $course->id, 'submissionid' => $submisssion->id]));

    }


    public function deleterow($courseid, $submissionid)
    {

//        $user = DB::table('submit_submissions')->where('submission_id', '1')->first();
//        DB::table('submit_submissions')->where('submission_id', '==', '1')->delete();

        $del = SubmitSubmission::find($submissionid);
        $del->delete();

//        dd($submissionid);
        return 123;


    }
}

