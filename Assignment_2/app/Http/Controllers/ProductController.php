<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Manufacturer;
use App\Models\User;
use App\Models\Review;
use App\Models\Like;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    // Ensures user is authenticated
    function __construct(){
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }
    
    // Displays the list of products
    public function index()
    {
        $products = Product::all();
        
        return view('products.products')->with('products', $products);
    }

    // Displays the create form for a product
    public function create()
    {
        $manufacturers = Manufacturer::all();
        return view('products.create_form')->with('manufacturers', $manufacturers);
    }

    // Creates a product
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:products',
            'price' => 'required|numeric|min:0|not_in:0',
            'chipset' => 'required',
            'manufacturer' => 'exists:manufacturers,id',
            'vram' => 'required',
            'url' => 'url',
            'description' => 'required',
        ]);
        $image_store = request()->file('image')->store('products_images', 'public');
        $product = new Product();
        $product->name = $request->name;
        $product->price = $request->price;
        $product->chipset = $request->chipset;
        $product->manufacturer_id = $request->manufacturer;
        $product->vram = $request->vram;
        $product->url = $request->url;
        $product->image = $image_store;
        $product->description = $request->description;
        $product->save();
        return redirect("product/$product->id/1");
    }

    // Displays a product
    public function show($id, $page)
    {
        $product = Product::find($id);
        $users = User::all();

        $num_items = Review::whereRaw('product_id = ?', array("$id"))->count();
        $total_pages = ceil($num_items / 5);
        $curr_page = $page;
        $next_page = $page + 1;
        $prev_page = $page - 1;
        $offset = ((int)$page - 1) * 5;
        $reviews = Review::select('reviews.*')->where('reviews.product_id', $id)->offset($offset)->limit(5)->get();
        $likes = Like::select('likes.*')->where('likes.user_id_like', Auth::id())->get();
        
        return view('products.product_details')->with('product', $product)
            ->with('reviews', $reviews)->with('total_pages', $total_pages)
            ->with('users', $users)->with('next_page', $next_page)
            ->with('prev_page', $prev_page)->with('curr_page', $curr_page)
            ->with('likes', $likes);
    }

    // Displays the update form for a product
    public function edit($id)
    {
        $product = Product::find($id);
        return view('products.edit_form')->with('product', $product)->with('manufacturers', Manufacturer::all());
    }

    // Updates a product
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'price' => 'required|numeric',
            'chipset' => 'required|max:255',
            'manufacturer' => 'exists:manufacturers,id',
            'vram' => 'required|max:255',
            'url' => 'required',
            'image' => 'required',
            'description' => 'required',
        ]);

        $image_store = request()->file('image')->store('products_images', 'public');
        $product = Product::find($id);
        $product->name = $request->name;
        $product->price = $request->price;
        $product->chipset = $request->chipset;
        $product->manufacturer_id = $request->manufacturer;
        $product->vram = $request->vram;
        $product->url = $request->url;
        $product->image = $image_store;
        $product->description = $request->description;
        $product->save();

        return redirect("product/$product->id/1");
    }

     // Deletes a product
    public function destroy($id)
    {
        $reviews = Review::whereRaw('product_id = ?', array("$id"))->get();
        $reviews->each->delete();
        $product = Product::find($id);
        $product->delete();
        return redirect("product");
    }

    public function userReviews($id) 
    {
        $user = User::find($id);
        $userProducts = $user->products;
        return redirect("products.user_reviews")->with($userProducts);
    }
}
