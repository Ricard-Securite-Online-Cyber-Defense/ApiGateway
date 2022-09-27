<?php

namespace App\Http\Middleware;

use Closure;
use Exception;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class JWTMiddleware
{
    public function _construct()
    {
        //
    }

    public function handle(Request $request, Closure $next): Response|RedirectResponse
    {
        $bearer = $request->bearerToken();

        try {
            $decoded = JWT::decode($bearer, new Key(config('app.jwt_key'), 'HS256'));

            $sub = $decoded->sub;
            $iat = $decoded->iat;
            $exp = $decoded->exp;
            $nbf = $decoded->nbf;
            $iss = $decoded->iss;
            $jti = $decoded->jti;
            $aud = $decoded->aud;

            if ($iss === $aud && $jti === md5($sub . $iat) && $iat === $nbf && $aud === config('app.url')) {
                if (time() < $exp) {
                    return $next($request);
                }
            }
        } catch (Exception $e) {
            return \response('Not authorized - '.$e->getMessage(), 401);
        }
    }
}
