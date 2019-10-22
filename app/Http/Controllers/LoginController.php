<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $photoUrl = $request->input('image');

        if ($photoUrl) {
            $user = User::query()
                ->with([
                    'settings',
                    'stats',
                    'tasks',
                ])
                ->where('photo_url', $photoUrl)
                ->first();
        } else {
            $email = $request->input('email');
            $password = $request->input('password');

            $user = User::query()
                ->with([
                    'settings',
                    'stats',
                    'tasks',
                ])
                ->where('email', $email)
                ->where('password', $password)
                ->first();
        }

        if (! $user) {
            return response()->json(false);
        }

        return response()->json([
            'user' => $user
        ]);
    }
}
