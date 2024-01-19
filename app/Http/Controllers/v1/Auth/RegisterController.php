<?php

namespace App\Http\Controllers\v1\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use App\Http\Resources\UserResources;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Js;

class RegisterController extends Controller
{
    public function registerUser(RegisterRequest $request): JsonResponse
    {
        try {
            $data = $request->validated();

            $user = User::create($data);

            return response()->json([
                'message' => 'User Registered Successfully',
                'data' => new UserResources($user),
            ], 201);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'Error Registering User',
            ], 500);
        }
    }
}
