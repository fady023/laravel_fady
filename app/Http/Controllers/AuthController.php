<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        return view("auth.login");
    }

    public function authenticate(Request $request)
    {

        $credentials = $request->validate([
            "email" => ["required", "email", "exists:users,email"],
            "password" => ["required"]
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended("home");
        } else {
            return back()->withErrors([
                "message" => "Credentials not correct"
            ]);
        }
    }
    public function register()
    {
        return view("auth.register");
    }

    public function store(Request $request)
    {
        $credentials = $request->validate([
            "name" => ["required", "string", "max:50"],
            "email" => ["required", "email", "unique:users,email"],
            "password" => ["required"]
        ]);

        $user = User::create($credentials);

        Auth::login($user);
        return redirect()->intended("home");
    }
}
