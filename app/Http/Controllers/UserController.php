<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function getAllUsers(){
        $users = User::all();

        return response()->json([
            "status" => "Success",
            "users" => $users,
        ]);
    }

    public function getUserById(Request $request){
        $id = $request->id;
        $user = User::find($id);
        return response()->json([
            "status" => "Success",
            "user" => $user,
        ]);
    }

    public function userLogin(Request $request){
        // $email = User::find($request->email);
        // $password = User::find($request->password);
        $email = $request->email;
        $password = $request->password;
        $user = User::where('email', $email)->first();
        
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
}
