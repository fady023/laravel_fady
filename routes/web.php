<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get("/test",function(){
    return view('users.testform');
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


Route::resource("user", UserController::class)
    ->middleware("auth")
    ->withoutMiddlewareFor("create", "auth");


Route::get("/user/{id}/restore", [UserController::class, "restore"])->name("user.restore");

Route::resource("posts",PostController::class);

Route::get("/login",[AuthController::class,"login"])->name("login");

Route::post("/login",[AuthController::class,"authenticate"])->name("login.authenticate");

Route::get("/register",[AuthController::class,"register"]);
Route::post("/register",[AuthController::class,"store"])->name("register.store");