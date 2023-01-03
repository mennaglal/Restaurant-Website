<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class chiefs extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'image',
        'facebook_link',
        'twitter_link',
        'instagram_link',
    ];
}
