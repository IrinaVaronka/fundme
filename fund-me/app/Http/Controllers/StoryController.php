<?php

namespace App\Http\Controllers;


use App\Models\Story;
use App\Models\Hashtag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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
        $validator = Validator::make($request->all(), [
            'title' => 'required|min:3|max:100',
            'text' => 'required|min:3|max:1000',
            'donate' => 'required|integer|min:1|max:100000',
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
            

        $name = $photo->getClientOriginalName();

        $name = rand(1000000, 9000000) . '-' . $name;

        $path = public_path() . '/stories-photo';

        $photo->move($path, $name);

        }

       

        Story::create([
            'title' => $request->title,
            'text' => $request->text,
            'sum' => $request->sum,
            'donate' => $request->donate,
            'photo' => $name ?? null
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
        if($story->photo) {
            $photo = public_path() . '/stories-photo/' . $story->photo;
            unlink($photo);
        }

        $story->delete();
        return redirect()->route('stories-index');
    }
}
