<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class SocialiteController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver("google")->redirect();
    }
    public function handleGoogleCallback()
    {
        try {
            $user = Socialite::driver("google")->user();
            $finduser = User::where('social_id', $user->id)->first();
            if ($finduser) {
                Auth::login($finduser);
                return redirect()->route('home');
            } else {
                $newuser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'social_id' => $user->id,
                    'social_type' => 'google',
                    'password' => encrypt('my-google'),
                ]);

                Auth::login($newuser);
                return redirect()->route('home');
            }


        } catch (\Throwable $th) {
            dd($th->getMessage());
        }
    }
}
