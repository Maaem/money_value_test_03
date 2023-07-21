<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(LoginRequest $request)
    {
        $credentials = $request->validated();
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            $user = Auth::user();
            return response(['message' => "Utilisateur authentifié", "status" => 201, "user" => $user], 201);
        };
        return response(["message" => "Les informations sont incorrectes.", "status" => 401], 401);
    }
}