<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tickets extends Model
{
    use HasFactory;

    protected $table = "tickets";
    protected $fillable = [
        'movie_id',
        'user_id',
        'no_of_seats',
        'movie_seats',
        'total_bill',
        'show_id',
    ];
}
