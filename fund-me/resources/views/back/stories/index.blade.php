@extends('layouts.app')

@section('content')

<form class="mt-4">
    <h1 class="text-center">All stories</h1>

    <form action="{{route('stories-index')}}" method="get" class="mt-4">


    </form>
    <div class="container">
        <div class="row">
            @forelse($stories as $story)
            <div class="card" style="width: 18rem;">
                <img src="..." class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">{{ $story->title }}</h5>
                    <p class="card-text">{{ $story->sum }}</p>
                    <a href="{{route('stories-show', $story)}}" class="btn btn-primary">Read story</a>
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
