<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    public function index()
    {
    	return view('login');
    }

    public function loginTeacher(Request $req)
    {
    	$loginTeacher = DB::table('teacher') -> where('teacherId', $req->teacherId)
    										 ->	where('password', $req->password);

		 if ($loginTeacher) {
		 	$req-> session()->put('id', $req->teacherId);
		 	$req-> session()->put('type', 'teacher');

		 	return redirect()->route('teacherDashboard.index');
		 }
    }

    public function loginStudent(Request $req)
    {
    	$loginStudent = DB::table('student') -> where('studentId', $req->studentId)
    										 ->	where('password', $req->password);

		 if ($loginStudent) {
		 	$req-> session()->put('id', $req->studentId);
		 	$req-> session()->put('type', 'student');

		 	return redirect()->route('studentDashboard.index');
		 }
    }

    public function loginAdmin(Request $req)
    {
    	$loginAdmin = DB::table('admin') -> where('adminId', $req->adminId)
										 ->	where('password', $req->password);

		if ($loginAdmin) {
		 	$req-> session()->put('id', $req->adminId);
		 	$req-> session()->put('type', 'admin');

		 	return redirect()->route('adminDashboard.index');
		}
    }
}
