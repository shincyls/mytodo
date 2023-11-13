<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthenticateJson
{
    public function handle(Request $request, Closure $next)
    {   

        $token = $request->header('Authorization');
        if (!$token) {
            return response()->json([
                'error' => true,
                'message' => 'Unauthorized No Auth Token'
            ], 401);
        } else {
            
            $response = Http::get('https://oauth2.googleapis.com/tokeninfo', [
                'access_token' => $token,
            ]);

            if ($response->status() === 200) {
                // return $next($request);
                return response()->json([
                    'error' => false,
                    'message' => 'success'
                ], 200);
            } else {
                return response()->json([
                    'error' => true,
                    'message' => 'Unauthorized Invalid Auth Token'
                ], 401);
            }

        }
        
    }
}