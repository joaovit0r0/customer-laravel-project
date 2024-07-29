<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function auth(Request $request)
    {
        $credentials = $request->only(
            [
                'email',
                'password'
            ]
        );
        $user = User::where('email', $credentials['email'])->first();
        if (!$user || !Hash::check($credentials['password'], $user->password, ['rounds' => 12])) {
            throw ValidationException::withMessages([
                'message' => ['Invalid credentials']
            ]);
        }

        $user->tokens()->delete(); // delete all user tokens

        $token = $user->createToken($credentials['password'])->plainTextToken;

        return response()->json([
            'token' => $token
        ]);
    }

    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();

        return response()->json([
            'message' => 'success'
        ]);
    }
}
