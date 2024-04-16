<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Visiteur;

class Rapport extends Model
{
    use HasFactory;

    protected $fillable = [
        'date',
        'motif',
        'bilan',
        'idVisiteur',
        'idMedecin',
    ];

    // Relation avec le médecin
    public function medecin()
    {
        return $this->belongsTo(Medecin::class, 'idMedecin');
    }

    public function visiteur()
    {
        return $this->belongsTo(Visiteur::class, 'idVisiteur');
    }
    

}
