<?php

namespace App\Eloquent;

class Task extends Model
{
    protected $fillable = [
        'user_id',
        'description',
        'order',
        'completed',
    ];
}
