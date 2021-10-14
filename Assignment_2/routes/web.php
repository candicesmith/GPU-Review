<?php

use Illuminate\Support\Facades\Route;
use App\Models\Product;
use App\Models\Manufacturer;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\FollowController;
use App\Http\Controllers\RecommendationController;
use App\Models\User;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::resource('product', ProductController::class);
Route::resource('review', ReviewController::class);
Route::resource('like', LikeController::class);
Route::resource('follow', FollowController::class);
Route::resource('recommendation', RecommendationController::class);

Route::get('review/{id}/create', 'App\Http\Controllers\ReviewController@create')->name('reviews.create');

Route::get('product/{id}/{page}', 'App\Http\Controllers\ProductController@show')->name('products.show');

Route::get('follow', 'App\Http\Controllers\FollowController@destroy')->name('follows.show');

Route::resource('product', 'App\Http\Controllers\ProductController', ['except' => 'show']);
// Define your resource routes, excluding 'create'
Route::resource('review', 'App\Http\Controllers\ReviewController', ['except' => 'create']);

Route::resource('follow', 'App\Http\Controllers\FollowController', ['except' => 'destroy']);

Route::get('/', [ProductController::class, 'index']);

Route::get('documentation', function(){
    return view('documentation');
});

Route::get('/test', function() {
    // $user = User::find(3);
    // $produst = Product::find(4);
    // $user->products()->attach($product->id, array('review' => $review));
    //dd($prods);

    // $name = 'ASUS';
    // $name2 = 'GeForce';
    // $products = Product::whereHas('manufacturer', function($query) use ($name) {
    //     return $query->whereRaw('name like ?', array("%$name%"));
    // })->whereRaw('name like ?', array("%$name2%"))->get();
    // dd($products);

    // $name = 'ASUS';
    // $name2 = 'GeForce';
    // $products = Product::whereRaw('name like ?', array("%$name2%"))
    //             ->orWhereHas('manufacturer', function($query) use ($name) {
    //                 return $query->whereRaw('name like ?', array("%$name%"));
    //             })->get();
    // dd($products);

    // $name = 'Aorus';
    // $prods = $user->products()->whereRaw('name like ?', array("%$name%"))->get();
    // dd($prods);
});

require __DIR__.'/auth.php';
