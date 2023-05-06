@extends('layouts.app')

@section('content')

<form class="mt-4">
    <h1 class="text-center">All hashtags</h1>

    <form action="{{route('hashtags-index')}}" method="get" class="mt-4">


    </form>
    <div class="container">
        <div class="row">
            @forelse($hashtags as $hashtag)
            <ul class="list-group">
                <li class="list-group-item">{{ $hashtag->title }}</li>
            </ul>
                    <form action="{{route('hashtags-delete', $hashtag)}}" method="post">
                        <button type="submit" class="btn btn-outline-danger">delete</button>
                        @csrf
                        @method('delete')
                    </form>
                </div>
            </div>
            @empty
            <ul class="list-group">


                <div class="empty">No hashtags yet</div>
            </ul>
            
            @endforelse
            </ul>

        </div>
    </div>
    @endsection
