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

Route::get('/', function () {
    return view('welcome');
});

/** Auth routes */
Auth::routes();

/** Home Controller */
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
Route::get('/admin/enroll-courses', 'AdminController@getEnrollCourse')->name('enroll-course');
Route::post('/admin/enroll-courses', 'AdminController@postEnrollCourse')->name('enroll-course');

/** Lecturer Controller */
Route::get('/lecturer/courses', 'LecturerController@courses')->name('lecturer-courses');
Route::get('/lecturer/course/{id}', 'LecturerController@getCourse')->name('lecturer-course');
Route::get('/lecturer/course/{id}/add-assignment', 'LecturerController@addAssignment')->name('lecturer-addAssignment');
Route::post('/lecturer/course/{id}/add-assignment', 'LecturerController@storeAssignment')->name('lecturer-addAssignment');
Route::get('/lecturer/course/{id}/add-lecture-notes', 'LecturerController@addLectureNotes')->name('lecturer-addLectureNotes');
Route::get('/lecturer/course/{id}/add-notice', 'LecturerController@addNotice')->name('lecturer-addNotice');
Route::get('/lecturer/course/{id}/add-quiz', 'LecturerController@addQuiz')->name('lecturer-addQuiz');
Route::get('/lecturer/course/{id}/add-submission', 'LecturerController@addSubmission')->name('lecturer-addSubmission');

/** Student Controller  */
Route::get('/student/courses', 'StudentController@courses')->name('student-courses');
Route::get('/student/course/{id}', 'StudentController@getCourse')->name('student-course');
Route::get('/student/course/{id}/submit-assignment', 'StudentController@getSubmitAssignment')->name('student-submitAssignment');
Route::post('/student/course/{id}/submit-assignment', 'StudentController@postSubmitAssignment')->name('student-submitAssignment');
Route::get('/student/course/{id}/submit-quiz', 'StudentController@submitQuiz')->name('student-submitQuiz');
