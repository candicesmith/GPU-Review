<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\Like;
use App\Models\Review;
use App\Models\User;

class LikeController extends Controller
{
    // Creates a new like/dislike instance
    public function store(Request $request)
    {
        $uniqueRule =  Rule::unique('likes')->where(function ($query) use ($request){
            $query->where('user_id_like', $request['user_id_like']);
            $query->where('review_id_like', $request['review_id_like']);
        });

        $this->validate($request, [
            'user_id_like' => ['required', 'integer', $uniqueRule],
            'review_id_like' => 'required|integer',
            'value' => 'required',
        ]);

        $like = new Like();
        $like->user_id_like = $request->user_id_like;
        $like->review_id_like = $request->review_id_like;
        $like->value = $request->value;

        $review = Review::find($like->review_id_like);
        if($like->value == "like") {
            $review->likes = $review->likes + 1;
        }
        else {
            $review->dislikes = $review->dislikes + 1;
        }
        $review->save();
        $user = User::find($like->user_id_like);
        $product_id = $review->product_id;
        $like->save();

        return redirect("product/$product_id/1");
    }

}
