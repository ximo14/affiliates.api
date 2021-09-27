<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;


class AuthController extends Controller
{

    public function login(LoginRequest $request)
    {
        $credentials = $request->only('username', 'password');

        $token = JWTAuth::attempt($credentials);
        if (!$token) {
            return response()->json(['error' => 'invalid username or password'], 400);
        }

        $responseData = [
            'token' => $token,
        ];

        return response()->json($responseData);

    }
}
