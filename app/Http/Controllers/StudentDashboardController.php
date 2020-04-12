<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentDashboardController extends Controller
{
    public function index(Request $req)
    {
    	return view('student-dashboard', ['sessionId'=>$req->session()->get('id')]);
    }
}
