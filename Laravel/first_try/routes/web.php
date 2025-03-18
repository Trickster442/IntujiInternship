<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('/home', function () {
    return view('home');
});

// Route::view('/home', 'home');


//redirect welcome to /
Route::redirect('/welcome', '/');


// passing parameter with url and checking
Route::get('/about/{param}', function ($param) {
    // echo $param . '<br>';
    // return view('about');
    return view('about', ['param' => $param]);
});


Route::get('/user', [UserController::class, 'getUser']);

Route::get('/user/{name}', [UserController::class, 'getUserName']);

Route::get('admin', [UserController::class, 'adminLogin']);

Route::get('/admin-about/{name}', function ($name) {

    return view('admin.about', ['name' => $name]);

});



Route::view('user-form', 'user-form');


Route::post('adduser', [UserController::class, 'addUser']);

Route::get('/form', function () {
    return view('second-form');
});

Route::post('/add-new-user', [UserController::class, 'addNewUser']);