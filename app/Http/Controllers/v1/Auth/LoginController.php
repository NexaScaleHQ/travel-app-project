<?php

namespace App\Http\Controllers\v1\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\JsonResponse;


class LoginController extends Controller
{
    // Login Route
    public function login(Request $request) : JsonResponse 
    {
        $request->validate([
            'login_field' => 'required|string',
            'password' => 'required|string',
        ]);
    
        $loginField = $request->input('login_field');

        if (filter_var($loginField, FILTER_VALIDATE_EMAIL)) 
        {
            $credentials = [
                'email' => $loginField,
                'password' => $request->input('password'),
            ];
        } else {
            $credentials = [
                'username' => $loginField,
                'password' => $request->input('password'),
            ];
        }

        if (Auth::attempt($credentials)) {
            return response()->json([
                'message' => 'User Logged in'
            ], 200);
        } else {
            throw ValidationException::withMessages(['login_field' => 'Invalid credentials']);
        }
    }
}