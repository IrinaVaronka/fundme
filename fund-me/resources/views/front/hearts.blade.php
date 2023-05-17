<form action="{{route('front-vote', $story)}}" method="post">
<div class="hearts">
@for($i = 1; $i < 2; $i++)
<input name="heart" value="1" type="checkbox" id="_{{$i .'-' .$story->id}}" data-heart="{{$i}}">
<label class="heart" for="_{{$i .'-' .$story->id}}"></label>
@endfor

<div class="result">
@if($story->rate)
{{$story->rate}}
@else($condition)
<span>No likes yet</span>
@endif
</div>
@if($story->showVoteButton)
<button type="submit" class="btn btn-outline-dark">like</button>
@endif
@csrf
@method('put')


</div>
</form>