<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthenticationController extends Controller
{
    //

    public function login(LoginRequest  $request)
    {

        $user = User::query()->where('email', $request->email)->first();

        if (!Hash::check($request->password, $user->password)) {
            return response([
                'message' => 'unauthenticated',
            ], status: 401);
        }

        $token = $user->createToken('token')->plainTextToken;
        return response([
            'token' => $token
        ]);
    }



    public function register(RegisterRequest $request)
    {
        /**
         * @var User
         */
        $user = User::create($request->validated());

        $user->customer()->create($request->validated());

        $token = $user->createToken('token')->plainTextToken;
        return response([
            'token' => $token
        ]);
    }
}
