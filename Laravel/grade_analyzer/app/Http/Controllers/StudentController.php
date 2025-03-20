<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
class StudentController extends Controller
{
    function queries()
    {
        $response = Student::get();
        //$response = Student::where('name', 'sandip')->get();

        // $response = Student::insert([
        //     'name' => 'kewal',
        //     'email' => 'kewal@gmail.com',
        //     'batch' => '2021'
        // ]);

        // if ($response) {
        //     return "Data inserted successfully";
        // } else {
        //     return "Error";
        // }

        return view('studentPage', ['data' => $response]);
    }

    function hello()
    {
        return "hello";
    }

    function world()
    {
        return "world";
    }

    function any()
    {
        return "This is any method";
    }

    function group1()
    {
        return "This is group 1 method";
    }

    function group2()
    {
        return "This is group 2 method";
    }
}
