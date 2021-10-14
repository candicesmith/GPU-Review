@extends('layouts.master')

@section('title')
  {{$product->name}}
@endsection


@section('content')        
    <div class="mt-4 mb-2"><a href='{{ url("product") }}'><i class="bi bi-arrow-left"></i></a></div>
    <div class="ml-4 mb-4 mr-4">
        <!-- Product Details -->
        <div class="mb-4">
            <div class="row">
                <!-- Product URL --> 
                <div class="product-title mb-3 ml-3"><a href="{{ $product->url }}">{{ $product->manufacturer->name }} {{ $product->name }}</a></div>
            </div>

            <!-- Product Image, Description and Price -->
            <div class="row">
                <div class="col-md-2 ml-4 product-image">
                    <img src="{{ url($product->image) }}" width="250" height="250">
                </div>          
                <div class="mt-4 pt-4 mb-3 col-md-7 product-description">{{ $product->description }}</div>
                <div class="mb-3 col-md-2 product-price">
                    <!-- Buttons -->
                    @auth
                        @if(Auth::user()->user_type == "Moderator")
                            <div class="d-flex float-right">
                                <div class="ml-3 mr-3">
                                    <a href='{{ url("product/$product->id/edit") }}'>
                                        <button class="btn btn-success"><i class="bi bi-pencil-square"></i> Edit</button>
                                    </a>
                                </div>
                                <div class="mb-4">
                                    <form method="POST" action='{{ url("product/$product->id") }}'>
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                        <button class="btn btn-danger" type="submit" value="Delete"><i class="bi bi-x-square"></i> Delete</button>
                                    </form>
                                </div>
                            </div>
                        @endif
                    @endauth
                    <h1>${{ $product->price }}</h1>
                </div>
            </div>

            <!-- Details Table -->
            <table class="table table-striped table-bordered">
                <tr>
                    <th>Manufacturer</th>
                    <td>{{ $product->manufacturer->name }}</td>
                </tr>
                <tr>
                    <th>Chipset</th>
                    <td>{{ $product->chipset }}</td>
                </tr>
                <tr>
                    <th>VRAM</th>
                    <td>{{ $product->vram }}</td>
                </tr>
            </table>
        </div>


        <!-- Horizontal Line -->
        <hr class="mb-4 mt-4">


        <!-- Review Form -->
        @auth
            <div class="product-title">Review Product</div>
            <form method="POST" action='{{ url("review") }}'>
                {{ csrf_field() }}
                {{ method_field('POST') }}
                <label>Title: </label>
                <input type="text" name="title" value="{{ old('title') }}">
                @if($errors->first('title'))
                    <span class="alert">{{ $errors->first('title') }}</span>
                @endif

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
                @if($errors->first('rating'))
                    <span class="alert">{{ $errors->first('rating') }}</span>
                @endif

                <p>
                    <label>Review: </label>
                    <input type="text" name="review" value="{{ old('review') }}">
                    @if($errors->first('review'))
                        <span class="alert">{{ $errors->first('review') }}</span>
                    @endif
                </p>

                <input type="hidden" name="product_id" value="{{ $product->id }}">
                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                @if($errors->first('user_id'))
                    <span class="alert">You can only post one review per item</span>
                @endif

                <input class="btn btn-success mt-2" type="submit" value="Review">
            </form>
        @endauth


        <!-- Horizontal Line -->
        <hr class="mb-4 mt-4">


        <!-- Product Reviews -->
        <div class="mb-4 mt-4">   
            @if(count($reviews) > 0)
                <div class="product-title">User Reviews</div>
                @if($errors->first('user_id_like'))
                    <div class="alert">You cannot vote for a review more than once.</div>
                @endif
                @if($errors->first('review_id_like'))
                <div class="alert">You cannot vote for a review more than once.</div>
                @endif
                @foreach($reviews as $review) 
                    <div class="mt-3 mb-3">
                        @if($review->likes > $review->dislikes)
                            <div class="popular-review card">
                        @elseif($review->likes < $review->dislikes)
                            <div class="unpopular-review card">
                        @else
                            <div class="review card">
                        @endif
                        <div style="display:none;">{{ $review->id }}</div>
                        <div class="row mt-3">  
                            <div class="col-md-10 product-title ml-4 mb-3"><a href='{{ url("review/$review->id") }}'>{{ $review->title }}</a></div> 
                            <div class="col-md-1">
                                <div class="row">  
                                    @auth
                                        @if($review->user_id != Auth::user()->id)
                                            <form method="POST" action='{{ url("like") }}'>
                                                {{ csrf_field() }}
                                                {{ method_field('POST') }}
                                                <input type="hidden" name="user_id_like" value="{{ Auth::user()->id }}">
                                                <input type="hidden" name="review_id_like" value="{{ $review->id }}">
                                                <input type="hidden" name="value" value="like">
                                                <button class="btn" type="submit" value=""><i class="bi bi-hand-thumbs-up"></i></button>
                                                
                                            </form>
                                            <form method="POST" action='{{ url("like") }}'>
                                                {{ csrf_field() }}
                                                {{ method_field('POST') }}
                                                <input type="hidden" name="user_id_like" value="{{ Auth::user()->id }}">
                                                <input type="hidden" name="review_id_like" value="{{ $review->id }}">
                                                <input type="hidden" name="value" value="dislike">
                                                <button class="btn" type="submit" value=""><i class="bi bi-hand-thumbs-down"></i></button>
                                            </form>
                                        @endif
                                    @endauth
                                </div>
                            </div>
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
                                @foreach($users as $user)
                                    @if($user->id == $review->user_id)
                                        User: {{ $user->name }}
                                    @endif
                                @endforeach
                            </div>
                            @auth
                                @if($review->user_id != Auth::user()->id)
                                    <form method="POST" action='{{ url("follow") }}'>
                                        {{ csrf_field() }}
                                        {{ method_field('POST') }}
                                        <input type="hidden" name="follower_id" value="{{ Auth::user()->id }}">
                                        <input type="hidden" name="reviewer_id" value="{{ $review->user_id }}">
                                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                                        <button class="btn" type="submit" value="">
                                            <i class="bi bi-person-plus"></i>
                                        </button>
                                    </form>
                                    <form method="POST" action='{{ url("follow/delete") }}'>
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                        <input type="hidden" name="follower_id" value="{{ Auth::user()->id }}">
                                        <input type="hidden" name="reviewer_id" value="{{ $review->user_id }}">
                                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                                        <button class="btn" type="submit" value="">
                                            <i class="bi bi-person-x"></i>
                                        </button>
                                    </form>
                                @endif
                            @endauth
                        </div>
                    </div>
                @endforeach
            @else
                <div class="product-title-list">No reviews yet. Be the first to review this product.</div>
            @endif 
        </div>


        <!-- Pagination -->
        @if(count($reviews) > 0)
            <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-center">
                    @if($prev_page < 1)
                        <li class="page-item disabled">
                            <a class="page-link">Previous</a>
                        </li>
                    @else
                        <li class="page-item">
                            <a class="page-link" href='{{ url("product/$product->id/$prev_page") }}'>Previous</a>
                        </li>
                    @endif

                    @for($page=1; $page <= $total_pages; $page++)
                        @if($page == $curr_page)
                            <li class="page-item disabled"><a class="page-link">{{ $page }}</a></li>
                        @else
                            <li class="page-item"><a class="page-link" href='{{ url("product/$product->id/$page") }}'>{{ $page }}</a></li>
                        @endif
                    @endfor

                    @if($next_page > $total_pages)
                        <li class="page-item disabled">
                            <a class="page-link">Next</a>
                        </li>
                    @else
                        <li class="page-item">
                            <a class="page-link" href='{{ url("product/$product->id/$next_page") }}'>Next</a>
                        </li>
                    @endif
                </ul>
            </nav>
        @endif

    </div>
@endsection