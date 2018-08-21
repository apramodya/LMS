<?php

/** Auth routes */
Auth::routes();

/** Home Controller */
Route::get( '/', 'HomeController@home' )->name( 'home' );
Route::get( '/dashboard', 'HomeController@index' )->name( 'dashboard' );

/** Admin Controller */
Route::prefix( '/admin/' )->group( function () {
	Route::post( 'register-user', 'AdminController@registerUser' )->name( 'register-user' );
	Route::get( 'batch-enroll', 'AdminController@getEnrollBatch' )->name( 'batch-enroll' );
	Route::post( 'batch-enroll', 'AdminController@postEnrollBatch' )->name( 'batch-enroll' );
	Route::get( 'announcements', 'AdminController@announcements' )->name( 'announcements' );
	Route::get( 'create-announcement', 'AdminController@getAnnounce' )->name( 'create-announcement' );
	Route::post( 'create-announcement', 'AdminController@postAnnounce' )->name( 'create-announcement' );
	Route::get( 'lectures', 'AdminController@lecturersList' )->name( 'admin-lectures' );
	Route::get( 'lecture/{id}', 'AdminController@lecturer' )->name( 'admin-lecturer' );
	Route::get( 'students', 'AdminController@studentsList' )->name( 'admin-students' );
	Route::get( 'student/{id}', 'AdminController@student' )->name( 'admin-student' );
	Route::get( 'add-course', 'AdminController@getAddCourse' )->name( 'add-course' );
	Route::post( 'add-course', 'AdminController@postAddCourse' )->name( 'add-course' );
	Route::post( 'edit-course/{id}', 'AdminController@postEditCourse' )->name( 'edit-course' );
	Route::get( 'edit-course/{id}', 'AdminController@getEditCourse' )->name( 'edit-course' );
	Route::get( 'courses', 'AdminController@coursesList' )->name( 'admin-courses' );
	Route::get( 'course/{id}', 'AdminController@course' )->name( 'admin-course' );
	Route::get( 'course/forum/{id}', 'AdminController@forum' )->name( 'admin-forum' );
	Route::get( 'enroll-courses', 'AdminController@getEnrollCourse' )->name( 'enroll-course' );
	Route::post( 'enroll-courses', 'AdminController@postEnrollCourse' )->name( 'enroll-course' );
} );


