<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    function login($request)
    {
        return view('Student.home');
    }
}
