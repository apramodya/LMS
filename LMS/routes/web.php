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
Route::get('/admin/announcements', 'AdminController@announcements')->name('announcements');
Route::get('/admin/create-announcement', 'AdminController@getAnnounce')->name('create-announcement');
Route::post('/admin/create-announcement', 'AdminController@postAnnounce')->name('create-announcement');
Route::get('/admin/lectures', 'AdminController@lecturersList')->name('admin-lectures');
Route::get('/admin/students', 'AdminController@studentsList')->name('admin-students');
Route::get('/admin/add-course', 'AdminController@getAddCourse')->name('add-course');
Route::post('/admin/add-course', 'AdminController@postAddCourse')->name('add-course');
Route::get('/admin/courses', 'AdminController@coursesList')->name('admin-courses');

/** Lecturer Controller */
Route::get('/lecturer/courses', 'LecturerController@courses')->name('lecturer-courses');
Route::get('/lecturer/course/{id}', 'LecturerController@getCourse')->name('lecturer-course');