<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

use \App\Models\User;

class AuthController extends Controller
{

    public function me(Request $request)
    {
        return response()->json($request->user(), 200);
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users|max:255',
            'password' => 'required|min:8',
        ]);


        // Returns an error if validation error occur
        if ($validator->fails()) {
            $errors = $validator->errors();
            return response()->json([
                'error' => $errors
            ], 400);
        }

        // Check if validation pass + create user and auth token
        else {
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);

            $token = $user->createToken('auth_token', [])->plainTextToken;

            return response()->json([
                'permissions' => $user->permissions,
                'access_token' => $token,
                'token_type' => 'Bearer',
            ]);
        }
    }


    public function login(Request $request)
    {

        if (!Auth::attempt($request->only('email', 'password'))) {
            return response()->json([
                'message' => "Invalid login details"
            ], 400);
        }

        $user = User::where('email', $request['email'])->firstOrFail();
        $token = $user->createToken('auth_token', [])->plainTextToken;

        if ($user->permissions === "Admin") {
            $token = $user->createToken('auth_token', ['is-admin'])->plainTextToken;
        }

        return response()->json([
            'permissions' => $user->permissions,
            'access_token' => $token,
            'token_type' => "Bearer",
        ]);
    }
}
