<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('login');
});

Route::view('/principal/home', 'Principal.home');
Route::view('/register', 'register');