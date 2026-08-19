<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LandingSetting extends Model
{
    protected $fillable = [
        'hero_title',
        'hero_description',
        'hero_image',
        'hero_button_text',
        'hero_button_url',

        'about_title',
        'about_description',
        'about_image',
        'about_point_1',
        'about_point_2',
        'about_point_3',

        'vision',
        'mission',

        'stat_members',
        'stat_programs',
        'stat_events',
        'stat_years',

        'address',
        'phone',
        'email',

        'instagram',
        'tiktok',
    ];
}