@extends('layouts.front')

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
                        <img src="..." class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{ $story->title }}</h5>
                            <p class="card-text">{{ $story->sum }}</p>
                            {{-- @foreach($story->hastag as $hashtag)
                        <div class="hashtag">
                            {{$hashtag->title}}
                        </div>
                        @endforeach --}}
                        <a href="{{route('stories-show', $story)}}" class="btn btn-primary">Read story</a>
                        <div class="buy">
                            <span>Donation goal: {{$story->sum}} EUR</span>
                            <section class="--add--to--cart" data-url="#">
                                <input type="hidden" name="id" value={{$story->id}}>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" placeholder="Yout donation" aria-label="Your donation" aria-describedby="button-addon2">
                                    <button class="btn btn-success" type="button" id="button-addon2">Donate now</button>
                                </div>
                            </section>
                        </div>
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
