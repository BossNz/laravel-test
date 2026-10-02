<?php

use App\Http\Controllers\UserController;
use App\Models\User;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return redirect('/login');
});

Route::get('/login', function () {
    return view('login');
})->middleware('guest');

Route::post('/login', [UserController::class, 'authenticate'])->middleware('guest');

Route::get('/dashboard', [UserController::class, 'dashboard'])->middleware('auth');

Route::get('/logout', [UserController::class, 'logout'])->middleware('auth');

// CRUD
Route::get('/user', [UserController::class, 'getUsers'])->middleware('auth');

Route::get('/user/create', function () {
    return view('newuser');
})->middleware('auth');

Route::post('/user/create', [UserController::class, 'createUser'])->middleware('auth');

Route::get('/user/{id}', function ($id) {
    return view('edituser', ['user' => User::where('id', $id)->first()]);
})->middleware('auth');

Route::put('/user/{id}', [UserController::class,'updateUser'])->middleware('auth');


Route::delete('/user/{id}', function ($id) {
    User::where('id', $id)->delete();
    return redirect('/user');
})->middleware('auth');

// PROFILE

Route::get('/profile/edit', function () {
    $auth = Auth::user();

    return view('profile', ['user' => $auth]);
})->middleware('auth');

Route::put('/profile/edit', [UserController::class, 'updateProfile'])->middleware('auth');
