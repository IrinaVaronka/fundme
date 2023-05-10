<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Story;

class FrontController extends Controller
{
    public function index()
    {
         $stories = Story::all();

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

    
}
