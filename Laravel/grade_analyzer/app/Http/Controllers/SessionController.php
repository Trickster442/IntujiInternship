<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionController extends Controller
{
    public function login(Request $request)
    {
        $request->session()->put('user', $request->input('user'));

        return redirect('session-profile');
    }

    public function logout()
    {
        //remove user from user
        session()->pull('user');
        return redirect('/session-profile');
    }

    public function flashLogin(Request $request)
    {
        $request->session()->flash('message', 'User has been added successfully');
        return redirect('flash-session-form');
    }

}
