<?php

namespace App\Http\Controllers\v1\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\RegisterUserRequest;

class RegisterController extends Controller
{
    public function registerUser(RegisterUserRequest $request)
    {
        
        $request->validated($request->all());

        $user = User::create([
         'first_name' => $request->first_name,
         'last_name' => $request->last_name,
         'email' => $request->email,
         'password' => Hash::make($request->password),
         'date_of_birth' => $request->date_of_birth,
         'gender' => $request->gender,
         'country' => $request->country,
         'interests' => $request->interests,
         'is_admin' => $request->is_admin,
         'is_active' => $request->is_active,
        ]);
 
        return response([
            "message" => "user created successfully",
            "user" => $user,
            "token" => $user->createToken($user->first_name)->plainTextToken
        ]);
    }
}
