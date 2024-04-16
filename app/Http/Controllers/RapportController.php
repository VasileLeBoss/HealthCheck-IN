<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rapport;
use App\Models\Medecin;
use App\Models\Medicament;
use App\Models\Offrir;
use Exception;

class RapportController extends Controller
{
    // Afficher le formulaire de création d'un rapport
    public function create()
    {
        $medecins = Medecin::all();
        $medicaments = Medicament::all();
        return view('rapports', compact('medecins', 'medicaments'));
    }

    // Enregistrer un nouveau rapport dans la base de données
    public function store(Request $request)
    {
        try {
            // Valider les données du formulaire
            $request->validate([
                'motif' => 'required|string',
                'bilan' => 'required|string',
                'medecin' => 'required|exists:medecins,id',
                'medicament' => 'required|exists:medicaments,id',
            ]);

            // Créer un nouveau rapport dans la base de données
            $rapport = new Rapport([
                'date' => now(),
                'motif' => $request->motif,
                'bilan' => $request->bilan,
                'visiteur_id' => auth()->id(),
                'idMedecin' => $request->medecin,
            ]);
            $rapport->save();

            // Enregistrer également les données dans la table "offrir"
            $offrir = new Offrir([
                'idRapport' => $rapport->id,
                'idMedicament' => $request->medicament,
                'quantite' => $request->quantite, // Assurez-vous d'avoir un champ de quantité dans le formulaire
            ]);

            if ($offrir->save()) {
                return redirect()->route('creation-rapport')->with('success', 'Rapport créé avec succès.');
            } else {
                return redirect()->route('creation-rapport')->with('error', 'Le Rapport n\'a pas été créé avec succès.');
            }
        } catch (Exception $e) {
            // Gérer l'exception ici
            return redirect()->route('creation-rapport')->with('error', 'Une erreur est survenue lors de la création du rapport : ' . $e->getMessage());
        }
    }
}
