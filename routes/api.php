<?php

use App\Http\Controllers\API\UserController;
// use App\Models\User;
// use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', [UserController::class,"index"]);
Route::post('/user', [UserController::class, "store"]);
