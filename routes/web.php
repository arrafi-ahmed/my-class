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

Route::get('/register', function () {
    return view('register');
});
Route::get('/login', function () {
    return view('login');
});
Route::get('/teacher', function () {
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
Route::get('/student-dashboard', function () {
    return view('student-dashboard');
});
Route::get('/teacher-dashboard', function () {
    return view('teacher-dashboard');
});
Route::get('/admin-dashboard', function () {
    return view('admin-dashboard');
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
