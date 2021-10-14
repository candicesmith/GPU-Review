<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'rating', 'review', 'likes', 'dislikes', 'product_id', 'user_id'];


    // Products associated with User based on Reviews
    function users() {
        return $this->belongsToMany('App\Models\User', 'likes')->withTimeStamps();
    }
}
