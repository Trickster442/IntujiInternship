<?php

use App\Http\Controllers\TeacherController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('login');
});

Route::post('/login-data', [TeacherController::class, 'login']);
Route::view('/principal/home', 'Principal.home');
Route::view('/register', 'register');


// Teacher 
Route::view('/teacher/home', 'Teacher.home');


// class teacher
Route::view('/class-teacher/home', 'ClassTeacher.home');