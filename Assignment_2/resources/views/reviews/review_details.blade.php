@extends('layouts.master')

@section('title')
  {{$product->name}}
@endsection


@section('content')
    <div class="px-4 mt-4 mb-4">
        <div class="d-flex mb-4">
            <div class="mr-3"><a href='{{ url("product/$product->id/1") }}'><i class="bi bi-arrow-left"></i></a></div>
        </div>
        <div class="mt-3 mb-3 card">
            @if($review->likes > $review->dislikes)
                <div class="popular-review">
            @elseif($review->likes < $review->dislikes)
                <div class="unpopular-review">
            @else
                <div class="review">
            @endif
            <div class="row">
                <div class="col-md-2 ml-4 product-image">
                    <img src="{{ url($product->image) }}" width="250" height="250">
                </div> 
                <div class="col-md-8 mt-4">
                    <div class="row">  
                        <div class="col-md-9 product-title ml-4 mb-3"><a href='{{ url("review/$review->id") }}'>{{ $review->title }}</a></div> 
                        @auth
                            @if(Auth::user()->user_type == "Moderator" || Auth::user()->id == $review->user_id)
                                <div class="col-md-2 d-flex float-right">
                                    <div class="ml-3 mr-3">
                                        <a href='{{ url("review/$review->id/edit") }}'>
                                            <button class="btn btn-success"><i class="bi bi-pencil-square"></i> Edit</button>
                                        </a>
                                    </div>
                                    <div class="mb-4">
                                        <form method="POST" action='{{ url("review/$review->id") }}'>
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                            <button class="btn btn-danger" type="submit" value="Delete"><i class="bi bi-x-square"></i> Delete</button>
                                        </form>
                                    </div>
                                </div>
                            @endif
                        @endauth
                    </div>
                    <div class="row product-description">Rating: {{ $review->rating }}/5</div>
                    <div class="row">
                        <div class="product-description mt-2 mb-2">{{ $review->review }}</div>
                    </div>
                    <div class="row mt-4">
                        <div class="product-description">
                            {{ $review->created_at }}
                        </div>
                        <div class="product-description">
                            User: {{ $user->name }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection