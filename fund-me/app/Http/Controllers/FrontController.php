<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Story;
use App\Models\Photo;
use App\Models\Tag;

class FrontController extends Controller
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

        
        return view('front.index', [
            'stories' => $stories
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

    public function addTag(Request $request, Tag $tag)
    {

    }


    public function showStory(Story $story)
    {
        $photos = Photo::all();
        
        return view('front.story', [
            'story' => $story,
            'photos' => $photos
            
        ]);
    }

    public function histories(Request $request) 
    {
        // dump($request->story());
    }

    public function vote(Request $request, Story $story)
    {
        if ($request->user()) {
            $userId = $request->user()->id;
            $rates = collect($story->rates);

            if(!$rates->first(fn($r) => $r['userId'] == $userId) && $request->heart) {
                $hearts = strlen($request->heart);
                $userRate = [
                    'userId' => $userId,
                    'rate' => $hearts
                ];
                $rates->add($userRate);
                $rate = $rates->sum('rate');


                $story->update([
                    'rate' => $rate,
                    'rates' => $rates,
                ]); 
            }

            return redirect()->back();
        }
        
    }


}
