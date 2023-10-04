<?php

namespace App\Http\Controllers\v1\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LogoutController extends Controller
{
    public function logout(Request $request)
    {
        $user = Auth::user();

        if ($user) {
            $user->tokens->each(fn ($token) => $token->delete());
            return response()->json(['message' => 'Successfully logged out user.'], 200);
        }

        return response()->json(['message' => 'User not authenticated.'], 401);
    }
}
