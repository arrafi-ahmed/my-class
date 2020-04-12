<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function index(Request $req)
    {
    	return view('admin-dashboard', ['sessionId'=>$req->session()->get('id')]);
    }
}
