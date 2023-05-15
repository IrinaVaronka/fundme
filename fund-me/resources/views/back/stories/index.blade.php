@extends('layouts.app')

@section('content')

<form class="mt-4">
    <h1 class="text-center">All stories</h1>

    <form action="{{route('stories-index')}}" method="get" class="mt-4">
    </form>

    <div class="container">
        <div class="row">
            @forelse($stories as $story)
            <div class="card photo" style="width: 18rem;">
            @if($story->photo)
                <img src="{{asset('/stories-photo') . '/t_'. $story->photo}}" class="card-img-top">
                @else
                <img src="{{asset('/stories-photo') . '/no-image.png'}}" class="card-img-top">
                @endif
           
                <div class="card-body">
                    <h5 class="card-title">{{ $story->title }}</h5>
                    <p class="card-text">{{ $story->donate }} raised of {{ $story->sum }} goal</p>
                    <p class="card-text">left to raise money: {{$story->sum-$story->donate}} USD</p>
                <a href="{{route('stories-show', $story)}}" class="btn btn-primary">Read story</a>
                @if(Auth::user()->role < 5) 
                <form action="{{route('stories-delete', $story)}}" method="post">
                    <button type="submit" class="btn btn-outline-danger">delete</button>
                    @csrf
                    @method('delete')
                </form>
                @endif
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
