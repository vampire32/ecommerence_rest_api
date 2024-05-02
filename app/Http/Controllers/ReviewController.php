<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReviewController extends Controller
{
    public function index()
    {
        $reviews=DB::table('reviews')->join('users','reviews.user_id','=','users.id')->get();
        return response()->json($reviews);

    }

    public function store()
    {
        $reviews=Review::create(request()->all());

        return response()->json($reviews,200);

    }
    public function reviewsbyproduct()
    {
        $productid=request()->get('product_id');
        $reviews=DB::table('reviews')->join('products','reviews.product_id','=',$productid)->join('users','users.id','=','reviews.user_id')->get();
         return response()->json($reviews,201);


    }
}
