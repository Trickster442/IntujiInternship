<?php

use App\Http\Controllers\GroupController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\AgeCheck;
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


Route::view('/validate-form', 'third-form');
Route::post('/validate-user', [UserController::class, 'validateUser']);

//Route::view('/home/profile/user', 'try-user')->name('try');
Route::view('/home/profile/{name}', 'try-user')->name('try');


Route::get('try', [UserController::class, 'show']);

// Route::get('/group/first', [GroupController::class, 'show']);
// Route::get('/group/second', [GroupController::class, 'add']);
// Route::get('/group/third', [GroupController::class, 'third']);


//group by prefix
// Route::prefix('/group')->group(function () {
//     Route::get('/first', [GroupController::class, 'show']);
//     Route::get('/second', [GroupController::class, 'add']);
//     Route::get('/third', [GroupController::class, 'third']);
// });


//group by controller
// Route::controller(GroupController::class)->group(function () {
//     Route::get('/first', 'show');
//     Route::get('/second', 'add');
//     Route::get('/third', 'third');
// });


//group by prefix and then controller
Route::prefix('group')->group(function () {
    Route::controller(GroupController::class)->group(function () {
        Route::get('/first', 'show');
        Route::get('/second', 'add');
        Route::get('/third', 'third');

        // passing param
        Route::get('/fourth/{name}', 'about');
    });
});


Route::view('/age-check', 'age-check')->middleware('check');

// direct single middleware for rout
Route::view('/age-d-check', 'age-check')->middleware(AgeCheck::class);

// Route::get('/getUsers', [UserController::class, 'getUsers']);

Route::get('/getUsers', [UserController::class, 'getUsers']);

Route::get('/get-students', [StudentController::class, 'getStudents']);

Route::get('/student-query', [StudentController::class, 'queries']);
