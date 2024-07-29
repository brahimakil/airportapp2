<?php

namespace App\Http\Controllers\Admin\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\RegistrationRequest;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminAuthController extends Controller
{
    public function register(RegistrationRequest $request)
    {
        $admin = new Admin();
        $admin->name = $request->get('name');
        $admin->email = $request->get('email');
        $admin->password = Hash::make($request->password);

        $admin->save();

        $accessToken = $admin->createToken('authToken')->plainTextToken;
        return response()->json([
            'success' => true,
            'message' => 'Admin Registered Successfully',
            'admin' => $admin,
            'access_token' => $accessToken
        ]);
    }

    public function login(Request $request)
    {
        $credentials = $request->only(['email', 'password']);

        if (Auth::guard('admin')->attempt($credentials)) {
            $admin = Auth::guard('admin')->user();
            $accessToken = $admin->createToken('authToken')->plainTextToken;
            return response()->json([
                "status" => true,
                "message" => "Successfully logged in",
                "admin" => $admin,
                "access_token" => $accessToken
            ]);
        } else {
            return response()->json([
                "status" => false,
                "message" => "Incorrect email or password",
            ]);
        }
    }
}
