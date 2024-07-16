<?php
// app/Http/Controllers/AuthController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
// Register a new user
public function register(Request $request)
{
$request->validate([
'name' => 'required|string|max:255',
'email' => 'required|string|email|max:255|unique:users',
'password' => 'required|string|min:8|confirmed',
]);

$user = User::create([
'name' => $request->name,
'email' => $request->email,
'password' => bcrypt($request->password),
]);

return response()->json(['token' => $user->createToken('API Token')->plainTextToken]);
}

// Authenticate an existing user
public function login(Request $request)
{
$request->validate([
'email' => 'required|string|email',
'password' => 'required|string',
]);

if (!Auth::attempt($request->only('email', 'password'))) {
return response()->json(['message' => 'Invalid login credentials'], 401);
}

$user = Auth::user();
return response()->json(['token' => $user->createToken('API Token')->plainTextToken]);
}

// Logout the authenticated user
public function logout(Request $request)
{
$request->user()->currentAccessToken()->delete();

return response()->json(['message' => 'Logged out']);
}
}
