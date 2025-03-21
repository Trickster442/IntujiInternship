<?php

namespace App\Http\Controllers;

use GuzzleHttp\Psr7\FnStream;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\FuncCall;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    public function getStudents()
    {
        $students = \App\Models\Student::all();
        return view('get-student', ['data' => $students]);
    }

    public function queries()
    {
        // $result = DB::table('students')->get();

        $result = DB::table('students')->where('name', 'sandip')->get();
        return $result;
    }
}
