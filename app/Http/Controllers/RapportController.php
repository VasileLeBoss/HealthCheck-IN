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

    public function view(Request $request)
    {
        $id = $request->query('id');

        // Vérifier si le rapport existe et s'il appartient à l'utilisateur authentifié
        $rapport = Rapport::findOrFail($id);

        if ($rapport->visiteur_id !== auth()->id()) {
            return redirect()->route('creation-rapport')->with('error', 'Vous n\'êtes pas autorisé à accéder à ce rapport.');
        }

        //$medecins = Medecin::all();
        $medecins = Medecin::find($rapport->idMedecin);
        
        // Récupérer les données de liaison entre le rapport et le médicament
        $offrir = Offrir::where('idRapport', $rapport->id)->first();

        // Récupérer le médicament lié au rapport
        $medicaments = ($offrir) ? $offrir->medicament : null;

        return view('rapport-modif', compact('rapport', 'medecins', 'medicaments'));
    }

    public function update(Request $request, $id)
{
    // Valider les données du formulaire
    $request->validate([
        'motif' => 'required|string',
        'bilan' => 'required|string'
    ]);

    // Récupérer le rapport
    $rapport = Rapport::findOrFail($id);

    // Vérifier si le rapport appartient à l'utilisateur authentifié
    if ($rapport->visiteur_id !== auth()->id()) {
        return redirect()->route('creation-rapport')->with('error', 'Vous n\'êtes pas autorisé à modifier ce rapport.');
    }

    // Mettre à jour les données du rapport
    $rapport->motif = $request->motif;
    $rapport->bilan = $request->bilan;
    $rapport->save();

    return redirect()->route('rapport-modif', ['id' => $rapport->id])->with('success', 'Rapport modifié avec succès.');
}

public function destroy($id)
{
    $rapport = Rapport::findOrFail($id);
    
    // Vérifier si le rapport appartient à l'utilisateur authentifié
    if ($rapport->visiteur_id != auth()->id()) {
        return back()->with('error', 'Vous n\'êtes pas autorisé à supprimer ce rapport.');
    }
    
    // Supprimer le rapport
    $rapport->delete();

    // Redirection avec un message de succès
    return redirect()->route('creation-rapport')->with('success', 'Rapport supprimé avec succès.');
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
            return redirect()->route('creation-rapport')->with('error', 'Une erreur est survenue lors de la création du rapport ');
        }
    }
}
