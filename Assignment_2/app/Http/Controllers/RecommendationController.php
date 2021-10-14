<?php

namespace App\Http\Controllers;

use App\Models\Recommendation;
use App\Models\Product;
use App\Models\Review;
use App\Models\Like;
use App\Models\User;
use App\Models\Follow;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RecommendationController extends Controller
{
    // Ensures user is authenticated
    function __construct(){
        $this->middleware('auth');
    }

    // Displays the list of Recommendations
    public function index()
    {
        $reviews = Review::select("reviews.*")->get();
        $users = [];
        foreach($reviews as $review) {
            if($review->likes > $review->dislikes){
                $users[] = $review->user_id;
            }
        }
        $reviews = Review::select("reviews.*")->get();
        $products = Product::all();
        $follows = Follow::where('follows.follower_id', Auth::id())->get();
        $map = [];
        if(count($users) > 0) {
            foreach (range(0, count($users) - 1) as $user) {
                $map[$user] = User::select("users.*")->where("id", "=", $users[$user])->get()[0]; 
            }
        }
        $follows = Follow::where('follows.follower_id', Auth::id())->get();
        
        return view('recommendations.recommendations')->with('users', $map)->with('follows', $follows);
    }

}
