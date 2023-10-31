<?php

namespace App\Http\Controllers\v1\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Models\User;


class RegisterController extends Controller
{
    public function registerUser(Request $request)
    {
        $validator = $this->validator( $request );

        if ($validator->fails()) {
            return response($validator->errors(), 400);
        }

        try {
            $user = User::create([...$validator->validated(), 'password' => Hash::make($validator->validated()['password'])]);
            
            if($user) {
                $token = $user->createToken('token')->plainTextToken;

                return [
                    'message' => 'user registered successfully',
                    'token' => $token,
                    'user' => $user,
                ];
            }
        } catch (\Throwable $th) {
            return response('Something went wrong', 500);
        } 
    }

    public function validator(Request $request){

        $validator = Validator::make($request->all(),[
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed',
        ]);

        return $validator;
    }
}
