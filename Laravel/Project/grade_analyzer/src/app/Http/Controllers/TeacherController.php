<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Teacher;

class TeacherController extends Controller
{
    function login(Request $request)
    {
        if ($request->role === 'Student') {
            return app(StudentController::class)->login($request);
        }

        $result = Teacher::select()
            ->where('email', $request->username)
            ->where('password', $request->password)
            ->where('role', $request->role)
            ->get();

        if ($result) {
            return view(($request->role) . '.home');
        }
    }

}
