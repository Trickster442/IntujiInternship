<?php

namespace App\Http\Controllers;


use App\Models\Teacher;
use Illuminate\Http\Request;

class DatabaseController extends Controller
{
    //
    function addTeacher(Request $request)
    {
        $teacher = new Teacher();
        $teacher->name = $request->name;
        $teacher->email = $request->email;
        $teacher->batch = $request->batch;
        $teacher->save();

        if ($teacher) {
            echo "New teacher added successfully";
        } else {
            echo "Operation failed";
        }
    }

    function updateTeacher()
    {

    }
}
