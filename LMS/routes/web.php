<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/** Auth routes */
Auth::routes();

/** Home Controller */
Route::get( '/', 'HomeController@home' )->name( 'home' );
Route::get( '/dashboard', 'HomeController@index' )->name( 'dashboard' );

/** Admin Controller */
Route::post( '/admin/register-user', 'AdminController@registerUser' )->name( 'register-user' );
Route::get( '/admin/batch-enroll', 'AdminController@getEnrollBatch' )->name( 'batch-enroll' );
Route::post( '/admin/batch-enroll', 'AdminController@postEnrollBatch' )->name( 'batch-enroll' );
Route::get( '/admin/announcements', 'AdminController@announcements' )->name( 'announcements' );
Route::get( '/admin/create-announcement', 'AdminController@getAnnounce' )->name( 'create-announcement' );
Route::post( '/admin/create-announcement', 'AdminController@postAnnounce' )->name( 'create-announcement' );
Route::get( '/admin/lectures', 'AdminController@lecturersList' )->name( 'admin-lectures' );
Route::get( '/admin/lecture/{id}', 'AdminController@lecturer' )->name( 'admin-lecturer' );
Route::get( '/admin/students', 'AdminController@studentsList' )->name( 'admin-students' );
Route::get( '/admin/student/{id}', 'AdminController@student' )->name( 'admin-student' );
Route::get( '/admin/add-course', 'AdminController@getAddCourse' )->name( 'add-course' );
Route::post( '/admin/add-course', 'AdminController@postAddCourse' )->name( 'add-course' );
Route::post( '/admin/edit-course/{id}', 'AdminController@postEditCourse' )->name( 'edit-course' );
Route::get( '/admin/edit-course/{id}', 'AdminController@getEditCourse' )->name( 'edit-course' );
Route::get( '/admin/courses', 'AdminController@coursesList' )->name( 'admin-courses' );
Route::get( '/admin/course/{id}', 'AdminController@course' )->name( 'admin-course' );
Route::get( '/admin/course/forum/{id}', 'AdminController@forum' )->name( 'admin-forum' );
Route::get( '/admin/enroll-courses', 'AdminController@getEnrollCourse' )->name( 'enroll-course' );
Route::post( '/admin/enroll-courses', 'AdminController@postEnrollCourse' )->name( 'enroll-course' );

