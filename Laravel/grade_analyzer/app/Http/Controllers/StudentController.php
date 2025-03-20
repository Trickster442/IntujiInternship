<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
class StudentController extends Controller
{
    function queries()
    {
        //$response = Student::get();
        $response = Student::where('name', 'sandip')->get();

        return view('studentPage', ['data' => $response]);
    }
}
