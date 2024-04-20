<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Visiteur;

class ProfileController extends Controller
{
    public function update(Request $request)
    {
        $user = auth()->user();
    
        // Valider les données du formulaire
        $validator = $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'login' => 'required|string|email|max:255|unique:visiteurs,login,' . $user->id,
            'adresse' => 'required|string|max:255',
            'ville' => 'required|string|max:255',
            'cp' => 'required|string|max:255',
        ]);
    
        // Mettre à jour les données de l'utilisateur
        $user->update([
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'login' => $request->login,
            'adresse' => $request->adresse,
            'ville' => $request->ville,
            'cp' => $request->cp,
        ]);
    
        // Vérifiez si la mise à jour a réussi
        if ($user->wasChanged()) {
            return redirect()->back()->with('success', 'Profil mis à jour avec succès.');
        } else {
            return redirect()->back()->with('error', 'Aucune modification n\'a été apportée.');
        }
    }


        public function updatePassword(Request $request)
        {
            $user =  auth()->user();
    
            // Valider les données du formulaire
            $request->validate([
                'old-password' => 'required',
                'new-password' => 'required|string|min:8|different:old-password',
                'confirm-password' => 'required|same:new-password',
            ]);
    
            // Vérifier si l'ancien mot de passe est correct
            if (!Hash::check($request->input('old-password'), $user->password)) {
                return redirect()->back()->with('error-mdp', 'Le mot de passe actuel est incorrect.');
            }
    
            // Mettre à jour le mot de passe
            $user->update(['password' => Hash::make($request->input('new-password'))]);
    
            return redirect()->back()->with('success-mdp', 'Le mot de passe a été modifié avec succès.');
        }

        public function destroy($id)
        {
            // Recherche l'utilisateur à supprimer
            $user = Visiteur::findOrFail($id);

            // Supprimer l'utilisateur
            $user->delete();

            // Redirigez l'utilisateur vers une page de confirmation 
            return redirect()->route('accueil')->with('success', 'Votre compte a été désactivé avec succès.');
        }
    
    
    
}

