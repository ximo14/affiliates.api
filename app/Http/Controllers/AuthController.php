<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;

class AuthController extends Controller
{

    public function login(LoginRequest $request)
    {
        $credentials = $request->only('username', 'password');

        return response()->json(['data' => $credentials], 200);
    }
}
