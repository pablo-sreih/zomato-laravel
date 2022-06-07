<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Restaurant;

class RestoController extends Controller
{
    public function getAllRestos(){
        $restos = Restaurant::all();

        return response()->json([
            "status" => 'Success',
            "restos" => $restos,
        ]);
    }

    public function findResto(Request $request){
        $resto = $request->resto;
        $name = Restaurant::where('name', '=', $resto)->first();
        if ($name === null){
            return response()->json([
                "status" => "Restaurant Not Found"
            ]);
        } else {
            return response()->json([
                "status" => "Success",
                "resto" => $name, 
            ]);
        }
    }
}
