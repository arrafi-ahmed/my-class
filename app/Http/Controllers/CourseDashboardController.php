<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CourseDashboardController extends Controller
{
    public function index($id, Request $req)
    {
    	$session = $req->session()->all();
    	$course = DB::table('courses')->find($id);
    	$teacher = DB::table('teacher')->find($course->teacherId);


    	return view('course-dashboard', ['course'=>$course, 'teacher'=>$teacher, 'session'=>$session]);
    }
}
