<?php

namespace App\Http\Controllers;


use App\Models\Story;
use App\Models\Photo;
use App\Models\Tag;
use App\Models\StoryTag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\ImageManagerStatic as Image;

class StoryController extends Controller
{
    
    public function index(Request $request)
    {
        $stories = Story::all();

        
        $stories->map(function($s) use ($request) {
            if(!$request->user()) {
            $showVoteButton = false;
         } else {
            $rates = collect($s->rates);
            $showVoteButton = $rates->first(fn($r) => $r['userId'] == $request->user()->id) ? false : true;
         }
         $s->showVoteButton = $showVoteButton;


         $tagsId = $s->storyTag->pluck('tag_id')->all();
         $tags = Tag::whereIn('id', $tagsId)->get();
         $s->tags = $tags;

         });

        return view('back.stories.index', [
            'stories' => $stories,
            
        ]);
    }

    public function getTagsList(Request $request)
    {
        $tag = $request->t ?? '';


        if ($tag) {
            $tags = Tag::where('title', 'like', '%'.$tag.'%')
            ->limit(5)
            ->get();
        } else {
            $tags = [];
        }
        
        $html = view('front.tag-search-list')->with(['tags' => $tags])->render();
        
        return response()->json([
            'tags' => $html,
        ]);
    }

    public function addTag(Request $request, Story $story)
    {
        $tagId = $request->tag ?? 0;

        $tag = Tag::find($tagId);

        if (!$tag) {

            return response()->json([
                'message' => 'Invalid tag id',
                'status' => 'error'
            ]);  
        }

        $tagsId = $story->storyTag->pluck('tag_id')->all();

        if(in_array($tagId, $tagsId)) {
            return response()->json([
                'message' => 'Tag exists',
                'status' => 'error'
            ]);
        }

        StoryTag::create([
            'tag_id' => $tagId,
            'story_id' => $story->id
        ]);


        return response()->json([
            'message' => 'Tag added',
            'status' => 'ok', 
            'tag' => $tag->title
        ]);

    }


    
    public function create()
    {
        return view('back.stories.create', [
        ]);
    }

    
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|min:3|max:100',
            'text' => 'required|min:3|max:1000',
            'donate' => 'required|integer|max:100000',
            'sum' => 'required|integer|min:1|max:100000',
            'photo' => 'sometimes|required|image|max:512',
            'gallery.*' => 'sometimes|required|image|max:512'
        ]);

        if ($validator->fails()) {
            $request->flash();
            return redirect()
                ->back()
                ->withErrors($validator);
        }
        
        $photo = $request->photo;
        if ($photo) {
            //Image::configure(['driver' => 'imagick']);
            

        $name = $photo->getClientOriginalName();
        $name = rand(1000000, 9000000) . '-' . $name;
        $path = public_path() . '/stories-photo/';
        $photo->move($path, $name);

        $img = Image::make($path . $name);
        $img->resize(300, 200);
        $img->save($path . 't_' . $name, 90);

        }
        $id = Story::create([
            'title' => $request->title,
            'text' => $request->text,
            'sum' => $request->sum,
            'donate' => $request->donate,
            'photo' => $name ?? null
        ])->id;

        foreach ($request->gallery ?? [] as $gallery) {
            $name = $gallery->getClientOriginalName();
            $name = rand(1000000, 9000000) . '-' . $name;
            $path = public_path() . '/stories-photo/';
            $gallery->move($path, $name); 
            Photo::create([
                
                'story_id' => $id,
                'photo' => $name
            ]);
        }


        return redirect()->route('stories-index');
    }

    
    public function show(Story $story)
    {
        return view('back.stories.show', [
            'story' => $story
        ]);
    }

   
    public function edit(Story $story)
    {
        return view('back.stories.edit', [
            'story' => $story
        ]);
    }

    
    public function update(Request $request, Story $story)
    {
        $story->title = $request->title;
        $story->text = $request->text;
        $story->sum = $request->sum;
        $story->donate = $request->donate;
        $story->save();
        return redirect()
            ->route('stories-index');
    }


    public function editsum(Story $story)
    {
        return view('accounts.edit', [
            'donate' => $donate
        ]);
    }

    
    public function updatesum(Request $request, Story $story)
    {

        if(!$request->type) {
            $story->donate = $story->donate + $request->donate;
            $story->save();
        
            return redirect()
            ->route('stories-index')
            ->with('info', 'Funds was added');  
     
        }
    }

    
    public function destroy(Story $story)
    {
        if ($story->gallery->count()) {
            foreach ($story->gallery as $gal) {
                $photo = public_path() . '/stories-photo/' . $gal->photo;
                unlink($photo);  
                $gal->delete();
            }
        }
        
        if($story->photo) {
            $photo = public_path() . '/stories-photo/' . $story->photo;
            unlink($photo);
        }

        $story->delete();
        return redirect()->route('stories-index');
    }


}
