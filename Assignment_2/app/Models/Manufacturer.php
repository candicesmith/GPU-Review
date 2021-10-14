<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Manufacturer extends Model
{
    use HasFactory;

    // A manufacturer can have many products
    function products() {
        return $this->hasMany('App\Models\Product');
    }
}
