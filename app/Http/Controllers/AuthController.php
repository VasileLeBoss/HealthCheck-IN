<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('login', 'password');

        if (Auth::attempt($credentials)) {
            // L'utilisateur est connecté


            return redirect()->intended('accueil');
        }

        // Si l'authentification échoue, rediriger l'utilisateur vers le formulaire de connexion avec un message d'erreur
        return redirect()->back()->withInput()->withErrors(['login' => 'Login ou mot de passe incorrect']);
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
