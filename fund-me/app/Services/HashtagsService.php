<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use App\Models\Hashtag;


class HashtagsService
{
    public function get()
    {
        return Hashtag::all();
    }
}