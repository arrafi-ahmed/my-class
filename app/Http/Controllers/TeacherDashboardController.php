<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TeacherDashboardController extends Controller
{
	public function index(Request $req)
    {
    	$teacherId = $req->session()->get('id');
    	$courses = DB::table('courses') -> where('teacherId', $teacherId)
								    	-> where('status', 1)
								    	-> get();

    	return view('teacher-dashboard', ['sessionId'=>$teacherId, 'courses'=>$courses]);
    }
}
