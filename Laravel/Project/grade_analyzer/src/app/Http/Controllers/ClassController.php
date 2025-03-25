<?php

namespace App\Http\Controllers;

use App\Models\ClassModel;
use Illuminate\Http\Request;

class ClassController extends Controller
{
    function add(Request $request)
    {
        $request->validate([
            'className' => 'required | unique:classes'
        ]);

        $class = ClassModel::create([
            'class_name' => $request->input('className')
        ]);

        if ($class) {
            return response()->json([
                "status" => true,
                "message" => "Successfully added"
            ]);
        }

        return response()->json([
            "status" => false,
            "message" => "Error adding new class"
        ]);

        //return "Add function called";
    }
}
