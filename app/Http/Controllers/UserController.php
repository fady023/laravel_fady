<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        // $users = User::where("name","like","%n")->get();
        // $users = User::where("name","Nigel Feest")->get();
        // $users = User::find(2);
        // $users = User::where("id", ">", 5)->get();

        return view('users.index', compact("users"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            "name" => "required|max:50",
            "email" => "required|unique:users|email",
            "password" => "required|min:5"
        ]);

     /*    $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save(); */

        $user = User::create([
            "name" => $request->name,
            "email" => $request->email,
            "password"=>Hash::make($request->password) 
        ]);

        return redirect()->route("user.index")->with("success", "user inserted");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::findOrFail($id);
        return view('users.show',compact("user"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::findOrFail($id);

        return view("users.edit",compact("user"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::findOrFail($id);

        $validated = $request->validate([
            "name" => "required|string|max:50",
            "email" => [
                "required",
                "email",
                Rule::unique("users", "email")->ignore($user->id),
            ],
            "password" => "nullable|string|min:5",
        ]);

        $user->name = $validated["name"];
        $user->email = $validated["email"];

        if (!empty($validated["password"])) {
            $user->password = Hash::make($validated["password"]);
        }

        $user->save();

        return redirect()->route("user.index")->with("success", "User updated.");
    }

    public function destroy(string $id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route("user.index")->with("success", "User deleted.");
    }
}
