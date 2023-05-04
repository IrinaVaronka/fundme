<?php

namespace App\Http\Controllers;


use App\Models\Story;
use App\Models\Hashtag;
use Illuminate\Http\Request;

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
        Story::create([
            'title' => $request->title,
            'text' => $request->text,
            'sum' => $request->sum
        ]);

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
        $story->save();
        return redirect()
            ->route('stories-index');
    }

    
    public function destroy(Story $story)
    {
        $story->delete();
        return redirect()->route('stories-index');
    }
}
