@extends('layouts.app')

@section('content')

<h1 class="text-center">{{$story->title}} </h1>

<div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="..." class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="..." class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="..." class="d-block w-100" alt="...">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>

<div class="card-body">
    <p class="card text-center story">{{$story->text}}</p>
  </div> 
  <div class="buy-front">
                            <span>Donation goal: {{$story->sum}} EUR</span>
                            <p class="card-text">left to raise money: {{$story->sum-$story->donate}} USD</p>
                            
                        </div>  
</div>


@endsection
