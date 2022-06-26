<?php

namespace App\Http\Controllers\API;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Laravel\Fortify\Rules\Password;

class UserController extends Controller
{
    public function register(Request $request)
    {
        try {
            $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'username' => ['required', 'string', 'max:255'],
                'email' => ['required', 'email', 'unique:users'],
                'phone' => ['required', 'string', 'max:16'],
                'password' => ['required', 'string', new Password]
            ]);

            $user = User::create([
                'name' => $request->name,
                'username' => $request->username,
                'email' => $request->email,
                'phone' => $request->phone,
                'password' => Hash::make($request->password)
            ]);

            $token = $user->createToken('authToken')->plainTextToken;

            return ResponseFormatter::success([
                'token' => $token,
                'user' => $user
            ],'Register berhasil');
        } catch (Exception $error) {
            return ResponseFormatter::error([
                'error' => $error->getMessage(),
                'message' => 'Something went wrong'
            ],'Authentication failed', 500);
        }
    }

    public function login(Request $request)
    {
        try {
            //code...
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
}
