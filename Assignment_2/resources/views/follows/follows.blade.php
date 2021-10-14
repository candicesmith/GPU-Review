@extends('layouts.master')

@section('title')
  Followed Reviewers
@endsection

@section('content')
    <div class="mt-4 mb-4">
        <div class="product-title ml-4 mt-4 mb-4">Followed Reviewers</div>
        @if(count($follows) == 0)
            <div class="ml-4 mt-2">You have not followed any users yet.</div>
        @else 
            <div class="ml-4 mt-2">You have followed these users. Click on their name to see their reviews.</div>
        @endif
        <div class="ml-4">
                @foreach($follows as $follow)
                    @foreach($users as $user)
                        @if($user->id == $follow->reviewer_id)
                            <a href='{{ url("follow/$follow->id") }}'>
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
                                    </div>
                                </div>
                            </a>
                        @endif
                    @endforeach
                @endforeach
            </div>
        </div>
    </div>
@endsection