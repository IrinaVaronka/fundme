<?php

namespace App\Http\Controllers;


use App\Models\Hashtag;
use Illuminate\Http\Request;

class HashtagController extends Controller
{
    
    public function index()
    {
        $hashtags = Hashtag::all();

        return view('back.hashtags.index', [
            'hashtags' => $hashtags
        ]);
    }

    
    public function create()
    {
        return view('back.hashtags.create', [
        ]);
    }

    
    public function store(Request $request)
    {
        Hashtag::create([
            'title' => $request->title,
            
        ]);

        return redirect()->route('hashtags-index');
    }

    
    public function show(Hashtag $hashtag)
    {
        //
    }

    
    public function edit(Hashtag $hashtag)
    {
        //
    }

    
    public function update(Request $request, Hashtag $hashtag)
    {
        //
    }

    
    public function destroy(Hashtag $hashtag)
    {
        //
    }
}
