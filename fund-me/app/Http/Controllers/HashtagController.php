<?php

namespace App\Http\Controllers;


use App\Models\Hashtag;

use Illuminate\Http\Request;

class HashtagController extends Controller
{
    
    public function index()
    {
        //
    }

    
    public function create()
    {
        return view('back.hashtags.create', [
        ]);
    }

    
    public function store(Request $request)
    {
        //
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
