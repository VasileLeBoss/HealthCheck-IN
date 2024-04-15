<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\Visiteur; 
use Illuminate\Support\Carbon;


class RegisterController extends Controller
{
    public function register(Request $request)
    {
        // Valider les données du formulaire
    $validatedData = $request->validate([
        'nom' => ['required', 'string', 'max:255'],
        'prenom' => ['required', 'string', 'max:255'],
        'login' => ['required', 'email', 'max:255', 'unique:visiteurs'], 
        'password' => ['required', 'string', 'min:8'],
        'adresse' => ['required', 'string', 'max:255'],
        'cp' => ['required', 'string', 'max:255'],
        'ville' => ['required', 'string', 'max:255'],
       
    ]);
        // Définir la date d'embauche comme la date d'aujourd'hui
        $validatedData['dateEmbauche'] = Carbon::now();

        // Créer un nouvel utilisateur dans la base de données
        $user = Visiteur::create([
            'nom' => $validatedData['nom'],
            'prenom' => $validatedData['prenom'],
            'login' => $validatedData['login'],
            'password' => Hash::make($validatedData['password']),
            'adresse' => $validatedData['adresse'],
            'cp' => $validatedData['cp'],
            'ville' => $validatedData['ville'],
            'dateEmbauche' => $validatedData['dateEmbauche'], 
            
        ]);

        // Rediriger l'utilisateur après l'inscription
        return redirect()->intended('login');
    }
}
