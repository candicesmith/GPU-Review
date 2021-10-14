@extends('layouts.master')

@section('title')
  My Reviews
@endsection

@section('content')
    <div class="">
    @auth
        <div class="parent-flex">
            @foreach($userProducts as $product)
                {{ $product->pivot->title }}
                {{ $product->pivot->rating }}
                {{ $product->pivot->review }}
                <div class="flex-item">
                    <div class=" mr-3 ml-3">
                        <img src="{{ $product->image }}" width="200" height="200">
                    </div>
                    <div class="product-title-list mr-3 ml-3">
                        <a href="product/{{$product->id}}">{{ $product->manufacturer->name }} {{ $product->name }}</a>
                    </div>
                    <div class="product-title-list mr-3 ml-3">
                        ${{ $product->price }}
                    </div>
                </div>
            @endforeach
        </div>
    
        <p><button class="btn btn-dark"><a href='{{ url("product/create") }}'>Create Product</a></button></p>
    @endauth
    </div>
@endsection