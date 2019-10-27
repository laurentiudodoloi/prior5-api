<?php

namespace App\Eloquent;

class UserSetting extends Model
{
    protected $fillable = [
        'user_id',
        'photo_url',
        'current_day',
        'points',
    ];
}
