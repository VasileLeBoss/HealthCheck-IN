<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Medicament;

class HomeController extends Controller
{
    public function index()
    {
        // Récupérer les 6 derniers médicaments depuis la base de données
        $medicaments = Medicament::orderBy('id', 'desc')->take(6)->get();

        // Récupérer les rapports de l'utilisateur actuellement authentifié
        $rapports = auth()->user()->rapports;

        // Passer les médicaments et les rapports à la vue d'accueil
        return view('accueil', compact('medicaments', 'rapports'));
    }

}
