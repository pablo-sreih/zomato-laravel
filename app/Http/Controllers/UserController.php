<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    // Function to Get All The Users from the Database
    public function getAllUsers(){
        $users = User::all();

        return response()->json([
            "status" => "Success",
            "users" => $users,
        ]);
    }

    // Function to Get User By ID
    public function getUserById(Request $request){
        $id = $request->id;
        $user = User::find($id);
        return response()->json([
            "status" => "Success",
            "user" => $user,
        ]);
    }

    // Function to Get the ID of the User and Login
    public function userLogin(Request $request){
        // $email = User::find($request->email);
        // $password = User::find($request->password);
        $email = $request->email;
        $password = $request->password;
        $user = User::where('email', '=', $email)->first();
        if ($user === null){
            return response()->json([
                "status" => "User not found",
            ]);
        }
        if ($password == $user->password){
            return response()->json([
                "status" => "Success",
                "user_id" => $user->id,
            ]);
        }else{
            return response()->json([
                "status" => "Wrong Password",
            ]);
        }
        
    }

    // Function to Add a User or Sign Up
    public function addUser(Request $request){
        $user = New User;
        $user->full_name = $request->full_name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->is_admin = $request->is_admin;
        $user->address = $request->address;
        $user->save();

        return response()->json([
            "status" => "Success"
        ]);
    }

    // Function to Modify a User
    public function modifyUser(Request $request){
        $id = $request->id;
        $name = $request->full_name;
        User::where('id', "=", $id)->update(['full_name'=>$name]);
        return response()->json([
            "status" => "Success",
        ]);
    }
}