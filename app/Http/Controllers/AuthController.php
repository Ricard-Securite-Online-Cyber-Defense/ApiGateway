<?php

namespace App\Http\Controllers;

use Firebase\JWT\JWT;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AuthController extends Controller
{
    private string $apiUrl;

    public function __construct()
    {
        $this->apiUrl = "http://localhost:3000";
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            "email" =>  "required|string|email",
            "password" => "required|string"
        ]);

        $res = Http::withHeaders([
                'accept' => 'application/json',
                'content-type' => 'application/json',
            ])
            ->post('http://localhost:3000', [
                "email" => $request->email,
                "password" => $request->password
            ]);

        if($res->status() === 200) {
            $jwt = $this->makeJWT($res->body());

            return response()->json([
                'token' => $jwt
            ]);
        }

        return response(null, 401);
    }

    private function makeJWT($sub) {
        $key = config('app.jwt_key');
        $iat = time();
        $payload = [
            'sub' => $sub,
            'iat' => $iat,
            'exp' => time() + (60 * 60),
            'nbf' => $iat,
            'iss' => config('app.url'),
            'jti' => md5($sub . $iat),
            'aud' => config('app.url'),
        ];

        return JWT::encode($payload, $key, 'HS256');
    }
}
