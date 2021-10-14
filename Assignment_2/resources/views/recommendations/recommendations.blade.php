@extends('layouts.master')

@section('title')
  Recommended Reviewers
@endsection

@section('content')
    <div class="mt-4 mb-4">
        @auth
            <div class="mr-0 ml-4 product-title">
                Recommended Reviewers
            </div>
        @endauth
        <div class="ml-4">
            @if(count($users) > 0)
                <div class="mt-2">These users have posted useful reviews.</div>
            @else 
                <div class="mt-2">No recommendations yet.</div>
            @endif
            @foreach($users as $user)
                @if($user->id != Auth::user()->id)
                    <div class="mt-4 mr-4 card">
                        <div class="row mt-3">
                            <div class="col-md-2 ml-4">
                                <div class="product-title mr-3 ml-3 mb-3">
                                    {{ $user->name }}
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="product-title-list mt-2 mr-3 mb-2">
                                    {{ $user->user_type }}
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="row">
                                    <form method="POST" action='{{ url("follow") }}'>
                                        {{ csrf_field() }}
                                        {{ method_field('POST') }}
                                        <input type="hidden" name="follower_id" value="{{ Auth::user()->id }}">
                                        <input type="hidden" name="reviewer_id" value="{{ $user->id }}">
                                        <input type="hidden" name="product_id" value="0">
                                        <button class="btn" type="submit" value="">
                                            <i class="bi bi-person-plus"></i>
                                        </button>
                                    </form>
                                
                                    <form method="POST" action='{{ url("follow/delete") }}'>
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                        <input type="hidden" name="follower_id" value="{{ Auth::user()->id }}">
                                        <input type="hidden" name="reviewer_id" value="{{ $user->id }}">
                                        <input type="hidden" name="product_id" value="0">
                                        <button class="btn" type="submit" value="">
                                            <i class="bi bi-person-x"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
@endsection