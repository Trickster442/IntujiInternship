<?php

use App\Http\Controllers\DatabaseController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\UploadController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/student-page', [StudentController::class, 'queries']);

Route::get('/student-page', [StudentController::class, 'any']);
Route::delete('/student-page', [StudentController::class, 'any']);

//Route::any('/student-page', [StudentController::class, 'any']);


// group url by the method to redirect to certain url
//Route::match(['post', 'get'], '/student-page', [StudentController::class, 'group1']);
//Route::match(['put', 'deletes'], '/student-page', [StudentController::class, 'group2']);

Route::post('/http', [StudentController::class, 'httpRequest']);

Route::view('/login', 'form');

// for session
Route::view('/session-form', 'Session.login');
Route::post('/session-form', [SessionController::class, 'login']);
Route::view('/session-profile', 'Session.profile');
Route::get('/session-logout', [SessionController::class, 'logout']);

// flash session
Route::view('/flash-session-form', 'Session.flashLogin');
Route::post('/flash-session-form', [SessionController::class, 'flashLogin']);

// file upload part
Route::view('/upload', 'Upload.upload');
Route::post('/upload', [UploadController::class, 'upload']);

Route::view('/display', 'Upload.display');

// for localization
Route::view('/about', 'about');

// database query
Route::view('/teacher/add', 'Database.addTeacher');
Route::post('/teacher/add', [DatabaseController::class, 'addTeacher']);


Route::view('/teacher/update', 'Database.updateTeacher');

Route::get('/teacher/get', [DatabaseController::class, 'getTeachers']);

Route::get('/teacher/delete/{id}', [DatabaseController::class, 'deleteTeacher']);

Route::get('/teacher/edit/{id}', [DatabaseController::class, 'updateTeacher']);

Route::put('/teacher/update/{id}', [DatabaseController::class, 'update']);

Route::get('/teacher/search', [DatabaseController::class, 'searchTeacher']);

//layout
ROute::view('/layout/home', 'Layout.home');
Route::view('/layout/about', 'Layout.about');