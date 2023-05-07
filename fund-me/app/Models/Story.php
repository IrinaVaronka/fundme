<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Story extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'text', 'sum', 'hashtag_id'];


    public function hashtag()
    {
        return $this->hasMany(Hashtag::class);
    }
}
