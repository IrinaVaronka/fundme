<div class="tags --tags" data-url="">
    @foreach($story->tags as $tag)
    <div class="tag --tag" data-id="{{$tag->id}}">{{$tag->title}}<i></i></div>
    @endforeach
    <div class="add --add">
        <input type="text" class="--add--new" data-url="{{route('stories-tags-list')}}">
        <button type="button" class="btn btn-info --new" data-url="{{route('stories-add-new-tag', $story)}}">add</button>
        <div class="list --tags--list" data-url="{{route('stories-add-tag', $story)}}">
        </div>
    </div>
</div>
