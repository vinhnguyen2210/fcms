<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Carbon\Carbon;
use Tymon\JWTAuth\JWTAuth;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Exceptions\JWTException;

class LoginController extends Controller
{
    public function index(Request $request)
    {
        $data = [];
        $data['name'] = $request->user()->name;
        $data['email'] = $request->user()->email;
        return response()->json([
            'data' => $data,
        ]);
    }

    public function login(LoginRequest $request, JWTAuth $JWTAuth)
    {
        try {
            $token = $JWTAuth->attempt($request->only('email', 'password'), [
                'exp' => Carbon::now()->addWeek()->timestamp,
            ]);
        } catch (JWTException $e) {
            return response()->json([
                'error' => 'Could not authenticate',
            ], 500);
        }
        if (!$token) {
            return response()->json([
                'error' => 'Invalid credentials',
            ], 401);
        } else {
            $data = [];
            $meta = [];

            $data['name'] = $request->user()->name;
            $meta['token'] = $token;

            return response()->json([
                'data' => $data,
                'meta' => $meta
            ]);
        }
    }
}
