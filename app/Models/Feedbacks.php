<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedbacks extends Model
{
    use HasFactory;

    protected $table = "feedbacks";
    protected $fillable = [
        'user_id',
        'user_name',
        'user_email',
        'user_feedback',
    ];
}