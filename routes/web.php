<?php

use Illuminate\Support\Facades\Route;

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

Route::get ('/register',  		 'RegisterController@index')->name('register.index');
Route::post('/registerTeacher',  'RegisterController@createTeacher');
Route::post('/registerStudent',  'RegisterController@createStudent');

Route::get ('/login', 			 'LoginController@index')->name('login.index');
Route::get ('/logout', 			 'LogoutController@index')->name('logout.index');
Route::post('/loginTeacher', 	 'LoginController@loginTeacher');
Route::post('/loginStudent', 	 'LoginController@loginStudent');
Route::post('/loginAdmin', 		 'LoginController@loginAdmin');

Route::get('/teacher-dashboard', 'TeacherDashboardController@index')->name('teacherDashboard.index');
Route::get('/student-dashboard', 'StudentDashboardController@index')->name('studentDashboard.index');
Route::get('/admin-dashboard', 	 'AdminDashboardController@index')->name('adminDashboard.index');

Route::get ('/teacher', function () {
    return view('teacher');
});
Route::get('/student', function () {
    return view('student');
});
Route::get('/delete', function () {
    return view('delete');
});
Route::get('/course-list', function () {
    return view('course-list');
});
Route::get('/create-course', function () {
    return view('create-course');
});
Route::get('/update-course', function () {
    return view('update-course');
});
Route::get('/course-dashboard', function () {
    return view('course-dashboard');
});
Route::get('/make-payment', function () {
    return view('make-payment');
});
Route::get('/modify-payment', function () {
    return view('modify-payment');
});
Route::get('/salary', function () {
    return view('salary');
});
