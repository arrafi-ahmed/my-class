<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SalaryController extends Controller
{
    public function index()
    {
    	return view('salary');
    }

    public function modify(Request $req)
    {
    	if (isset($req->find) || isset($req->pay) || isset($req->save)) 
    	{
            $teacher  = DB::table('teacher')->where('id', $req->teacherId)
                                            ->first();

            if (isset($req->pay) && isset($teacher))
            {
                // $amount = $teacher->salary;
                DB::table('salary')->insert(['amount'   =>$teacher->salary,
                                             'status'   =>1,
                                             'teacherId'=>$req->teacherId]);
            }

            elseif (isset($req->save))
            {
                DB::table('salary') ->where('id', $req->salaryId)
                                    ->update(['amount'  =>$req->amount,
                                              'status'   =>$req->status]);
            }

            $salaries = DB::table('salary')->where('teacherId', $req->teacherId)
                                           ->orderBy('id', 'desc')
                                           ->get();
            
            // print_r($req->salaryId, $req->status);
            return view('salary', ['teacher'=>$teacher, 'salaries'=>$salaries]); 
    	}
    }
}
