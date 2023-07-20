<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LogoutController extends Controller
{
    // Méthode pour la déconnexion
    public function logout(Request $request)
    {
        // Déconnectez l'utilisateur actuellement connecté
        Auth::logout();

        // Retournez la réponse JSON avec un message de succès
        return response()->json(['message' => 'Logged out successfully']);
    }
}
