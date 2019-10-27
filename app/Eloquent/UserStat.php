<?php

namespace App\Eloquent;

class UserStat extends Model
{
    protected $fillable = [
        'user_id',
        'date',
        'completed_tasks',
    ];
}
