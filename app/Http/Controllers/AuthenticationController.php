<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\RegisterRequest;


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


    public function logout(LoginRequest $request)
    {
        // $request->user()->token()->revoke();
        // return response()->json([
        //     'message' => 'Successfully logged out'
        // ]);
        if ($request->user()->tokens()->delete()) {
            return response([
                'message' => 'logout successfully',
            ], status: 200);
        } else {
            return response([
                'message' => 'error occurred , please try again',
            ], status: 500);
        }
    }



    // public function logoutApi()
    // {
    //     if (Auth::check()) {
    //         Auth::user()->AauthAcessToken()->delete();
    //     }

    //     // $user = Auth::user()->token();
    //     // $user->revoke();
    //     // return 'logged out'; // modify as per your need
    // }
}
