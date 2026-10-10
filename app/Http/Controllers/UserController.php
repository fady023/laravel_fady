<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    function index(){
        $user = "sam";

        if($user == "x"){
            return "hello mr x";
        }else if($user == "sam"){
            return "hello ms sam";
        }else if($user == "fed"){
            return "hello mr fady";
        }
    }

    function edit(){
        return "this is edit page";
    }
    function create(){
        return "this is create page";
    }
}