/** Lecturer Controller */
Route::prefix( '/lecturer/' )->group( function () {
	Route::prefix( 'courses' )->group( function () {
		Route::get( '', 'LecturerController@courses' )->name( 'lecturer-courses' );
		Route::get( '/unenroll-course', 'LecturerController@unenrollCourse' )->name( 'lecturer-unenroll-courses' );
	} );
	Route::prefix( '/course/{id}/' )->group( function () {
		Route::get( '', 'LecturerController@getCourse' )->name( 'lecturer-course' );
		Route::get( 'add-assignment', 'LecturerController@addAssignment' )->name( 'lecturer-addAssignment' );
		Route::post( 'add-assignment', 'LecturerController@storeAssignment' )->name( 'lecturer-addAssignment' );
		Route::get( 'add-lecture-notes', 'LecturerController@addLectureNotes' )->name( 'lecturer-addLectureNotes' );
		Route::post( 'add-lecture-notes', 'LecturerController@storeLectureNotes' )->name( 'lecturer-addLectureNotes' );
		Route::get( 'add-notice', 'LecturerController@addNotice' )->name( 'lecturer-addNotice' );
		Route::post( 'add-notice', 'LecturerController@storeNotice' )->name( 'lecturer-addNotice' );
		Route::get( 'add-quiz', 'LecturerController@getAddQuiz' )->name( 'lecturer-addQuiz' );
		Route::post( 'add-quiz', 'LecturerController@postAddQuiz' )->name( 'lecturer-addQuiz' );
		Route::get( 'add-submission', 'LecturerController@addSubmission' )->name( 'lecturer-addSubmission' );
		Route::post( 'add-submission', 'LecturerController@storeSubmission' )->name( 'lecturer-addSubmission' );
		Route::get( 'edit-assignment/{id1}', 'LecturerController@editAssignment' )->name( 'lecturer-editAssignment' );
		Route::post( 'edit-assignment/{id1}', 'LecturerController@changeAssignment' )->name( 'lecturer-editAssignment' );
		Route::get( 'get-assignment-file/{id1}', 'LecturerController@getFileAssignment' )->name( 'lecturer-getFileAssignment' );
		Route::get( 'delete-assignment-file/{id1}', 'LecturerController@deleteFileAssignment' )->name( 'lecturer-deleteFileAssignment' );
		Route::get( 'edit-lecturenote/{id1}', 'LecturerController@editLectureNotes' )->name( 'lecturer-editLectureNotes' );
		Route::post( 'edit-lecturenote/{id1}', 'LecturerController@changeLectureNotes' )->name( 'lecturer-editLectureNotes' );
		Route::get( 'get-lecturenote-file/{id1}', 'LecturerController@getFileLectureNote' )->name( 'lecturer-getFileLectureNote' );
		Route::get( 'delete-lecturenote-file/{id1}', 'LecturerController@deleteFileLectureNote' )->name( 'lecturer-deleteFileLectureNote' );
		Route::get( 'edit-notice/{id1}', 'LecturerController@editNotice' )->name( 'lecturer-editNotice' );
		Route::post( 'edit-notice/{id1}', 'LecturerController@changeNotice' )->name( 'lecturer-editNotice' );
		Route::get( 'get-notice-file/{id1}', 'LecturerController@getFileNotice' )->name( 'lecturer-getFileNotice' );
		Route::get( 'delete-notice-file/{id1}', 'LecturerController@deleteFileNotice' )->name( 'lecturer-deleteFileNotice' );
		Route::get( 'edit-Submission/{id1}', 'LecturerController@editSubmission' )->name( 'lecturer-editSubmission' );
		Route::post( 'edit-Submission/{id1}', 'LecturerController@changeSubmission' )->name( 'lecturer-editSubmission' );
		Route::get( 'get-Submission-file/{id1}', 'LecturerController@getFileSubmission' )->name( 'lecturer-getFileSubmission' );
		Route::get( 'delete-Submission-file/{id1}', 'LecturerController@deleteFileSubmission' )->name( 'lecturer-deleteFileSubmission' );
		Route::get( 'down-lecturenote/{id1}', 'LecturerController@downLectureNote' )->name( 'lecturer-downlecturenote' );
		Route::get( 'down-notice/{id1}', 'LecturerController@downNotice' )->name( 'lecturer-downnotice' );
		Route::get( 'down-Submission/{id1}', 'LecturerController@downSubmission' )->name( 'lecturer-downSubmission' );
		Route::get( 'down-assignment/{id1}', 'LecturerController@downAssignment' )->name( 'lecturer-downAssignment' );
		Route::get( 'delete-Submission/{id1}', 'LecturerController@deleteSubmission' )->name( 'lecturer-deleteSubmission' );
		Route::get( 'delete-assignment/{id1}', 'LecturerController@deleteAssignment' )->name( 'lecturer-deleteAssignment' );
		Route::get( 'delete-notice/{id1}', 'LecturerController@deleteNotice' )->name( 'lecturer-deleteNotice' );
		Route::get( 'delete-lecturenote/{id1}', 'LecturerController@deleteLectureNote' )->name( 'lecturer-deleteLectureNote' );
		Route::get( 'forum', 'LecturerController@viewForum' )->name( 'lecturer-forum' );
		Route::post( 'forum', 'LecturerController@askQuestionAnswer' )->name( 'lecturer-forumQuestion' );
		Route::get( 'view-assignmentSubmissions/{id1}', 'LecturerController@viewAssignmentSubmissions' )->name( 'lecturer-viewAssignmentSubmissions' );
		Route::get( 'down-assignmentSubmission/{id1}', 'LecturerController@downloadAssignmentSubmissions' )->name( 'lecturer-downloadAssignmentSubmissions' );
		Route::get( 'downall-assignmentSubmission/{id1}', 'LecturerController@downloadAllAssignmentSubmissions' )->name( 'lecturer-downloadAllAssignmentSubmissions' );
		Route::get( 'view-Submissions/{id1}', 'LecturerController@viewSubmissions' )->name( 'lecturer-viewSubmissions' );
		Route::get( 'down-SubmitSubmission/{id1}', 'LecturerController@downloadSubmissions' )->name( 'lecturer-downloadSubmissions' );
		Route::get( 'downall-SubmitSubmission/{id1}', 'LecturerController@downloadAllSubmissions' )->name( 'lecturer-downloadAllSubmissions' );
	} );
} );

