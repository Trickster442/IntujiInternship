<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
}
