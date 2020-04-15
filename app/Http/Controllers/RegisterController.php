<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('register');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createTeacher(Request $req)
    {
        $profilePhoto = "default.jpg";

        if ($req->hasFile('profilePhoto')) {
            $file = $req->file('profilePhoto');

            if ($file->move('upload/teacherPhoto/', $req->id .'.'. $file->getClientOriginalExtension())) {
                $profilePhoto = $req->id .'.'. $file->getClientOriginalExtension();
            }
        }

        $createTeacher = DB::table('teacher')->insert(
            ['id'            => $req->id, 
            'password'       => $req->password,
            'name'           => $req->name,
            'dept'           => $req->dept,
            'qualification'  => $req->qualification,
            'email'          => $req->email,
            'profilePhoto'   => $profilePhoto,
            'valid'          => 0]
        );

        if ($createTeacher) {
            return redirect()->route('login.index');
        }else{
            return redirect()->route('register.index');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createStudent(Request $req)
    {
        
        $profilePhoto = "default.jpg";

        if ($req->hasFile('profilePhoto')) {
            $file = $req->file('profilePhoto');

            if ($file->move('upload/studentPhoto/', $req->id .'.'. $file->getClientOriginalExtension())) {
                $profilePhoto = $req->id .'.'. $file->getClientOriginalExtension();
            }
        }

        $createStudent = DB::table('student')->insert(
            ['id'           => $req->id,
            'password'      => $req->password,
            'name'          => $req->name,
            'dept'          => $req->dept,
            'parentContact' => $req->parentContact,
            'email'         => $req->email,
            'profilePhoto'  => $profilePhoto,
            'valid'         => 0]
        );

        if ($createStudent) {
            return redirect()->route('login.index');
        }else{
            return redirect()->route('register.index');
        }
    }
}