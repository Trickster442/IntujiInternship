<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/test', function () {
    return ['Name' => 'Sandip Magar', 'Age' => 21];
});

// Api try

Route::post('/login', [ApiController::class, 'login']);
Route::post('/signup', [ApiController::class, 'signUp']);

Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::get('/teachers', [ApiController::class, 'list']);
    Route::post('/add-teacher', [ApiController::class, 'add']);
    Route::put('/update-teacher', [ApiController::class, 'update']);
    Route::delete('/delete-teacher/{id}', [ApiController::class, 'delete']);
});

Route::get('/login', [ApiController::class, 'login'])->name('/login');