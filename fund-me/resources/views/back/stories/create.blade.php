@extends('layouts.app')

@section('content')
<div class="form-body">
    <div class="row">
        <div class="form-holder">
            <div class="form-content">
                <div class="form-items">
                    <h3>Add a new story</h3>
                    <p>Fill in the data below</p>
                    <form action="{{route('stories-store')}}" method="post" enctype="multipart/form-data">
                        <div class="col-md-12">
                            <input class="form-control" type="text" name="title" placeholder="Title" value={{old('title')}}>
                        </div>

                        <div class="col-md-12 form-floating">
                            <textarea class="form-control" name="text" placeholder="Write your story" value={{old('text')}} id="floatingTextarea2" style="height: 150px"></textarea>
                            <label for="floatingTextarea2">Your story</label>
                        </div>


                        <div class="col-md-12">
                            <input class="form-control" type="text" name="sum" placeholder="Sum you need" value={{old('sum')}}>
                        </div>
                        <div class="col-md-12">
                            <input type="hidden" class="form-control" type="text" name="donate" placeholder="initial sum" value="0">
                        </div>

                        <div class="col-md-12">
                            <label class="form-label">Main photo</label>
                            <input type="file" class="form-control" name="photo">
                            
                        </div> 


                        <div class="form-button mt-3">
                            <button id="submit" type="submit" class="btn btn-primary">Add story</button>
                            @csrf
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
