<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Socialite;

class LoginController extends Controller
{
    //
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {   
        // try {
            $user = Socialite::driver('google')->user();
        //     $finduser = User::where('google_id', $user->id)->first();
        //     if ( $finduser ) {
        //         Auth::login($finduser);
        //         return redirect()->intended('/');
        //     } else {
        //         return redirect()->intended('/');
        //     }
        // } catch (Exception $e) {
        //     dd($e->getMessage());
        // }
        return redirect('/'); // Redirect to the desired page after authentication.
    }
}
