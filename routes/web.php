<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/post', function () {
    return view('post');
});


Route::get('/login', function () {
    return view('login');
});

Route::get('/signup', function () {
    return view('signup');
});

Route::post('/register', [UserController::class, 'register']);

Route::POST('/logout', [UserController::class, 'logout']);

Route::post('/login', [UserController::class, 'login']);

Route::get('/createpost', function () {
    return view('createpost');
});

//post controller route
Route::post('/create-post', [PostController::class, 'createPost']);


