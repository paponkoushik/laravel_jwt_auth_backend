<?php


namespace App\Http\Controllers\Auth;


use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(Request $request): JsonResponse
    {
        if (!$token = auth()->attempt($request->only('email', 'password'))) {
            return response()->json(["message" => "Invalid Credentials"]);
        };

        return response()->json(compact('token'));
    }

    public function logout(): JsonResponse
    {
        auth()->logout();
        return response()->json(["message" => "Logout Successfully"]);
    }

    public function mySelf(): JsonResponse
    {
        return response()->json([
            "email"=> auth()->user()->email,
            "password"=> auth()->user()->password,
        ]);
    }
}
