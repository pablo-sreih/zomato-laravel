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
}
