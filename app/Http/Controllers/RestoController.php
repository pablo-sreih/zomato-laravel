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
        $name = Restaurant::where('name', 'LIKE', "%$resto%")->get();
        return response()->json([
            "status" => "Success",
            "resto" => $name, 
        ]);
    }

    public function addResto(Request $request){
        $resto = new Restaurant;
        $resto->name = $request->name;
        $resto->website = $request->website;
        $resto->average_cost = $request->average_cost;
        $resto->email = $request->email;
        $resto->location = $request->location;
        $resto->category = $request->category;
        $resto->save();

        return response()->json([
            "status" => "Success",
        ]);
    }
}