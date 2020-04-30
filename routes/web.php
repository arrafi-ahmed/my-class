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

Route::get('/', 	      'LoginController@root')->name('login.root');
Route::get('/login', 	  'LoginController@index')->name('login.index');
Route::post('/login', 	  'LoginController@login');
Route::get('/logout', 	  'LoginController@logout')->name('logout.index');

Route::get('/register',   'RegisterController@index')->name('register.index');
Route::post('/registerT', 'RegisterController@createTeacher');
Route::post('/registerS', 'RegisterController@createStudent');

Route::get('/contact', 	   	  'ContactController@index')->name('contact.index');
Route::get('/contact/{id}',   'ContactController@content')->name('contact.content');
Route::post('/contact/{id}',  'ContactController@send');

Route::middleware([checkSession::class])->group(function(){		//Middleware Group

Route::get('/dashboard',  'DashboardController@index')->name('dashboard.index');

Route::get('/approve/teacher',    'ApproveController@teacherIndex')->name('approveTeacher.index')->middleware('roles:admin');
Route::post('/approve/teacher',   'ApproveController@teacherApprove')							 ->middleware('roles:admin');

Route::get('/approve/student',    'ApproveController@studentIndex')->name('approveStudent.index')->middleware('roles:admin');
Route::post('/approve/student',   'ApproveController@studentApprove')							 ->middleware('roles:admin');

Route::get('/profile/edit',		  'ProfileController@edit')->name('profile.edit')		->middleware('roles:teacher,student');
Route::post('/profile/edit',      'ProfileController@update')							->middleware('roles:teacher,student');
Route::post('/search',			  'ProfileController@search')->name('profile.search')	->middleware('roles:teacher,admin');
Route::get('/profile/{id}',		  'ProfileController@view')->name('profile.view')		->middleware('roles:teacher,student');

Route::get('/courses', 	  	   	   'CourseListController@index')->name('courseList.index');
Route::get('/courses/{id}/open',   'CourseListController@open')->name('courseList.open')		->middleware('roles:admin');
Route::get('/courses/{id}/close',  'CourseListController@close')->name('courseList.close')		->middleware('roles:admin');
Route::get('/courses/{id}/delete', 'CourseListController@delete')->name('courseList.delete')	->middleware('roles:admin');

Route::get('/courses/create',	  'CourseListController@createGet')->name('createCourse.index')	->middleware('roles:teacher,admin');
Route::post('/courses/create',	  'CourseListController@createPost')							->middleware('roles:teacher,admin');

Route::get('/course/{id}/edit',   'CourseListController@editGet')->name('editCourse.index')	->middleware('roles:admin');
Route::post('/course/{id}/edit',  'CourseListController@editPost')							->middleware('roles:admin');

Route::get('/course/{id}',        'CourseDashboardController@index')->name('courseDashboard.index');

Route::get('/course/{id}#tab1',   'CourseDashboardController@index')->name('courseDashboard1.index');
Route::post('/course/{id}/note',  'CourseDashboardController@createNote')->name('courseDashboard.createNote')		->middleware('roles:teacher,admin');
Route::get('/course/{name}/note', 'CourseDashboardController@downloadNote')->name('courseDashboard.downloadNote');

Route::get('/course/{id}#tab2',    'CourseDashboardController@index')->name('courseDashboard2.index');
Route::post('/course/{id}/notice', 'CourseDashboardController@createNotice')->name('courseDashboard.createNotice')	->middleware('roles:teacher,admin');

Route::get('/course/{id}#tab3',    'CourseDashboardController@index')->name('courseDashboard3.index');
Route::post('/course/{id}/result', 'CourseDashboardController@saveResult')->name('courseDashboard.saveResult')		->middleware('roles:teacher,admin');

Route::get('/payment/modify',  'PaymentController@modify')->name('payment.modify')	->middleware('roles:admin');
Route::post('/payment/modify', 'PaymentController@modify')							->middleware('roles:admin');

Route::get('/payment/{id?}',   'PaymentController@enroll')->name('payment.enroll')	->middleware('roles:student');
Route::post('/payment/{id?}',  'PaymentController@create')							->middleware('roles:student');

Route::get('/salary',  	   	  'SalaryController@index')->name('salary.index')	->middleware('roles:admin');
Route::post('/salary',     	  'SalaryController@modify')->name('salary.modify')	->middleware('roles:admin');

Route::get('/report/popular-courses',  'ReportController@courses')->name('report.courses')->middleware('roles:admin');

Route::get('/report/student-history',  'ReportController@historyGet')->name('report.historyGet');
Route::post('/report/student-history', 'ReportController@historyPost');

Route::get('/report/good-grades',  	  'ReportController@gradesGet')->name('report.gradesGet')	->middleware('roles:teacher,admin');
Route::post('/report/good-grades', 	  'ReportController@gradesPost')							->middleware('roles:teacher,admin');
});