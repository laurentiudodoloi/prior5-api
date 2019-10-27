<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $userId = $request->input('user_id');

        if ($userId) {
            $user = User::query()
                ->with([
                    'settings',
                    'stats',
                    'tasks',
                ])
                ->find($userId);
        } else {
            $email = $request->input('email');
            $password = $request->input('password');

            if (!$email || !$password) {
                return response()->json(false);
            }

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
