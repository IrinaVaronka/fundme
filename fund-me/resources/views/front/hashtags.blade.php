@inject('hashtags', App\Services\HashtagsService::class)
<div class="card mt-5">
    <div class="card-header">
        <h2>Hashtags</h2>
    </div>
    <div class="card-body">
        <ul class="list-group">
            <div class="cat-line">
                <a href="{{route('front-index')}}">All hashtags</a>
            </div>
            @forelse($hashtags->get() as $hashtag)
            <div class="hashtag-line">
                <a href="{{route('front-cat-colors', $hashtag)}}">{{$hashtag->title}}</a>
            </div>
            @empty
            <li class="list-group-item">
                <div class="cat-line">No hashtags</div>
            </li>
            @endforelse
        </ul>
    </div>
</div>
