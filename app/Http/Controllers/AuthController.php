<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Validation\Rules;
use Illuminate\Auth\Events\Registered;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json([
                'message' => 'Invalid credentials'
            ], 401);
        }

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'access_token' => $token,
            'token_type' => 'Bearer',
        ]);
    }
    public function register(Request $request)
{
    $request->validate([
        'name' => ['required'],
        'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
        'nama_peternakan' => ['required', 'string', 'max:255'],
        'alamat' => ['required', 'string', 'max:255'],
        'password' => ['required', 'string', 'min:8'],
    ]);

    $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'nama_peternakan' => $request->nama_peternakan,
        'alamat' => $request->alamat,
        'password' => Hash::make($request->password),
    ]);

    event(new Registered($user));

    return response()->json([
        'message' => 'Registration successful',
        'user' => $user,
    ], 201);
}

}
