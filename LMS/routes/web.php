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

Auth::routes();


/** Home Controller */
Route::get('/dashboard', 'HomeController@index')->name('dashboard');

/** Admin Controller */
Route::get('/announcements', 'AdminController@announcements')->name('announcements');
Route::get('/create-announcement', 'AdminController@getAnnounce')->name('create-announcement');
Route::post('/create-announcement', 'AdminController@postAnnounce')->name('create-announcement');
