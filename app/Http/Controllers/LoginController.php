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
    	$loginTeacher = DB::table('teacher') -> where('id', $req->id)
    										 ->	where('password', $req->password)
                                             -> where('valid', 1)
                                             -> first();
        
        if ($loginTeacher) 
        {
        	$req-> session()->put('id', $req->id);
        	$req-> session()->put('type', 'teacher');

        	return redirect()->route('teacherDashboard.index');
        }
        else
        {
        return redirect()->route('login.index');
        }
    }

    public function loginStudent(Request $req)
    {
    	$loginStudent = DB::table('student') -> where('id', $req->id)
    										 ->	where('password', $req->password)
                                             -> where('valid', 1)
                                             -> first();

        if ($loginStudent) 
        {
        	$req-> session()->put('id', $req->id);
        	$req-> session()->put('type', 'student');

        	return redirect()->route('studentDashboard.index');
        }
        else
        {
        return redirect()->route('login.index');
        }
    }

    public function loginAdmin(Request $req)
    {
    	$loginAdmin = DB::table('admin') -> where('id', $req->id)
										 ->	where('password', $req->password)
                                         -> first();

        if ($loginAdmin) {
        	$req-> session()->put('id', $req->adminId);
        	$req-> session()->put('type', 'admin');

        	return redirect()->route('adminDashboard.index');
        }
        else
        {
        return redirect()->route('login.index');
        }
    }
}
