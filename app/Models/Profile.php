<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = [
        'career_objective',
        'who_i_am',
        'learning_journey',
        'location',
        'email',
        'phone',
        'education_short',
        'photo_hero',
        'photo_about',
        'photo_sidebar',
        'views',
    ];
}
