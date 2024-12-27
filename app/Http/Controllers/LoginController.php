<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function check(Request $request)
    {
        // Validate the incoming request data
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // Attempt to log in the user using the provided credentials
        if (Auth::attempt($credentials)) {
            // Authentication passed, get the user and generate a token using Sanctum
            $user = Auth::user(); // Get the authenticated user

            // Create a token using Sanctum
            $token = $user->createToken('TaskManagement')->plainTextToken;

            // Return the response with the generated token and user data
            return response()->json([
                'status' => true,
                'message' => 'Login successful',
                'token' => $token, // Send the generated token to the client
                'user' => $user,   // Optionally, send user data along with the token
            ], 200); // HTTP 200 OK
        }

        // If authentication fails, return an error response
        return response()->json([
            'status' => false,
            'message' => 'Invalid credentials',
        ], 401); // HTTP 401 Unauthorized
    }
}
