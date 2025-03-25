<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Teacher;
use Illuminate\Support\Facades\Hash;

class TeacherController extends Controller
{
    function login(Request $request)
    {
        if ($request->role === 'Student') {
            return app(StudentController::class)->login($request);
        }

        $teacher = Teacher::where('email', $request->username)
            ->where('role', $request->role)
            ->first();

        if ($teacher && Hash::check($request->password, $teacher->password)) {

            session(['user_id' => $teacher->id, 'role' => $teacher->role]);

            return redirect('/' . strtolower($teacher->role) . '/home');
        }

        return redirect()->back()->withErrors(['msg' => 'Credentials do not match']);
    }

    function logout()
    {
        session()->pull('user_id');
        session()->pull('role');
        return redirect('/');
    }

    function register(Request $request)
    {
        $request->validate([
            'fName' => 'required|string|min:3|max:10',
            'lName' => 'required|string|min:3|max:10',
            'phone' => 'required|min:8|max:20',
            'email' => 'required|email',
            'password' => [
                'required',
                'min:8',
                'regex:/[A-Z]/',
                'regex:/[0-9]/',
                'regex:/[!@#$%^&*(),.?":{}|<>]/'
            ],
            'cPassword' => 'required|same:password'
        ], [
            'fName.required' => 'First name is required.',
            'fName.string' => 'First name must be a valid string.',
            'fName.min' => 'First name must be at least 3 characters long.',
            'fName.max' => 'First name cannot be longer than 10 characters.',

            'lName.required' => 'Last name is required.',
            'lName.string' => 'Last name must be a valid string.',
            'lName.min' => 'Last name must be at least 3 characters long.',
            'lName.max' => 'Last name cannot be longer than 10 characters.',

            'phone.required' => 'Phone number is required.',
            'phone.min' => 'Phone number must be at least 8 digits long.',
            'phone.max' => 'Phone number cannot exceed 20 digits.',

            'email.required' => 'Email is required.',
            'email.email' => 'Enter a valid email address.',

            'password.required' => 'Password is required.',
            'password.min' => 'Password must be at least 8 characters long.',
            'password.regex' => 'Password must contain at least one uppercase letter, one numeric digit, and one special character.',

            'cPassword.required' => 'Confirmation password is required.',
            'cPassword.same' => 'The confirmation password must match the password.'
        ]);

        $teacher = new Teacher;
        $teacher->first_name = $request->fName;
        $teacher->last_name = $request->lName;
        $teacher->phone_num = $request->phone;
        $teacher->email = $request->email;
        $teacher->password = bcrypt($request->password);
        if ($teacher->save()) {
            return "New teacher added successfully";
        } else {
            return "Error adding teacher";
        }
    }

    function updateTeacher(Request $request)
    {
        return "This is update function";
    }

    function getTeacherById($id)
    {
        $teacher = Teacher::where('id', $id)->first();

        if ($teacher) {
            $teacher = $teacher->makeHidden(['id', 'password']);
            return view('Principal.profile', ["result" => $teacher]);
        } else {
            return response()->json(['status' => false, 'message' => 'Error findind']);
        }
    }
}
