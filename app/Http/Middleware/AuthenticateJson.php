<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Http;


class AuthenticateJson
{
    public function handle(Request $request, Closure $next)
    {   
        
        if ($request->isJson()) {
            $data = json_decode($request->getContent());
            $request->merge([$data]);
        }
        
        $authorizationHeader = $request->header('Authorization');
        $token = substr($authorizationHeader, 7);
        if (!$token) {
            // No Token
            return response()->json([
                'error' => true,
                'message' => 'Unauthorized No Token'
            ], 401);
        } else {

            $curl = curl_init();
            curl_setopt_array($curl, array(
                CURLOPT_URL => "https://oauth2.googleapis.com/tokeninfo?access_token=".$token,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_TIMEOUT => 30000,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "GET",
            ));
            $response = curl_exec($curl);
            $res = json_decode($response,true);

            if($res['expires_in']>0){
                // Add User Information
                $request->merge(['created_by' => $res['email']]);
                return $next($request);
            } else {
                return response()->json([
                    'error' => true,
                    'message' => 'Unauthorized Invalid Token'
                ], 401);
            }

        }
        
    }
}