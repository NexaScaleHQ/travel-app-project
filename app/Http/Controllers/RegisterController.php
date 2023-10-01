<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Models\User;


class RegisterController extends Controller
{
    public function registerUser(Request $request)
    {
        $validator = Validator::make($request->all(),[
                'first_name' => 'required',
                'last_name' => 'required',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|confirmed',
            ]);

        if ($validator->fails()) {
            return response($validator->errors(), 401);
        }

        $user = User::create([...$validator->validated(), 'password' => Hash::make($validator->validated()['password'])]);
         
        if($user) {
            $token = $user->createToken('token')->plainTextToken;
            return ['token' => $token];
        }
    }
}
