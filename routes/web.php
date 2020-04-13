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

Route::get ('/register',  		  'RegisterController@index')->name('register.index');
Route::post('/registerTeacher',   'RegisterController@createTeacher');
Route::post('/registerStudent',   'RegisterController@createStudent');

Route::get ('/login', 			  'LoginController@index')->name('login.index');
Route::get ('/logout', 			  'LogoutController@index')->name('logout.index');
Route::post('/loginTeacher', 	  'LoginController@loginTeacher');
Route::post('/loginStudent', 	  'LoginController@loginStudent');
Route::post('/loginAdmin', 		  'LoginController@loginAdmin');

Route::get ('/teacher-dashboard', 'TeacherDashboardController@index')->name('teacherDashboard.index');
Route::get ('/student-dashboard', 'StudentDashboardController@index')->name('studentDashboard.index');
Route::get ('/admin-dashboard',   'AdminDashboardController@index')->name('adminDashboard.index');

Route::get ('/approve-teacher',   'ApproveTeacherController@index')->name('approveTeacher.index');
Route::post('/approve-teacher',   'ApproveTeacherController@approve');

Route::get ('/approve-student',   'ApproveStudentController@index')->name('approveStudent.index');
Route::post('/approve-student',   'ApproveStudentController@approve');

Route::get ('/teacher',           'TeacherController@index')->name('teacher.index');
Route::post('/teacher',           'TeacherController@update');

Route::get ('/student',           'StudentController@index')->name('student.index');
Route::post('/student',           'StudentController@update');
 
Route::get ('/create-course', 	  'CreateCourseController@index')->name('createCourse.index');
Route::post('/create-course', 	  'CreateCourseController@create');

Route::get ('/course-list', 	  		  'CourseListController@index')->name('courseList.index');
Route::get ('/course-list/open/{id}', 	  'CourseListController@open')->name('courseList.open');
Route::get ('/course-list/close/{id}', 	  'CourseListController@close')->name('courseList.close');
Route::get ('/course-list/delete/{id}',   'CourseListController@delete')->name('courseList.delete');
Route::get ('/course-list/enroll/{id}',   'CourseListController@enroll')->name('courseList.enroll');

Route::get ('/edit-course/{id}',  'EditCourseController@index')->name('editCourse.index');
Route::post('/edit-course/{id}',  'EditCourseController@update');

Route::get ('/course-dashboard/{id}',  'CourseDashboardController@index')->name('courseDashboard.index');

Route::get('/make-payment', function () {
    return view('make-payment');
});
Route::get('/modify-payment', function () {
    return view('modify-payment');
});
Route::get('/salary', function () {
    return view('salary');
});
