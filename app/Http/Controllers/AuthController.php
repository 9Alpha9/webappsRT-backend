<?php

// app/Http/Controllers/AuthController.php
namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpKernel\Event\ResponseEvent;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
    public function login(LoginRequest $request): JsonResponse
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

    public function logout(): JsonResponse {
        auth()->logout();
        return response()->json(['message' => 'Logged Out Successfully!']);
    }

    public function register(RegisterRequest $request): JsonResponse {
        try {
            try {
                $checkNIK = User::where('nik', '=', $request['nik'])->get();

                if ($checkNIK->count() > 0) {
                    return response()->json(['error' => "NIK Sudah terdaftar!"]);
                }
            } catch (\Exception $e) {
                return response()->json(['message' => $e->getMessage()], 400);
            }
            $request['password'] = bcrypt($request['password']);
    
            $user = User::create($request->validated());
    
            return response()->json($user);
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()], 400);
        }
    }
}
