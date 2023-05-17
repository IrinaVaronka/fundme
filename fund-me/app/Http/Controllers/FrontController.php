<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Story;

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

         });

        
        return view('front.index', [
            'stories' => $stories
        ]);
    }

    public function showStory(Story $story)
    {
        return view('front.story', [
            'story' => $story,
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
