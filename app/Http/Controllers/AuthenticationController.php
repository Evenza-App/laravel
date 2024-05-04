<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\LogoutRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthenticationController extends Controller
{
    //

    public function login(LoginRequest $request)
    {

        $user = User::query()->where('email', $request->email)->first();

        if (!Hash::check($request->password, $user->password)) {
            return response([
                'message' => 'unauthenticated',
            ], status: 401);
        }

        $token = $user->createToken('token')->plainTextToken;

        $user->fcmTokens()->create(['token' => $request->fcm_token]);

        return response([
            'token' => $token,
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

        $user->fcmTokens()->create(['token' => $request->fcm_token]);


        return response([
            'token' => $token,
        ]);
    }

    public function logout(LogoutRequest $request)

    {
        //Auth::user()->currentAccessToken()->delete();

        Auth::user()->fcmTokens()->where('token', $request->fcm_token)->delete();

        return response([
            'message' => 'logout successfully',
        ], status: 200);
        // $request->user()->token()->revoke();
        // return response()->json([
        //     'message' => 'Successfully logged out'
        // ]);

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
