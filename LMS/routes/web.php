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
Route::get('/', 'HomeController@home')->name('home');
Route::get('/dashboard', 'HomeController@index')->name('dashboard');

/** Admin Controller */
Route::post('/admin/register-user', 'AdminController@registerUser')->name('register-user');

Route::get('/admin/announcements', 'AdminController@announcements')->name('announcements');
Route::get('/admin/create-announcement', 'AdminController@getAnnounce')->name('create-announcement');
Route::post('/admin/create-announcement', 'AdminController@postAnnounce')->name('create-announcement');
Route::get('/admin/lectures', 'AdminController@lecturersList')->name('admin-lectures');
Route::get('/admin/lecture/{id}', 'AdminController@lecturer')->name('admin-lecturer');
Route::get('/admin/students', 'AdminController@studentsList')->name('admin-students');
Route::get('/admin/student/{id}', 'AdminController@student')->name('admin-student');
Route::get('/admin/add-course', 'AdminController@getAddCourse')->name('add-course');
Route::post('/admin/add-course', 'AdminController@postAddCourse')->name('add-course');
Route::get('/admin/courses', 'AdminController@coursesList')->name('admin-courses');
Route::get('/admin/course/{id}', 'AdminController@course')->name('admin-course');
Route::get('/admin/course/forum/{id}', 'AdminController@forum')->name('admin-forum');
Route::get('/admin/enroll-courses', 'AdminController@getEnrollCourse')->name('enroll-course');
Route::post('/admin/enroll-courses', 'AdminController@postEnrollCourse')->name('enroll-course');

/** Lecturer Controller */
Route::get('/lecturer/courses', 'LecturerController@courses')->name('lecturer-courses');
Route::get('/lecturer/courses/unenroll-course', 'LecturerController@unenrollCourse')->name('lecturer-unenroll-courses');
Route::get('/lecturer/course/{id}', 'LecturerController@getCourse')->name('lecturer-course');
Route::get('/lecturer/course/{id}/add-assignment', 'LecturerController@addAssignment')->name('lecturer-addAssignment');
Route::post('/lecturer/course/{id}/add-assignment', 'LecturerController@storeAssignment')->name('lecturer-addAssignment');
Route::get('/lecturer/course/{id}/add-lecture-notes', 'LecturerController@addLectureNotes')->name('lecturer-addLectureNotes');
Route::post('/lecturer/course/{id}/add-lecture-notes', 'LecturerController@storeLectureNotes')->name('lecturer-addLectureNotes');
Route::get('/lecturer/course/{id}/add-notice', 'LecturerController@addNotice')->name('lecturer-addNotice');
Route::post('/lecturer/course/{id}/add-notice', 'LecturerController@storeNotice')->name('lecturer-addNotice');
Route::get('/lecturer/course/{id}/add-quiz', 'LecturerController@addQuiz')->name('lecturer-addQuiz');
Route::get('/lecturer/course/{id}/add-submission', 'LecturerController@addSubmission')->name('lecturer-addSubmission');
Route::post('/lecturer/course/{id}/add-submission', 'LecturerController@storeSubmission')->name('lecturer-addSubmission');
Route::get('/lecturer/course/{id}/edit-assignment/{id1}', 'LecturerController@editAssignment')->name('lecturer-editAssignment');
Route::post('/lecturer/course/{id}/edit-assignment/{id1}', 'LecturerController@changeAssignment')->name('lecturer-editAssignment');
Route::get('/lecturer/course/{id}/get-assignment-file/{id1}', 'LecturerController@getFileAssignment')->name('lecturer-getFileAssignment');
Route::get('/lecturer/course/{id}/delete-assignment-file/{id1}', 'LecturerController@deleteFileAssignment')->name('lecturer-deleteFileAssignment');
Route::get('/lecturer/course/{id}/edit-lecturenote/{id1}', 'LecturerController@editLectureNotes')->name('lecturer-editLectureNotes');
Route::post('/lecturer/course/{id}/edit-lecturenote/{id1}', 'LecturerController@changeLectureNotes')->name('lecturer-editLectureNotes');
Route::get('/lecturer/course/{id}/get-lecturenote-file/{id1}', 'LecturerController@getFileLectureNote')->name('lecturer-getFileLectureNote');
Route::get('/lecturer/course/{id}/delete-lecturenote-file/{id1}', 'LecturerController@deleteFileLectureNote')->name('lecturer-deleteFileLectureNote');
Route::get('/lecturer/course/{id}/edit-notice/{id1}', 'LecturerController@editNotice')->name('lecturer-editNotice');
Route::post('/lecturer/course/{id}/edit-notice/{id1}', 'LecturerController@changeNotice')->name('lecturer-editNotice');
Route::get('/lecturer/course/{id}/get-notice-file/{id1}', 'LecturerController@getFileNotice')->name('lecturer-getFileNotice');
Route::get('/lecturer/course/{id}/delete-notice-file/{id1}', 'LecturerController@deleteFileNotice')->name('lecturer-deleteFileNotice');
Route::get('/lecturer/course/{id}/edit-Submission/{id1}', 'LecturerController@editSubmission')->name('lecturer-editSubmission');
Route::post('/lecturer/course/{id}/edit-Submission/{id1}', 'LecturerController@changeSubmission')->name('lecturer-editSubmission');
Route::get('/lecturer/course/{id}/get-Submission-file/{id1}', 'LecturerController@getFileSubmission')->name('lecturer-getFileSubmission');
Route::get('/lecturer/course/{id}/delete-Submission-file/{id1}', 'LecturerController@deleteFileSubmission')->name('lecturer-deleteFileSubmission');

/** Student Controller  */
Route::get('/student/courses', 'StudentController@courses')->name('student-courses');
Route::get('/student/course/{id}', 'StudentController@getCourse')->name('student-course');
Route::get('/student/course/{id}/submit-assignment', 'StudentController@getSubmitAssignment')->name('student-submitAssignment');
Route::post('/student/course/{id}/submit-assignment', 'StudentController@postSubmitAssignment')->name('student-submitAssignment');
Route::get('/student/course/{id}/submit-quiz', 'StudentController@submitQuiz')->name('student-submitQuiz');
Route::get('/student/enroll-courses', 'StudentController@getEnrollCourse')->name('student-enroll-course');
Route::post('/student/enroll-courses', 'StudentController@postEnrollCourse')->name('student-enroll-course');

/** Exam Controller  */
Route::get('/add-results', 'ExamController@getAddResults')->name('add-results');
Route::post('/add-results', 'ExamController@postAddResults')->name('add-results');
Route::get('/add-results-to/{id}', 'ExamController@addResultsTo')->name('add-results-to');
