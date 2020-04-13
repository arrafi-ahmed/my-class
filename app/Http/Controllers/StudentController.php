<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    public function index(Request $req)
    {
    	$student = DB::table('student')->find($req->session()->get('id'));
    	return view('student', ['student' => $student]);
    }

    public function update(Request $req)
    {
    	$student = DB::table('student')	->find($req->session()->get('id'));

    	$update = DB::table('student')	->where('id', $student->id)
    									->update(['password' => $req->password,
    											'name' => $req->name,
    											'dept' => $req->dept,
    											'parentContact' => $req->parentContact,
    											'email' => $req->email]);
    											//'profilePhoto' => $req->profilePhoto
    	
    	return redirect()->route('student.index');
    }
}
