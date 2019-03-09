<?php

namespace App\Http\Controllers;

use Auth;
use JWTAuth;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller {
  public function register(Request $request) {
    $user = new User;
    $user->email = $request->email;
    $user->name = $request->name;
    $user->password = Hash::make($request->password);
    $user->save();

    return response([
      'status' => 'success',
      'data' => $user
    ], 200);
  }

    public function login(Request $request) {
      $credentials = $request->only('email', 'password');

      if (! $token = JWTAuth::attempt($credentials)) {
        return response([
          'status' => 'error',
          'error' => 'invalid.credentials',
          'msg' => 'Invalid Credentials.'
        ], 400);
      }

      return response([
        'status' => 'success'
        ])
        ->header('Authorization', $token);
    }

    public function user(Request $request) {
        $user = User::find(Auth::user()->id);
        return response([
            'status' => 'success',
            'data' => $user
        ]);
    }

    public function logout() {
      JWTAuth::invalidate();

      return response([
        'status' => 'success',
        'msg' => 'Logged out Successfully.'
      ], 200);
    }

    public function refresh() {
      return response([
        'status' => 'success'
      ]);
    }
}
