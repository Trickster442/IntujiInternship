<?php

namespace App\Http\Controllers;
use App\Models\Teacher;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
class ApiController extends Controller
{
    function list()
    {
        return Teacher::all();
    }


    public function add(Request $request)
    {
        // // Validation rules
        // $rules = [
        //     'name' => 'required|string|max:255',
        //     'email' => 'required|email|max:255',
        //     'batch' => 'required|string|max:100',
        // ];

        // // Validate request data, default to empty array if null
        // $validator = Validator::make($request->all() ?: [], $rules);

        // if ($validator->fails()) {
        //     return response()->json([
        //         'status' => 'error',
        //         'errors' => $validator->errors()
        //     ], 422);
        // }

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'batch' => 'required|string|max:100',
        ]);
        // try {
        // Create new teacher
        $teacher = new Teacher();
        $teacher->name = $request->input('name');
        $teacher->email = $request->input('email');
        $teacher->batch = $request->input('batch');

        if ($teacher->save()) {
            return response()->json([
                'status' => 'success',
                'message' => 'New teacher added successfully',
                'data' => $teacher
            ], 201);
        }

        return response()->json([
            'status' => 'error',
            'message' => 'Failed to save teacher'
        ], 500);
        // } catch (\Exception $e) {
        //     return response()->json([
        //         'status' => 'error',
        //         'message' => 'Server error: ' . $e->getMessage()
        //     ], 500);
        // }
    }

    function update(Request $request)
    {
        $teacher = Teacher::find($request->id);
        $teacher->name = $request->input('name');
        $teacher->email = $request->input('email');
        $teacher->batch = $request->input('batch');
        if ($teacher->save()) {
            return 'Teacher updated successfully';
        } else {
            return 'Error updating teacher';
        }
    }

    function delete($id)
    {
        $teacher = Teacher::destroy($id);
        if ($teacher) {
            return "Deleted successfully";
        } else {
            return 'Error deleting';
        }
    }

    function login(Request $request)
    {
        $teacher = Teacher::where('email', $request->email)->first();
        if ($teacher->batch != $request->batch) {
            return "Not matched";
        }

        $success['token'] = $teacher->createToken('token')->plainTextToken;

        return response()->json([
            "success" => true,
            "result" => $success,
            "message" => 'User Login successfully'
        ], 201);
    }

    function signUp(Request $request)
    {
        $input = $request->all();
        $teacher = Teacher::create($input);
        $success['token'] = $teacher->createToken('teacher')->plainTextToken;

        return response()->json([
            "success" => true,
            "result" => $success,
            "message" => 'User registered successfully'
        ], 201);
    }
}
