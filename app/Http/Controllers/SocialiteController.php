<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class SocialiteController extends Controller
{
    // Github Login Controllers

    public function github_redirect()
    {
        return Socialite::driver('github')->redirect();
    }

    public function github_callback()
    {

        $user = Socialite::driver('github')->user();

        $user = User::updateOrCreate(['email' => $user->email],

            [
                'name' => $user->name,
                'password' => 'password',
                'role' => 'seller',
                'github_users_id' => $user->id,
            ]);

        Auth::login($user);

        return redirect('/')->with('github_login', 'Login With GitHub Successfully');
    }

    // Google Login Controllers

    public function google_redirect()
    {
        return Socialite::driver('google')->redirect();
    }

    public function google_callback()
    {

        $user = Socialite::driver('google')->user();

        $user = User::updateOrCreate(['email' => $user->email],

            ['name' => $user->name,
                'password' => 'password',
                'role' => 'seller',
                'google_users_id' => $user->id,
            ]);

        Auth::login($user);

        return redirect('/')->with('google_login', 'Login With Google Successfully');
    }
}
