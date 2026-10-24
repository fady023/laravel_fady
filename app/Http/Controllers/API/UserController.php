<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();

        // return response()->json($users);
        return UserResource::collection($users);  // choose what coloumns to show from db in UserResource page
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = Validator::make($request->all(), [
            "name" => "required|max:50",
            "email" => "required|unique:users|email",
            "password" => "required|min:5"
        ]);
        if ($validated->fails()) {
            return response()->json($validated->errors());
        }

        $user = User::create($validated->validated());

        return response()->json([
            "message" => "User created successfully.",
            "user" => $user,
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::find($id);

        if (!$user) {
            return response()->json([
                "message" => "error in show user.",
                "status" => "error",
            ]);
        }
        // return response()->json($user);
        return new UserResource($user);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = Validator::make($request->all(), [
            "name" => "required|max:50",
            "email" => "required|email",
            "password" => "required|min:5"
        ]);

        if ($validated->fails()) {
            return response()->json($validated->errors());
        }

        $user = User::find($id);


        if (!$user) {
            return response()->json([
                "message" => "error in update user.",
                "status" => "error",
            ]);
        }

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->save();

        return response()->json([
            "message" => "user updated",
            "data" => $user
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::find($id);

        if(!$user){
            return response()->json([
                "message"=>"user not found",
                "status"=>"error"
            ]);
        }

        $user->delete();
        return response()->json([
            "status"=>"success",
            "message"=>"user deleted"
        ]);
    }
}
