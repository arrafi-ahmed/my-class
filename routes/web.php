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

Route::get ('/', 			 	 'LoginController@root')->name('login.root');
Route::get ('/login', 			 'LoginController@index')->name('login.index');
Route::post('/login', 	 		 'LoginController@login');
Route::get ('/logout', 			 'LoginController@logout')->name('logout.index');

Route::get ('/register',  		 'RegisterController@index')->name('register.index');
Route::post('/registerTeacher',	 'RegisterController@createTeacher');
Route::post('/registerStudent',	 'RegisterController@createStudent');

Route::get ('/dashboard',		 'DashboardController@index')->name('dashboard.index');

Route::get ('/approve-teacher',  'ApproveTeacherController@index')->name('approveTeacher.index');
Route::post('/approve-teacher',  'ApproveTeacherController@approve');

Route::get ('/approve-student',  'ApproveStudentController@index')->name('approveStudent.index');
Route::post('/approve-student',  'ApproveStudentController@approve');

Route::get ('/profile/edit',	 'ProfileController@edit')->name('profile.edit');
Route::post('/profile/edit',     'ProfileController@update');
Route::get ('/profile/{id}',	 'ProfileController@view')->name('profile.view');
Route::post('/search',			 'ProfileController@search')->name('profile.search');

Route::get ('/create-course',	 'CreateCourseController@index')->name('createCourse.index');
Route::post('/create-course',	 'CreateCourseController@create');

Route::get ('/course-list', 	  		  'CourseListController@index')->name('courseList.index');
Route::get ('/course-list/open/{id}', 	  'CourseListController@open')->name('courseList.open');
Route::get ('/course-list/close/{id}', 	  'CourseListController@close')->name('courseList.close');
Route::get ('/course-list/delete/{id}',   'CourseListController@delete')->name('courseList.delete');

Route::get ('/edit-course/{id}',  		  'EditCourseController@index')->name('editCourse.index');
Route::post('/edit-course/{id}', 		  'EditCourseController@update');

Route::get ('/course-dashboard/{id}',	  'CourseDashboardController@index')->name('courseDashboard.index');

Route::get ('/course-dashboard/{id}#tab1',  			 'CourseDashboardController@index')->name('courseDashboard1.index');
Route::post('/course-dashboard/{id}/createNote',  	 	 'CourseDashboardController@createNote')->name('courseDashboard.createNote');
Route::get ('/course-dashboard/{filename}/downloadNote', 'CourseDashboardController@downloadNote')->name('courseDashboard.downloadNote');

Route::get ('/course-dashboard/{id}#tab2',  			 'CourseDashboardController@index')->name('courseDashboard2.index');
Route::post('/course-dashboard/{id}/createNotice',   	 'CourseDashboardController@createNotice')->name('courseDashboard.createNotice');

Route::get ('/course-dashboard/{id}#tab3',	 			 'CourseDashboardController@index')->name('courseDashboard3.index');
Route::post('/course-dashboard/{id}/saveResult',		 'CourseDashboardController@saveResult')->name('courseDashboard.saveResult');

Route::get ('/payment/{id}',	'PaymentController@enroll')->name('payment.enroll');
Route::post('/payment/{id}',   	'PaymentController@create')->name('payment.create');

Route::get ('/payment-modify', 	'PaymentController@modify')->name('payment.modify');
Route::post('/payment-modify', 	'PaymentController@modify');

Route::get ('/salary',  	  	'SalaryController@index')->name('salary.index');
Route::post('/salary',  	   	'SalaryController@modify')->name('salary.modify');

Route::get ('/contact', 	   	'ContactController@index')->name('contact.index');
Route::post('/contact', 	   	'ContactController@contact')->name('contact.contact');

Route::get ('/contact/{id}',   	'ContactController@content')->name('contact.content');
Route::post('/contact/{id}',   	'ContactController@content');
Route::post('/send',      	   	'ContactController@send')->name('contact.send');

Route::get ('/popular-courses',	'ReportController@courses')->name('report.courses');

Route::get ('/student-history',	'ReportController@historyGet')->name('report.historyGet');
Route::post('/student-history',	'ReportController@historyPost');

Route::get ('/good-grades',		'ReportController@gradesGet')->name('report.gradesGet');
Route::post('/good-grades',		'ReportController@gradesPost');