<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TeacherDashboardController extends Controller
{
	public function index(Request $req)
    {
    	return view('teacher-dashboard', ['sessionId'=>$req->session()->get('id')]);
    }
}
