<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Manufacturer;
use App\Models\User;
use App\Models\Review;
use Illuminate\Validation\Rule;

class ReviewController extends Controller
{
    // Displays the list of reviews
    public function index()
    {
        $products = Review::all();
        return view('reviews.create_form')->with('reviews', $reviews);
    }

    // Displays the create form for a review
    public function create($id)
    {
        $product = Product::find($id);
        return view('reviews.create_form')->with('product', $product);
    }

    // Creates a review
    public function store(Request $request)
    {
        $uniqueRule =  Rule::unique('reviews')->where(function ($query) use ($request){
            $query->where('user_id', $request['user_id']);
            $query->where('product_id', $request['product_id']);
        });

        $this->validate($request, [
            'title' => 'required|max:255',
            'rating' => 'required|integer|digits_between:1,5',
            'review' => 'required|string|min:6',
            'product_id' => 'required|numeric',
            'user_id' => ['required', 'integer', $uniqueRule],
        ]);

        $review = new Review();
        $review->title = $request->title;
        $review->rating = $request->rating;
        $review->review = $request->review;
        $review->product_id = $request->product_id;
        $review->user_id = $request->user_id;
        $review->likes = 0;
        $review->dislikes = 0;
        $review->save();
        $product_id = $review->product_id;
        $product = Product::find($product_id);
        $user = User::find($review->user_id);

        return view("reviews.review_details")->with('product', $product)->with('review', $review)->with('user', $user);
    }

    // Displays a review
    public function show($id)
    {
        $review = Review::find($id);
        $product_id = $review->product_id;
        $product = Product::find($product_id);
        $user = User::find($review->user_id);
        return view('reviews.review_details')->with('product', $product)->with('review', $review)->with('user', $user);
    }

    // Displays the update form for a review
    public function edit($id)
    {
        $review = Review::find($id);
        $product = Product::find($review->product_id);
        return view('reviews.edit_form')->with('review', $review)->with('product', $product);
    }

    // Updates a review
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required|max:255',
            'rating' => 'required|integer|digits_between:1,10',
            'review' => 'required|string|min:6',
            'product_id' => 'required|numeric',
            'user_id' => 'required|numeric',
        ]);

        $review = Review::find($id);
        $review->title = $request->title;
        $review->rating = $request->rating;
        $review->review = $request->review;
        $review->product_id = $request->product_id;
        $review->user_id = $request->user_id;
        $review->save();

        return redirect("product/$review->product_id/1");
    }

    // Deletes a review
    public function destroy($id)
    {
        $review = Review::find($id);
        $product_id = $review->product_id;
        $review->delete();
        return redirect("product/$product_id/1");
    }

}
