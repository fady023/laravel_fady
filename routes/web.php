<?php

use App\Http\Controllers\UserController;
use App\Http\Middleware\CheckName;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

/* Route::get("/home",function(){
    return view("myhome");
}); */

Route::view("home","myhome");

/* Route::prefix("/user")->group(function(){
Route::get("/",[UserController::class,"index"]);
Route::get("/edit",[UserController::class,"edit"]);
Route::get("/create",[UserController::class,"create"]);
}); */

/* Route::controller(UserController::class)->prefix("/user")->group(function(){
   Route::get("/","index")->name("user.home");
   Route::get("{x}/edit","edit")->name("user.edit");
   Route::get("/create","create")->name("user.create");
});  */

Route::resource("user",UserController::class);