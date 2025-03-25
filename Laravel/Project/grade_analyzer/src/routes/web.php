<?php

use App\Http\Controllers\ClassController;
use App\Http\Controllers\TeacherController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('login');
});

Route::post('/login-data', [TeacherController::class, 'login']);
Route::view('/register', 'register');

Route::post('/register-teacher', [TeacherController::class, 'register']);


// Principal
Route::middleware('auth')->group(function () {
    Route::view('/principal/home', 'Principal.home')->middleware('auth');
    Route::get('/logout', [TeacherController::class, 'logout']);
    Route::get('/get-profile/{id}', [TeacherController::class, 'getTeacherById']);
    Route::view('/profile', 'Principal.profile');
});

Route::prefix('class')->group(function () {
    Route::view('/add', 'Principal.Class.addClass');
    Route::post('/add', [ClassController::class, 'add']);
});


// Teacher
Route::view('/teacher/home', 'Teacher.home');

// Class teacher
Route::view('/class-teacher/home', 'ClassTeacher.home');
