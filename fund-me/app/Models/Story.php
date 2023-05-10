<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Story extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'text', 'sum', 'donate'];


    public function hashtag()
    {
        return $this->hasMany(Hashtag::class);
    }
}
