<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Story extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'text', 'sum', 'donate', 'photo', 'rate', 'rates'];
    protected $casts = [
        'rates' => 'array',
    ];

    public function hashtag()
    {
        return $this->hasMany(Hashtag::class);
    }

    public function history() 
    {
         return $this->hasMany(History::class);
    }

    public function gallery() 
    {
         return $this->hasMany(Photo::class, 'story_id', 'id');
    }

    public function storyTag()
    {
        return $this->hasMany(storyTag::class);
    }
}
