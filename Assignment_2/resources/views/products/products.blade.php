@extends('layouts.master')

@section('title')
  Products
@endsection

@section('content')
    <div class="mt-4 mb-4">
        @auth
            <div class="mr-0 ml-4 product-title">
                Graphics Cards
            </div>
        @endauth
        <div class="parent-flex">
            @foreach($products as $product)
                <div class="flex-item">
                    <a href="product/{{ $product->id }}/1">
                        <div class="product-image mr-3 ml-3">
                            <img src="{{ url($product->image) }}">
                        </div>
                        <div class="product-title-list mr-3 ml-3">
                            {{ $product->manufacturer->name }} {{ $product->name }}
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
@endsection