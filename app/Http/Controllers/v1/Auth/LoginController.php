<?php

namespace App\Http\Controllers\v1\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    // Login Route
    public function login() : JsonResponse 
    {
        return response()->json([
            'message' => 'User Logged in'
        ], 200);
    }
}
