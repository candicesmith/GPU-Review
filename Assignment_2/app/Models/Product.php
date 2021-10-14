<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'price', 'chipset', 'manufacturer', 'vram', 'url', 'description'];

    // A product has one manufacturer
    function manufacturer() {
        return $this->belongsTo('App\Models\Manufacturer');
    }

    // Products is associated with reviews through likes
    function users() {
        return $this->belongsToMany('App\Models\User', 'reviews')->withPivot('title')->withPivot('review')->withPivot('rating')->withPivot('id')->withTimeStamps();
    }
}
