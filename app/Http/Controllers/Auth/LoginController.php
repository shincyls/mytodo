<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Socialite;
use Illuminate\Support\Facades\Cookie;

class LoginController extends Controller
{
    //
    public function apiRedirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function apiHandleGoogleCallback()
    {   
        $user = Socialite::driver('google')->user();
        $existingUser = User::where('email', $user->email)->first();
        if ($existingUser) {
            // Login if user exists
            Auth::login($existingUser);
        } else {
            // Create a new user
            $newUser = new User();
            $newUser->name = $user->name;
            $newUser->email = $user->email;
            $newUser->google_id = $user->id;
            $newUser->save();
            Auth::login($newUser);
        }
    }

    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {   
        try {
            $user = Socialite::driver('google')->user();
            $finduser = User::where('google_id', $user->id)->first();
            if ( $finduser ) {
                Auth::login($finduser);
                return redirect()->intended('/');
            } else {
                return redirect()->intended('/');
            }
        } catch (Exception $e) {
            dd($e->getMessage());
        }
        return redirect('/'); // Redirect to the desired page after authentication.
    }
}
