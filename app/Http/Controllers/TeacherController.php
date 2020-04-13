<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TeacherController extends Controller
{
    public function index(Request $req)
    {
    	$teacher = DB::table('teacher')->find($req->session()->get('id'));
    	return view('teacher', ['teacher' => $teacher]);
    }

    public function update(Request $req)
    {
    	$teacher = DB::table('teacher')	->find($req->session()->get('id'));

    	$update = DB::table('teacher')	->where('id', $teacher->id)
    									->update(['password' => $req->password,
    											'name' => $req->name,
    											'dept' => $req->dept,
    											'qualification' => $req->qualification,
    											'email' => $req->email]);
    											//'profilePhoto' => $req->profilePhoto
    	
    	return redirect()->route('teacher.index');
    }
}
