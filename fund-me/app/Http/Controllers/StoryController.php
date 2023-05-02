<?php

namespace App\Http\Controllers;


use App\Models\Story;

class StoryController extends Controller
{
    
    public function index()
    {
        $stories = Story::all();

        return view('back.stories.index', [
            'stories' => $stories
        ]);
    }

    
    public function create()
    {
        return view('back.stories.create', [
        ]);
    }

    
    public function store(Request $request)
    {
        //
    }

    
    public function show(Story $story)
    {
        return view('stories.show', [
            'story' => $story
        ]);
    }

   
    public function edit(Story $story)
    {
        //
    }

    
    public function update(Request $request, Story $story)
    {
        //
    }

    
    public function destroy(Story $story)
    {
        //
    }
}
