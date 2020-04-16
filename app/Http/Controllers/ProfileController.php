<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    public function search(Request $req)
    {
        $session = $req->session()->all();
        if ($req->type == 'teacher') 
        {
            $teacher = DB::table('teacher')->find($req->searchId);
            if ($teacher) 
            {
                return view('profile-view', ['teacher' => $teacher, 'session' => $session]);
            }
            else
            {
                echo "Not found";
            }
            
        }
        elseif ($req->type == 'student')
        {
            $student = DB::table('student')->find($req->searchId);
            if ($student) 
            {
                return view('profile-view', ['student' => $student, 'session' => $session]);
            }
            else
            {
                echo "Not found";
            }
            
        }
        else{
            echo "Access Denied";
        }
    }

    public function view($id, Request $req)
    {
        $session = $req->session()->all();
        if ($session['type'] == 'teacher' && $session['id'] == $id) 
        {
            $teacher = DB::table('teacher')->find($id);
            return view('profile-view', ['teacher' => $teacher, 'session' => $session]);
        }
        elseif ($session['type'] == 'student' && $session['id'] == $id)
        {
            $student = DB::table('student')->find($id);
            return view('profile-view', ['student' => $student, 'session' => $session]);
        }
        else{
            echo "Access Denied";
        }
    }

    public function edit(Request $req)
    {
        $session = $req->session()->all();
        if ($session['type'] == 'teacher') 
        {
            $teacher = DB::table('teacher')->find($session['id']);
            return view('profile-edit', ['teacher' => $teacher, 'session' => $session]);
        }
        elseif ($session['type'] == 'student')
        {
            $student = DB::table('student')->find($session['id']);
            return view('profile-edit', ['student' => $student, 'session' => $session]);
        }
    }

    public function update(Request $req)
    {
        $session = $req->session()->all();
        if ($session['type'] == 'teacher') 
        {
            $teacher = DB::table('teacher') ->find($session['id']);
            $update  = DB::table('teacher')  ->where('id', $teacher->id)
                                            ->update(['password' => $req->password,
                                                    'name' => $req->name,
                                                    'dept' => $req->dept,
                                                    'qualification' => $req->qualification,
                                                    'email' => $req->email]);
                                                    //'profilePhoto' => $req->profilePhoto
            
            return redirect()->route('profile.edit');
        }
        
        elseif ($session['type'] == 'student')
        {
            $student = DB::table('student') ->find($session['id']);
            $update = DB::table('student')  ->where('id', $student->id)
                                            ->update(['password' => $req->password,
                                                    'name' => $req->name,
                                                    'dept' => $req->dept,
                                                    'parentContact' => $req->parentContact,
                                                    'email' => $req->email]);
                                                    //'profilePhoto' => $req->profilePhoto
            
            return redirect()->route('profile.edit');
        }
    	
    }
}
