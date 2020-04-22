<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    public function root(Request $req)
    {
        if ($req->session()->has('type')) 
        {
            return redirect()->route('dashboard.index');
        }
        
        else
        {
            return redirect()->route('login.index');
        }
    }

    public function index()
    {
        return view('login');
    }

    public function login(Request $req)
    {
        if ($req->role == "teacher") 
        {
            $loginTeacher = DB::table('teacher') -> where('id', $req->id)
                                                 -> where('password', $req->password)
                                                 -> where('valid', 1)
                                                 -> first();
            
            if ($loginTeacher) 
            {
                $req-> session()->put('id', $req->id);
                $req-> session()->put('type', 'teacher');

                return redirect()->route('dashboard.index');
            }

            else
            {
                return redirect()->route('login.index');
            }
        }

        elseif ($req->role == "student") 
        {
            $loginStudent = DB::table('student') -> where('id', $req->id)
                                                 -> where('password', $req->password)
                                                 -> where('valid', 1)
                                                 -> first();

            if ($loginStudent) 
            {
                $req-> session()->put('id', $req->id);
                $req-> session()->put('type', 'student');

                return redirect()->route('dashboard.index');
            }

            else
            {
                return redirect()->route('login.index');
            }
        }

        elseif ($req->role == "admin") 
        {
            $loginAdmin = DB::table('admin') -> where('id', $req->id)
                                             -> where('password', $req->password)
                                             -> first();

            if ($loginAdmin) 
            {
                $req-> session()->put('id', $req->id);
                $req-> session()->put('type', 'admin');

                return redirect()->route('dashboard.index');
            }

            else
            {
                return redirect()->route('login.index');
            }
        }
    }

    public function logout(Request $req)
    {
        $req->session()->flush();
        return redirect('/login');
    }
}
