@extends('layouts.app')

@section('content')
<div class="form-body">
    <div class="row">
        <div class="form-holder">
            <div class="form-content">
                <div class="form-items">
                    <h3>Edit the story</h3>
                    <p>Fill in the data below</p>
                    <form action="{{route('stories-update', $story)}}" method="post">
                        <div class="col-md-12">
                            <input class="form-control" type="text" name="title" placeholder="Title" value={{old('title', $story->title)}}>
                        </div>

                        <div class="col-md-12 form-floating">
                            <textarea class="form-control" name="text" type="text" placeholder="Write your story" value={{old('text', $story->text)}} id="floatingTextarea2" style="height: 150px"></textarea>
                            <label for="floatingTextarea2">Your story</label>
                        </div>


                        <div class="col-md-12">
                            <input class="form-control" type="text" name="sum" placeholder="Sum you need" value={{old('sum', $story->sum)}}>
                        </div>


                        <div class="form-button mt-3">
                            <button id="submit" type="submit" class="btn btn-primary">Update story</button>
                            @csrf
                            @method('put')
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
