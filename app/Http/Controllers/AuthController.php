<?php

// app/Http/Controllers/AuthController.php
namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
    public function login(LoginRequest $request)
    {
        // Validate the incoming request
        $credentials = $request->only('nik', 'password');

        if (Auth::attempt(['nik' => $credentials['nik'], 'password' => $credentials['password']])) {
            // Authentication passed, generate token
            $user = Auth::user();
            $token = JWTAuth::fromUser($user); // Generate JWT token
            return response()->json(compact('token')); // Return token to frontend
        }

        return response()->json(['error' => 'Unauthorized'], 401);
    }
}