/** Lecturer Controller */
Route::get( '/lecturer/courses', 'LecturerController@courses' )->name( 'lecturer-courses' );
Route::get( '/lecturer/courses/unenroll-course', 'LecturerController@unenrollCourse' )->name( 'lecturer-unenroll-courses' );
Route::get( '/lecturer/course/{id}', 'LecturerController@getCourse' )->name( 'lecturer-course' );
Route::get( '/lecturer/course/{id}/add-assignment', 'LecturerController@addAssignment' )->name( 'lecturer-addAssignment' );
Route::post( '/lecturer/course/{id}/add-assignment', 'LecturerController@storeAssignment' )->name( 'lecturer-addAssignment' );
Route::get( '/lecturer/course/{id}/add-lecture-notes', 'LecturerController@addLectureNotes' )->name( 'lecturer-addLectureNotes' );
Route::post( '/lecturer/course/{id}/add-lecture-notes', 'LecturerController@storeLectureNotes' )->name( 'lecturer-addLectureNotes' );
Route::get( '/lecturer/course/{id}/add-notice', 'LecturerController@addNotice' )->name( 'lecturer-addNotice' );
Route::post( '/lecturer/course/{id}/add-notice', 'LecturerController@storeNotice' )->name( 'lecturer-addNotice' );
Route::get( '/lecturer/course/{id}/add-quiz', 'LecturerController@getAddQuiz' )->name( 'lecturer-addQuiz' );
Route::post( '/lecturer/course/{id}/add-quiz', 'LecturerController@postAddQuiz' )->name( 'lecturer-addQuiz' );
Route::get( '/lecturer/course/{id}/add-submission', 'LecturerController@addSubmission' )->name( 'lecturer-addSubmission' );
Route::post( '/lecturer/course/{id}/add-submission', 'LecturerController@storeSubmission' )->name( 'lecturer-addSubmission' );
Route::get( '/lecturer/course/{id}/edit-assignment/{id1}', 'LecturerController@editAssignment' )->name( 'lecturer-editAssignment' );
Route::post( '/lecturer/course/{id}/edit-assignment/{id1}', 'LecturerController@changeAssignment' )->name( 'lecturer-editAssignment' );
Route::get( '/lecturer/course/{id}/get-assignment-file/{id1}', 'LecturerController@getFileAssignment' )->name( 'lecturer-getFileAssignment' );
Route::get( '/lecturer/course/{id}/delete-assignment-file/{id1}', 'LecturerController@deleteFileAssignment' )->name( 'lecturer-deleteFileAssignment' );
Route::get( '/lecturer/course/{id}/edit-lecturenote/{id1}', 'LecturerController@editLectureNotes' )->name( 'lecturer-editLectureNotes' );
Route::post( '/lecturer/course/{id}/edit-lecturenote/{id1}', 'LecturerController@changeLectureNotes' )->name( 'lecturer-editLectureNotes' );
Route::get( '/lecturer/course/{id}/get-lecturenote-file/{id1}', 'LecturerController@getFileLectureNote' )->name( 'lecturer-getFileLectureNote' );
Route::get( '/lecturer/course/{id}/delete-lecturenote-file/{id1}', 'LecturerController@deleteFileLectureNote' )->name( 'lecturer-deleteFileLectureNote' );
Route::get( '/lecturer/course/{id}/edit-notice/{id1}', 'LecturerController@editNotice' )->name( 'lecturer-editNotice' );
Route::post( '/lecturer/course/{id}/edit-notice/{id1}', 'LecturerController@changeNotice' )->name( 'lecturer-editNotice' );
Route::get( '/lecturer/course/{id}/get-notice-file/{id1}', 'LecturerController@getFileNotice' )->name( 'lecturer-getFileNotice' );
Route::get( '/lecturer/course/{id}/delete-notice-file/{id1}', 'LecturerController@deleteFileNotice' )->name( 'lecturer-deleteFileNotice' );
Route::get( '/lecturer/course/{id}/edit-Submission/{id1}', 'LecturerController@editSubmission' )->name( 'lecturer-editSubmission' );
Route::post( '/lecturer/course/{id}/edit-Submission/{id1}', 'LecturerController@changeSubmission' )->name( 'lecturer-editSubmission' );
Route::get( '/lecturer/course/{id}/get-Submission-file/{id1}', 'LecturerController@getFileSubmission' )->name( 'lecturer-getFileSubmission' );
Route::get( '/lecturer/course/{id}/delete-Submission-file/{id1}', 'LecturerController@deleteFileSubmission' )->name( 'lecturer-deleteFileSubmission' );
Route::get( '/lecturer/course/{id}/down-lecturenote/{id1}', 'LecturerController@downLectureNote' )->name( 'lecturer-downlecturenote' );
Route::get( '/lecturer/course/{id}/down-notice/{id1}', 'LecturerController@downNotice' )->name( 'lecturer-downnotice' );
Route::get( '/lecturer/course/{id}/down-Submission/{id1}', 'LecturerController@downSubmission' )->name( 'lecturer-downSubmission' );
Route::get( '/lecturer/course/{id}/down-assignment/{id1}', 'LecturerController@downAssignment' )->name( 'lecturer-downAssignment' );
Route::get( '/lecturer/course/{id}/delete-Submission/{id1}', 'LecturerController@deleteSubmission' )->name( 'lecturer-deleteSubmission' );
Route::get( '/lecturer/course/{id}/delete-assignment/{id1}', 'LecturerController@deleteAssignment' )->name( 'lecturer-deleteAssignment' );
Route::get( '/lecturer/course/{id}/delete-notice/{id1}', 'LecturerController@deleteNotice' )->name( 'lecturer-deleteNotice' );
Route::get( '/lecturer/course/{id}/delete-lecturenote/{id1}', 'LecturerController@deleteLectureNote' )->name( 'lecturer-deleteLectureNote' );
Route::get( '/lecturer/course/forum/{id}', 'LecturerController@viewForum' )->name( 'lecturer-forum' );

/** Student Controller  */
/**Quiz view*/
route::get( '/student/course/quiz', 'StudentController@showQuizz' )->name( 'Quiz-Student' );

