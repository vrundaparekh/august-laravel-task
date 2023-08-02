<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movies extends Model
{
    use HasFactory;
    protected $fillable = [
        'movie_name',
        'description',
        'youtube_url',
        'image',
        'release_date',
        'slug'
    ];
}
