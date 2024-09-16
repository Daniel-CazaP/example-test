<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function login(LoginRequest $request)
    {
        $user = User::whereEmail($request->email)->firstOrFail();
        if (!Hash::check($request->password, $user->password)) {
            return response()->json(['message' => 'Credenciales incorrectas'], 400);
        }
        $token = $user->createToken('auth_token')->plainTextToken;

        return $token;
    }

    public function register(RegisterRequest $request)
    {
        User::create($request->validated());
        $login_data = new LoginRequest(['email' => $request->email, 'password' => $request->password]);
        $auth = $this->login($login_data);

        return $auth;
    }
}
