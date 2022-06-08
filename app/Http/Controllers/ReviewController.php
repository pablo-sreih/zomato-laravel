<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;

class ReviewController extends Controller
{
    public function getAllReviews(){
        $review = Review::all();

        return response()->json([
            "status" => "Success",
            "reviews" => $review
        ]);
    }
}