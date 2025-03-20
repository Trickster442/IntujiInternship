<?php

use App\Http\Controllers\StudentController;
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

