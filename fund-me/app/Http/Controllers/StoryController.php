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
            'sum' => $request->sum,
            'donate' => $request->donate
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
        $story->delete();
        return redirect()->route('stories-index');
    }
}
