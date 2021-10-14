@extends('layouts.master')

@section('title')
  Review {{ $product->manufacturer->name }} {{ $product->name }}
@endsection


@section('content')
    <div class="mt-4 mb-4"><a href='{{ url("product/$product->id") }}'><i class="bi bi-arrow-left"></i></a></div>    
    <h1>Review {{ $product->manufacturer->name }} {{ $product->name }}</h1>
    @if(count($errors) > 0)
        <div class="alert">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action='{{ url("review") }}'>
        {{ csrf_field() }}
        <p><label>Title: </label><input type="text" name="title" value="{{ old('title') }}"></p>
        <p><label>Rating: </label><input type="text" name="rating" value="{{ old('rating') }}"></p>
        <p><label>Review: </label><input type="text" name="review" value="{{ old('review') }}"></p>
        <input type="hidden" name="product_id" value="{{ $product->id }}"></p>
        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}"></p>
        <input class="btn btn-dark mt-4 mb-4" type="submit" value="Create">
    </form>
@endsection