<?php

namespace App\Http\Controllers;

use App\Models\Follow;
use Illuminate\Http\Request;
use App\Models\Review;
use App\Models\User;
use App\Models\Product;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

class FollowController extends Controller
{
    // Ensures user is authenticated
    function __construct(){
        $this->middleware('auth');
    }
    

    // Displays the list of follows
    public function index()
    {
        $follows = Follow::where('follows.follower_id', Auth::id())->get();
        $users = User::all();

        return view("follows.follows")->with('follows', $follows)->with('users', $users);
    }


    // Follows a reviewer
    public function store(Request $request)
    {
        $uniqueRule =  Rule::unique('follows')->where(function ($query) use ($request){
            $query->where('follower_id', $request['follower_id']);
            $query->where('reviewer_id', $request['reviewer_id']);
        });

        $this->validate($request, [
            'follower_id' => ['required', 'integer', $uniqueRule],
            'reviewer_id' => 'required|integer',
        ]);

        $follow = new Follow();
        $follow->follower_id = $request->follower_id;
        $follow->reviewer_id = $request->reviewer_id;

        $follow->save();

        $product_id = $request->product_id;
        if($product_id == '0'){
            return redirect("/");
        }

        return redirect("product/$product_id/1");
    }

    // Displays a user that has been followed
    public function show(Follow $follow)
    {
        $user = User::find($follow->reviewer_id);
        $reviews = Review::where('reviews.user_id', '=', $user->id)->get();
        $products = Product::all();
        return view("follows.follows_reviews")->with('reviews', $reviews)->with('user', $user)->with('products', $products);
    }


    // Unfollows a user
    public function destroy(Request $request)
    {
        $follower = $request->follower_id;
        $reviewer = $request->reviewer_id;
        $follow = Follow::select('follows.*')->where('follows.follower_id', $follower)->where('follows.reviewer_id', $reviewer);
        $follow->delete();
        $product_id = $request->product_id;
        if($product_id == '0'){
            return redirect("/");
        }

        return redirect("product/$product_id/1");
    }
}
