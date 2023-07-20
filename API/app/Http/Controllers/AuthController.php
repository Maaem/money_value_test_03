<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Méthode pour l'inscription
    public function register(Request $request)
    {
        // Validez les données envoyées par le formulaire d'inscription
        $validatedData = $request->validate([
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|confirmed|min:8',
        ]);

        // Créez un nouvel utilisateur
        $user = User::create([
            'email' => $validatedData['email'],
            'password' => bcrypt($validatedData['password']),
        ]);

        // Connectez automatiquement l'utilisateur après l'inscription
        Auth::login($user);

        // Retournez la réponse JSON avec l'utilisateur connecté
        return response()->json(['user' => $user]);
    }

    // Méthode pour la connexion
    public function login(Request $request)
    {
        // Validez les données envoyées par le formulaire de connexion
        $credentials = $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        // Tentez de connecter l'utilisateur
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            return response()->json(['user' => $user]);
        } else {
            return response()->json(['message' => 'Invalid credentials'], 401);
        }
    }
}
