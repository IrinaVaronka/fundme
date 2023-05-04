@extends('layouts.app')

@section('content')
<div class="form-body">
    <div class="row">
        <div class="form-holder">
            <div class="form-content">
                <div class="form-items">
                    <h3>Add new hashtag</h3>
                    <form action="{{route('hashtags-store')}}" method="post">
                        <div class="col-md-12">
                            <input class="form-control" type="text" name="title" placeholder="Title" value={{old('title')}}>
                        </div>

                        <div class="form-button mt-3">
                            <button id="submit" type="submit" class="btn btn-primary">Add hashtag</button>
                            @csrf
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
