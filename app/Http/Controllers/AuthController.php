<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Testing\Fluent\Concerns\Has;

class AuthController extends Controller
{
    public function memberRegistration(Request $request)
    {
        // Validate the incoming request data
        $validation = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required',
            'profile_image' => 'nullable|image|max:2048',
        ]);

        if ($validation->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validation errors',
                'errors' => $validation->errors(),
            ], 422);
        }

        // Create a new user
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
            'password' => Hash::make($request->password),
            'profile_image' => $request->profile_image,
        ]);

        $token = $user->createToken('auth_token')->plainTextToken;

        // Return a success response
        return response()->json([
            'status' => true,
            'message' => 'User registered successfully',
            // 'user' => $user,
            'user' => new UserResource($user),
            'token' => $token
        ], 201);
    }

    public function memberLogin(Request $request)
    {
        // Validate the incoming request data
        $validation = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|string|min:8',
        ]);

        if ($validation->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validation errors',
                'errors' => $validation->errors(),
            ], 422);
        }

        // Attempt to find the user
        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json([
                'status' => false,
                'message' => 'Invalid email or password',
            ], 401);
        }

        $token = $user->createToken('auth_token')->plainTextToken;

        // Return a success response
        return response()->json([
            'status' => true,
            'message' => 'User logged in successfully',
            // 'user' => $user,
            'user' => new UserResource($user),
            'token' => $token
        ], 200);
    }

    public function memberLogout(Request $request)
    {
        // Revoke the token that was used to authenticate the current request
        $request->user()->currentAccessToken()->delete();

        return response()->json([
            'status' => true,
            'message' => 'User logged out successfully',
        ], 200);
    }
}
