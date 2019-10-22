<?php

namespace App;

use App\Eloquent\Task;
use App\Eloquent\UserSetting;
use App\Eloquent\UserStat;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function settings()
    {
        $this->hasMany(UserSetting::class, 'user_id');
    }

    public function stats()
    {
        $this->hasMany(UserStat::class, 'user_id');
    }

    public function tasks()
    {
        $this->hasMany(Task::class, 'user_id');
    }
}
