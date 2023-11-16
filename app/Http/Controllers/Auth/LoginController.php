<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Laravel\Auth\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class LoginController extends Controller
{
    //
    public function apiRedirectToGoogle()
    {
        return Socialite::driver('google')->stateless()->redirect();
    }

    public function apiHandleGoogleCallback()
    {   
        $user = Socialite::driver('google')->stateless()->user();
        $accessToken = $user->token;
        $id = $user->id;
        $name = $user->name;
        $email = $user->email;
        $new = false;

        $getUser = User::where('google_id', $user->id)->first();
        if ($getUser==null) {
            $newUser = new User();
            $newUser->name = $user->name;
            $newUser->email = $user->email;
            $newUser->google_id = $user->id;
            $newUser->password = "12345678"; // Not null just for placeholder
            $newUser->save();
            $new = true;
        } 
        $token = $getUser->createToken('Token')->accessToken;
        
        // Return token allowed to copy
        return response()->json([
            'id'=> $id,
            'name'=> $name,
            'email'=> $email,
            'new'=> $new,
            'access_token' => $accessToken
        ]);

    }

    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {   
        try {
            $user = Socialite::driver('google')->user();
            $getUser = User::where('google_id', $user->id)->first();
            if ( $getUser ) {
                Auth::login($getUser);
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
