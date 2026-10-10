<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

/* Route::get("/home",function(){
    return view("myhome");
}); */

Route::view("home","myhome");



Route::prefix("/user")->group(function(){
Route::get("/",[UserController::class,"index"]);
Route::get("/edit",[UserController::class,"edit"]);
Route::get("/create",[UserController::class,"create"]);
});