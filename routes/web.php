
<<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test', function () {
    return view('users.testform');
});

Route::view('/home', 'myhome');

// مسارات المستخدمين (المفرد والجمع)
Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::get('/user', [UserController::class, 'index']);

// بقية مسارات User
Route::get('/user/create', [UserController::class, 'create'])->name('users.create');
Route::get('/user/edit', [UserController::class, 'edit']);
Route::get('/user/{id}/restore', [UserController::class, 'restore'])->name('user.restore');

// المسارات الأخرى
Route::resource('posts', PostController::class);
Route::get('/login', [AuthController::class, 'login'])->name('login');