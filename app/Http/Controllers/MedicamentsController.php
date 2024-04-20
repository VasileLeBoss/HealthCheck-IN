<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Medicament;
use App\Models\Famille;

class MedicamentsController extends Controller
{
    public function view()
    {
        $medicaments = Medicament::orderBy('id', 'desc')->get();
        return view('medicaments', compact('medicaments'));
    }
}
