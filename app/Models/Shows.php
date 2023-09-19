<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shows extends Model
{
    use HasFactory;

    protected $table = "shows";
    protected $fillable = [
        'movie_id',
        'movie_seats',
        'show_day',
        'movie_time',
    ];
}