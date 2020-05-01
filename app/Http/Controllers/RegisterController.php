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
        if (session()->has('type')) 
        {
            return redirect()->route('dashboard.index');
        }
        
        return view('register');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createTeacher(Request $req)
    {
        $this->validate($req, [
            'id'            => 'required|unique:teacher|max:20',
            'password'      => 'required|min:5|max:50|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).+$/',
            'name'          => 'required',
            'dept'          => 'required',
            'qualification' => 'required',
            'email'         => 'required|email',
            'salary'        => 'required|numeric',
            'profilePhoto'  => 'file|image'
        ],[
            'password.regex' => 'Password must contain at least one uppercase letter, one lowercase letter, one numerical digit & one special character.'
        ]);

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
            'salary'         => $req->salary,
            'profile_photo'  => $profilePhoto,
            'valid'          => 0]
        );

        if ($createTeacher) 
        {
            return redirect()->route('login.index')->with('success', 'Registered successfully!');
        }

        else
        {
            return back()->with('error', 'Error registering the account!');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createStudent(Request $req)
    {
        $this->validate($req, [
            'id'            => 'required|unique:student|max:20',
            'password'      => 'required|min:5|max:50|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).+$/',
            'name'          => 'required',
            'dept'          => 'required',
            'parentContact' => 'required',
            'email'         => 'required|email',
            'profilePhoto'  => 'file|image'
        ],[
            'password.regex' => 'Password must contain at least one uppercase letter, one lowercase letter, one numerical digit & one special character.'
        ]);
        
        $profilePhoto = "default.jpg";

        if ($req->hasFile('profilePhoto')) 
        {
            $file = $req->file('profilePhoto');

            if ($file->move('upload/studentPhoto/', $req->id .'.'. $file->getClientOriginalExtension())) 
            {
                $profilePhoto = $req->id .'.'. $file->getClientOriginalExtension();
            }
        }

        $createStudent = DB::table('student')->insert(
            ['id'           => $req->id,
            'password'      => $req->password,
            'name'          => $req->name,
            'dept'          => $req->dept,
            'parent_contact'=> $req->parentContact,
            'email'         => $req->email,
            'profile_photo' => $profilePhoto,
            'valid'         => 0]
        );

        if ($createStudent) 
        {
            return redirect()->route('login.index')->with('success', 'Registered successfully!');
        }
        
        else
        {
            return back()->with('error', 'Error registering the account!');
        }
    }
}