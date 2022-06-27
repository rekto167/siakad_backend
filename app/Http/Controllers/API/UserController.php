<?php

namespace App\Http\Controllers\API;

use Exception;
use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
            $request->validate([
                'username' => ['required'],
                'password' => ['required']
            ]);

            // credential
            $credential = request(['username', 'password']);

            if(!Auth::attempt($credential))
            {
                return ResponseFormatter::error([$credential], 'Unauthorized', 401);
            }

            // get user
            $user = User::where('username', $request->username)->first();
            // cek password
            if(!Hash::check($request->password, $user->password, []))
            {
                throw new Exception('Invalid credential');
            }
            
            // token
            $token = $user->createToken('authToken')->plainTextToken;

            return ResponseFormatter::success([
                'token' => $token,
                'user' => $user
            ], 'Login successfully');
        } catch (Exception $error) {
            return ResponseFormatter::error([
                'message' => 'Something went wrong',
                'error' => $error
            ], 'Authentication failed', 500);
        }
    }
}