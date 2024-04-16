<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rapport;

class RapportController extends Controller
{
    // Afficher le formulaire de création d'un rapport
    public function create()
    {
        return view('rapports.create');
    }

    // Enregistrer un nouveau rapport dans la base de données
    public function store(Request $request)
    {
        // Valider les données du formulaire
        $request->validate([
            'date' => 'required|date',
            'motif' => 'required|string',
            'bilan' => 'required|string',
            // Ajoutez d'autres règles de validation selon vos besoins
        ]);

        // Créer un nouveau rapport dans la base de données
        Rapport::create([
            'date' => $request->date,
            'motif' => $request->motif,
            'bilan' => $request->bilan,
            // Ajoutez d'autres champs selon votre modèle Rapport
        ]);

        // Rediriger l'utilisateur après la création du rapport avec un message de succès
        return redirect()->route('creation-rapport')->with('success', 'Rapport créé avec succès.');
    }
}
