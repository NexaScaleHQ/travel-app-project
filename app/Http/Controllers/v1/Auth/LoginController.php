<?php

namespace App\Http\Controllers\v1\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    // Login Route
    public function login(LoginRequest $request) : JsonResponse 
    {   
        try {
            $data = $request->validated();

            $user = User::where('email', $data['email'])->first();

            if (!$user || !Hash::check(request('password'), $user->password)) {
                throw new \Exception('Invalid Credentials');
            }

            $token = $user->createToken('auth-token')->plainTextToken;

            return response()->json([
                'message' => 'Login Successful',
                'token' => $token,
            ], 200);

        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'Invalid Credentials', 
                'error' => $th->getMessage()
            ], 401);
        }
    }
}
