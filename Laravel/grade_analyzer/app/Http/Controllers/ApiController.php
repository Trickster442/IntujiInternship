<?php

namespace App\Http\Controllers;
use App\Models\Teacher;

use Illuminate\Http\Request;

class ApiController extends Controller
{
    function list()
    {
        return Teacher::all();
    }


    function add(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:teachers,email',
            'batch' => 'required|string|max:100',
        ]);

        // return $request->input('name');
        $teacher = new Teacher();
        $teacher->name = $request->input('name');
        $teacher->email = $request->input('email');
        $teacher->batch = $request->input('batch');
        if ($teacher->save()) {
            return 'New teacher added successfully';
        } else {
            return 'Error adding teacher';
        }
    }
}
