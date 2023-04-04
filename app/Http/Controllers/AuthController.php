<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
{
    $email = $request->input('email');
    $password = $request->input('password');

    if (Auth::attempt(['email' => $email, 'password' => $password])) {
        $user = Auth::user();
        $token = $user->createToken('Token Name')->accessToken;
        return response()->json(['token' => $token]);
    } else {
        return response()->json(['error' => 'Unauthorized'], 401);
    }
}
}
