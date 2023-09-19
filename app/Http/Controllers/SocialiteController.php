<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class SocialiteController extends Controller
{
    public function github_redirect(){
        return Socialite::driver('github')->redirect();
    }

    public function github_callback(){

        $user = Socialite::driver('github')->user();

        $user = User::updateOrCreate(['email' => $user->email,],

            ['name' => $user->name,
            'password' => 'password',
            'role' => 'seller'
        ]);

        Auth::login($user);

        return redirect('/')->with('github_login', 'Login With GitHub Successfully');
    }

}
