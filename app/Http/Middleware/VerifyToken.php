<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;
use Tymon\JWTAuth\Facades\JWTAuth;

class VerifyToken
{

    public function handle(Request $request, Closure $next)
    {
        try {

            $headerAuth = $request->header('Authorization');
            if (!$headerAuth)
            {
                throw new TokenInvalidException();
            }

            JWTAuth::parseToken()->authenticate();

            return $next($request);

        } catch (TokenExpiredException $e) {

            return response()->json(['error' => 'token expired'], 401);

        } catch (TokenInvalidException $e) {

            return response()->json(['error' => 'token invalid'], 401);

        } catch (JWTException $e) {

            return response()->json(['error' => $e], 400);

        }
    }
}
