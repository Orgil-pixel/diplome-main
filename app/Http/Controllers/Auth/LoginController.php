<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email|max:255',
            'password' => 'required',
          ]);
      
          $credentials = $request->only(['email', 'password']);
      
          $user = User::where('email', $credentials['email'])
            ->first();
      
          if (!$user || !Hash::check($credentials['password'], $user->password)) {
            throw ValidationException::withMessages([
              'email' => trans('auth.failed'),
            ]);
          }
      
          return response()->json([
            'user' => $user,
            'access_token' => $user->createToken('app')->plainTextToken,
          ]);
    }
}