Route::get( '/student/courses', 'StudentController@courses' )->name( 'student-courses' );
Route::get( '/student/course/{id}', 'StudentController@getCourse' )->name( 'student-course' );
#Assignment Submissions
Route::get( '/student/course/{courseid}/submit-assignment/{assignmentid}', 'StudentController@getSubmitAssignment' )->name( 'student-submitAssignment-get' );
Route::post( '/student/course/{courseid}/submit-assignment/{assignmentid}', 'StudentController@storeSubmitAssignment' )->name( 'student-submitAssignment' );
Route::get( '/student/course/{id}/submit-quiz', 'StudentController@submitQuiz' )->name( 'student-submitQuiz' );
#Edit Assignment Submissions
Route::get( '/student/course/{courseid}/edit-assignment/{assignmentid}', 'StudentController@editAssignmentSubmission' )->name( 'student-editAssignmentSubmission' );
Route::post( '/student/course/{courseid}/edit-assignment/{assignmentid}', 'StudentController@storeEditSubmissionAssignment' )->name( 'student-editAssignmentSubmission' );
#Download Notices
route::get( '/student/course/{courseid}/download-notice/{noticeid}', 'StudentController@downloadNotice' )->name( 'downloadNotice' );
#Download Lecture Notes
route::get( '/student/course/{courseid}/download-lecture-note/{lectureNoteid}', 'StudentController@downloadLectureNote' )->name( 'downloadLectureNote' );
#Download Assignment
route::get( '/student/course/{courseid}/download-assignment/{assignmentid}', 'StudentController@downloadAssignment' )->name( 'downloadAssignment' );
#Download Submission
route::get( '/student/course/{courseid}/submission/{submissionid}', 'StudentController@downloadSubmission' )->name( 'downloadSubmission' );
#Submission , submissions
Route::get( '/student/course/{courseid}/submit-task/{submissionid}', 'StudentController@getSubmissions' )->name( 'student-submit-submissions' );
Route::post( '/student/course/{courseid}/submit-task/{submissionid}', 'StudentController@postSubmissions' )->name( 'student-submit-submissions' );
#edit Task Submission
Route::post( '/student/course/{courseid}/edit-task/{submissionid}', 'StudentController@editTaskSubmissions' )->name( 'edit-student-task' );

#Student Attendance Excuses
Route::get( '/student/attendance-excuses/', 'StudentController@studentAttendaceExcuses' )->name( 'student-attendace-excuses' );


#Student Medicals
Route::get( '/student/exam-medical/', 'StudentController@studentExamMedicals' )->name( 'student-exam-medicals' );

#Pass values to generate PDF


Route::post( '/student/store-medical', 'StudentController@storeMedicalPDF' )->name( 'submit-medical' );


Route::get( '/student/store-medical/generate-medical/{id}', 'StudentController@generateMedicalPDF' )->name( 'generate-medical' );


#course actions
Route::get( '/student/course-action', 'StudentController@courseAction' )->name( 'student-course-action' );
#Enroll
Route::get( '/student/enroll-course/{id}', 'StudentController@enrollCourse' )->name( 'student-enroll-course' );
#UnEnroll
Route::get( '/student/unenroll-course', 'StudentController@unEnrollCourse' )->name( 'student-unenroll-course' );


/**Email Controller */

Route::get( '/student/email-user', 'EmailController@getEmail' )->name( 'email-user');


/** Exam Controller  */
Route::get( '/add-results', 'ExamController@getAddResults' )->name( 'add-results' );
Route::post( '/add-results', 'ExamController@postAddResults' )->name( 'add-results' );
Route::get( '/add-results-manually', 'ExamController@getAddResults' )->name( 'add-results-manually' );
Route::post( '/add-results-manually', 'ExamController@postAddResults' )->name( 'add-results-manually' );
Route::get( '/add-results-using-csv', 'ExamController@getAddResultsUsingCSV' )->name( 'add-results-using-csv' );
Route::post( '/add-results-using-csv', 'ExamController@postAddResultsUsingCSV' )->name( 'add-results-using-csv' );
Route::get( '/add-results-to/{id}', 'ExamController@getAddResultsTo' )->name( 'add-results-to' );
Route::post( '/add-results-to/{id}', 'ExamController@postAddResultsTo' )->name( 'add-results-to' );

/** Quiz Controller */
Route::get( '/course/{id1}/quiz/{id2}/add-question', 'QuizController@getAddQuestion' )->name( 'add-question' );
Route::post( '/course/{id1}/quiz/{id2}/add-question', 'QuizController@postAddQuestion' )->name( 'add-question' );
Route::post( '/course/{id1}/quiz/{id2}/submit-quiz', 'QuizController@submitQuiz' )->name( 'submit-quiz' );
Route::get( '/course/{id1}/quiz/{id2}/view-quiz', 'QuizController@getQuiz' )->name( 'view-quiz' );
