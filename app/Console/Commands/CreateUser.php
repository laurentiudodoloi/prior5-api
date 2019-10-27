<?php

namespace App\Console\Commands;

use App\Eloquent\UserSetting;
use App\User;
use Illuminate\Console\Command;

class CreateUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:user {email} {password}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Creates a new user.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $user = User::query()
            ->create([
                'first_name' => '',
                'last_name' => '',
                'email' => $this->argument('email'),
                'password' => $this->argument('password'),
            ]);

        UserSetting::query()
            ->create([
                'user_id' => $user->id,
                'photo_url' => '',
                'current_day' => 0,
                'points' => 0,
            ]);
    }
}
