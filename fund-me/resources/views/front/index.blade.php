@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">

        <div class="col-3">
            @include('front.hashtags')
        </div>



        <form class="mt-4">
            <h1 class="text-center">All stories</h1>

            <div class="container">
                <div class="row">
                    @forelse($stories as $story)
                    <div class="card" style="width: 18rem;">
                        @if($story->photo)
                <img src="{{asset('/stories-photo') . '/t_'. $story->photo}}" class="card-img-top">
                @else
                <img src="{{asset('/stories-photo') . '/no-image.png'}}" class="card-img-top">
                @endif
                        <div class="card-body">
                            <h5 class="card-title">{{ $story->title }}</h5>
                            @include('front.hearts')
                            <p class="card-text">{{ $story->donate }} USD raised of {{ $story->sum }} USD goal</p>
                            <p class="card-text">left to raise money: {{$story->sum-$story->donate}} USD</p>
                            
                        <a href="{{route('front-show-story', $story)}}" class="btn btn-primary">Read story</a>
                    </div>
                </div>
                @empty
                <div class="card" style="width: 18rem;">


                    <div class="empty">No stories yet</div>

                </div>
                @endforelse
                </ul>

            </div>
    </div>
    @endsection
