<?php

use App\Http\Controllers\TeacherController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('login');
});

Route::post('/login-data', [TeacherController::class, 'login']);
Route::view('/principal/home', 'Principal.home')->middleware('auth');
Route::view('/register', 'register');

// Teacher
Route::view('/teacher/home', 'Teacher.home');

// Class teacher
Route::view('/class-teacher/home', 'ClassTeacher.home');
