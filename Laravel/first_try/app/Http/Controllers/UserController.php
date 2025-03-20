<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class UserController extends Controller
{
    function getUser()
    {
        return view('user');
    }

    function getUserName($name)
    {
        return "Hello " . $name;
    }

    function adminLogin()
    {
        return view('admin.login');
    }

    function addUser(Request $request)
    {
        echo $request->name;
    }

    function addNewUser(Request $request)
    {
        print_r($request->skill);
        echo "<br>";
        echo $request->gender;
        echo "<br>";
        echo $request->city;
    }

    function validateUser(Request $request)
    {
        // required validation for form
        $request->validate([
            'username' => 'required',
            'email' => 'required',
            'password' => 'required'
        ]);

        return $request;
    }

    function show($name)
    {
        return view('try-user', ['name' => $name]);
    }

    function getUsers()
    {
        $users = DB::select('SELECT * FROM users');
        return view('display-users', ['users' => $users]);
    }
}