/** Student Controller  */
Route::prefix( '/student/' )->group( function () {
	Route::get( 'courses', 'StudentController@courses' )->name( 'student-courses' );

	# results
	Route::get( 'results', 'StudentController@getResults' )->name( 'student-results' );
	Route::post( 'results', 'StudentController@postResults' )->name( 'student-results' );
	Route::get( 'gpa', 'StudentController@getGpa' )->name( 'student-gpa' );
	Route::post( 'gpa', 'StudentController@postGpa' )->name( 'student-gpa' );
	#course routes
	Route::prefix( 'course/' )->group( function () {
		Route::get( '{id}', 'StudentController@getCourse' )->name( 'student-course' );
		#Assignment Submissions
		Route::get( '{courseid}/submit-assignment/{assignmentid}', 'StudentController@getSubmitAssignment' )->name( 'student-submitAssignment-get' );
		Route::post( '{courseid}/submit-assignment/{assignmentid}', 'StudentController@storeSubmitAssignment' )->name( 'student-submitAssignment' );
		Route::get( '{id}/submit-quiz', 'StudentController@submitQuiz' )->name( 'student-submitQuiz' );
		#Edit Assignment Submissions
		Route::get( '{courseid}/edit-assignment/{assignmentid}', 'StudentController@editAssignmentSubmission' )->name( 'student-editAssignmentSubmission' );
		Route::post( '{courseid}/edit-assignment/{assignmentid}', 'StudentController@storeEditSubmissionAssignment' )->name( 'student-editAssignmentSubmission' );
		#Download Notices
		route::get( '{courseid}/download-notice/{noticeid}', 'StudentController@downloadNotice' )->name( 'downloadNotice' );
		#Download Lecture Notes
		route::get( '{courseid}/download-lecture-note/{lectureNoteid}', 'StudentController@downloadLectureNote' )->name( 'downloadLectureNote' );
		#Download Assignment
		route::get( '{courseid}/download-assignment/{assignmentid}', 'StudentController@downloadAssignment' )->name( 'downloadAssignment' );
		#Download Submission
		route::get( '{courseid}/submission/{submissionid}', 'StudentController@downloadSubmission' )->name( 'downloadSubmission' );
		#Submission , submissions
		Route::get( '{courseid}/submit-task/{submissionid}', 'StudentController@getSubmissions' )->name( 'student-submit-submissions' );
		Route::post( '{courseid}/submit-task/{submissionid}', 'StudentController@postSubmissions' )->name( 'student-submit-submissions' );
		#edit Task Submission
		Route::post( '{courseid}/edit-task/{submissionid}', 'StudentController@editTaskSubmissions' )->name( 'edit-student-task' );
		#Forum
		Route::get( '{id}/forum', 'StudentController@viewForum' )->name( 'student-forum' );
		Route::post( '{id}/forum', 'StudentController@askQuestionAnswer' )->name( 'student-forumQuestion' );
		#Quiz view
		route::get( 'quiz/{id}', 'StudentController@showQuizz' )->name( 'Quiz-Student' );
		route::post( 'quiz/submit-quiz/{questionArray}', 'StudentController@showThisQuiz' )->name( 'student-submit-Quiz' );

	} );
	#Student Attendance Excuses
	Route::get( 'attendance-excuses', 'StudentController@studentAttendaceExcuses' )->name( 'student-attendace-excuses' );
	#Student Medicals
	Route::get( 'exam-medical/', 'StudentController@studentExamMedicals' )->name( 'student-exam-medicals' );
	#Pass values to generate PDF
	Route::post( 'store-medical', 'StudentController@storeMedicalPDF' )->name( 'submit-medical' );
	Route::get( 'store-medical/generate-medical/{id}', 'StudentController@generateMedicalPDF' )->name( 'generate-medical' );
	#course actions
	Route::get( 'course-action', 'StudentController@courseAction' )->name( 'student-course-action' );
	#Enroll
	Route::get( 'enroll-course/{id}', 'StudentController@enrollCourse' )->name( 'student-enroll-course' );
	#UnEnroll
	Route::get( 'unenroll-course', 'StudentController@unEnrollCourse' )->name( 'student-unenroll-course' );

} );


/**Email Controller */
Route::get( '/student/email-user', 'EmailController@getEmail' )->name( 'email-user' );

/** Exam Controller  */
Route::prefix( '/exam' )->group( function () {
	Route::get( '/add-results', 'ExamController@getAddResults' )->name( 'add-results' );
	Route::post( '/add-results', 'ExamController@postAddResults' )->name( 'add-results' );
	Route::get( '/add-results-manually', 'ExamController@getAddResults' )->name( 'add-results-manually' );
	Route::post( '/add-results-manually', 'ExamController@postAddResults' )->name( 'add-results-manually' );
	Route::get( '/add-results-using-csv', 'ExamController@getAddResultsUsingCSV' )->name( 'add-results-using-csv' );
	Route::post( '/add-results-using-csv', 'ExamController@postAddResultsUsingCSV' )->name( 'add-results-using-csv' );
	Route::get( '/add-results-to/{id}', 'ExamController@getAddResultsTo' )->name( 'add-results-to' );
	Route::post( '/add-results-to/{id}', 'ExamController@postAddResultsTo' )->name( 'add-results-to' );
	Route::get( '/check-results', 'ExamController@getCheckResults' )->name( 'check-results' );
	Route::get( '/get-results-by-index/{id}', 'ExamController@getResultsByIndex' )->name( 'get-results-by-index' );
	Route::post( '/get-results-by-index', 'ExamController@postResultsByIndex' )->name( 'post-results-by-index' );
	Route::get( '/get-results-by-course/{id}', 'ExamController@getResultsByCourse' )->name( 'get-results-by-course' );
	Route::post( '/get-results-by-course', 'ExamController@postResultsByCourse' )->name( 'post-results-by-course' );
} );

/** Quiz Controller */
Route::prefix( '/course/{id1}/quiz/{id2}/' )->group( function () {
	Route::get( 'add-question', 'QuizController@getAddQuestion' )->name( 'add-question' );
	Route::post( 'add-question', 'QuizController@postAddQuestion' )->name( 'add-question' );
	Route::post( 'submit-quiz', 'QuizController@submitQuiz' )->name( 'submit-quiz' );
	Route::get( 'view-quiz', 'QuizController@getQuiz' )->name( 'view-quiz' );
	Route::get( 'edit-question/{id3}', 'QuizController@getEditQuestion' )->name( 'edit-question' );
	Route::post( 'edit-question/{id3}', 'QuizController@postEditQuestion' )->name( 'edit-question' );
} );
