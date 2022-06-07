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
}
