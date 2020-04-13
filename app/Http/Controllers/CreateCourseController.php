<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CreateCourseController extends Controller
{
    public function index()
    {
    	return view('create-course');
    }

    public function create(Request $req)
    {
    	$createCourse = DB::table('courses')->insert(
            ['name'     => $req->name, 
            'section'   => $req->section,
            'time'      => $req->time,
            'roomNo'    => $req->roomNo,
            'capacity'  => $req->capacity,
            'teacherId'  => $req->teacherId,
            'status'    => 0]
        );

        if ($createCourse) {
            return redirect()->route('courseList.index');
        }else{
            return redirect()->route('createCourse.index');
        }
    }
}
