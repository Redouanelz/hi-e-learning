<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Register method
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|unique:users,email',
            'password' => 'required|string|min:6',
            'role' => 'required|string|in:student,instructor', // Validate that role is either 'student' or 'instructor'
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role, // Save the role
        ]);

        return response()->json(['message' => 'User registered successfully'], 201);
    }

    // Login method
    public function login(Request $request)
    {
        // Validate input
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string|min:6',
        ]);

        // Attempt authentication
        if (!Auth::attempt($request->only('email', 'password'))) {
            return response()->json(['message' => 'Invalid login credentials'], 401);
        }

        // Retrieve the authenticated user
        $user = Auth::user();

        // Return user data as JSON response
        return response()->json([
            'message' => 'Login successful',
            'user' => $user,  // Send the logged-in user data
        ]);
    }


    // Logout method
    public function logout()
    {
        Auth::logout();
        return response()->json(['message' => 'User logged out successfully']);
    }
}
