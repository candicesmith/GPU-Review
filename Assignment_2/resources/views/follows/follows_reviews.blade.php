@extends('layouts.master')

@section('title')
  Follows
@endsection

@section('content')
    <div class="mt-4 mb-4">
        <div class="mr-3"><a href='{{ url("follow") }}'><i class="bi bi-arrow-left"></i></a></div>
        <div class="mr-0 ml-4 mb-4 product-title">
            {{ $user->name }} Reviews
        </div>
        <div class="ml-4 pr-4">
            @foreach($reviews as $review)
                <div class="card mb-4">
                    @foreach($products as $product)
                        @if($product->id == $review->product_id)
                            <div class="row"> 
                                <div class="col-md-2 ml-4 product-image">
                                    <img src="{{ url($product->image) }}" width="250" height="250">
                                </div>
                            
                                <div class="col-md-8">
                                    <div class="row product-title ml-4 mt-2">
                                        <a href='{{ url("product/$product->id/1") }}'>{{ $product->manufacturer->name }} {{ $product->name }}</a>
                                    </div>     
                                    <div class="row product-price ml-4 mt-2">  
                                        <a href='{{ url("review/$review->id") }}'>{{ $review->title }}</a>     
                                    </div>
                                    <div class="row">
                                        <div class="product-description mt-2 mb-2">"{{ $review->review }}"</div>
                                    </div>
                                    <div class="row">
                                        <div class="product-description mt-2 mb-2">Likes: {{ $review->likes }}</div>
                                    </div>
                                    <div class="row">
                                        <div class="product-description mt-2 mb-2">Dislikes: {{ $review->dislikes }}</div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            @endforeach
        </div>
    </div>
@endsection