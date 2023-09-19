<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $table = "movie_review";
    protected $fillable = [
        'movie_id',
        'user_id',
        'movie_review',
    ];
}
