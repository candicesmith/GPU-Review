@extends('layouts.master')

@section('title')
  Edit {{ $review->title }}
@endsection


@section('content')
    <div class="px-4 mt-4 mb-4">
        <div class="mr-3 mb-4"><a href='{{ url("review/$review->id") }}'><i class="bi bi-arrow-left"></i></a></div>
        <div class="mb-4 product-title">Edit {{ $review->title }}</div>
        <form method="POST" action='{{ url("review/$review->id") }}'>
            {{ csrf_field() }}
            {{ method_field('PUT') }}

            @if(count($errors) > 0)
                <label>Title: </label><input type="text" name="title" value="{{ old('title') }}">
                <span class="alert">{{ $errors->first('title') }}</span>
                <p><label>Rating: </label></p>
                <input type="radio" id="1" name="rating" value="1" {{ (old('rating') == '1') ? 'checked' : '' }}>
                <label for="1">1</label>
                <input type="radio" id="2" name="rating" value="2" {{ (old('rating') == '2') ? 'checked' : '' }}>
                <label for="2">2</label>
                <input type="radio" id="3" name="rating" value="3" {{ (old('rating') == '3') ? 'checked' : '' }}>
                <label for="3">3</label>
                <input type="radio" id="4" name="rating" value="4" {{ (old('rating') == '4') ? 'checked' : '' }}>
                <label for="4">4</label>
                <input type="radio" id="5" name="rating" value="5" {{ (old('rating') == '5') ? 'checked' : '' }}>
                <label for="5">5</label>
                <span class="alert">{{ $errors->first('rating') }}</span>
                <p><label>Review: </label><input type="text" name="review" value="{{ old('review') }}">
                <span class="alert">{{ $errors->first('review') }}</span></p>
                <input type="hidden" name="product_id" value="{{ $review->product_id }}"></p>
                <input type="hidden" name="user_id" value="{{ $review->user_id }}"></p>
                <input type="submit" value="Update">
            @else
                <label>Title: </label><input type="text" name="title" value="{{ $review->title }}">
                <p><label>Rating: </label></p>
                <input type="radio" id="1" name="rating" value="1" {{ ($review->rating == '1') ? 'checked' : '' }}>
                <label for="1">1</label>
                <input type="radio" id="2" name="rating" value="2" {{ ($review->rating == '2') ? 'checked' : '' }}>
                <label for="2">2</label>
                <input type="radio" id="3" name="rating" value="3" {{ ($review->rating == '3') ? 'checked' : '' }}>
                <label for="3">3</label>
                <input type="radio" id="4" name="rating" value="4" {{ ($review->rating == '4') ? 'checked' : '' }}>
                <label for="4">4</label>
                <input type="radio" id="5" name="rating" value="5" {{ ($review->rating == '5') ? 'checked' : '' }}>
                <label for="5">5</label>
                <p><label>Review: </label><input type="text" name="review" value="{{ $review->review }}">
                <input type="hidden" name="product_id" value="{{ $review->product_id }}"></p>
                <input type="hidden" name="user_id" value="{{ $review->user_id }}"></p>
                <input class="btn btn-dark" type="submit" value="Update">
            @endif
        </form>
    </div>
@endsection