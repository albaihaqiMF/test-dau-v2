<?php

namespace App\Http\Controllers\API;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'username'  => 'required',
            'password'  => 'required',
        ]);

        $user = User::where('email', $request->username)->orWhere('username', $request->username)->first();

        if (!$user) {
            return ResponseFormatter::error('Users not found');
        }

        if (!Hash::check($request->password, $user->password)) {
            return ResponseFormatter::error('Users not found');
        }

        $token = $user->createToken('api-test')->plainTextToken;

        $user['access_token'] = $token;

        return ResponseFormatter::success('Login Successfully', $user);
    }
}
