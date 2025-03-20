<?php

namespace App\Http\Controllers;

use GuzzleHttp\Psr7\FnStream;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\FuncCall;

class StudentController extends Controller
{
    public function getStudents()
    {
        $students = \App\Models\Student::all();
        return view('get-student', ['data' => $students]);
    }
}
