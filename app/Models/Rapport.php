<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Medecin;
use App\Models\Visiteur;
use Carbon\Carbon;
use Illuminate\Support\Facades\App;

class Rapport extends Model
{
    use HasFactory;

    protected $fillable = [
        'date',
        'motif',
        'bilan',
        'visiteur_id',
        'idMedecin',
    ];
    

    

    // Relation avec le médecin
    public function medecin()
    {
        return $this->belongsTo(Medecin::class, 'idMedecin');
    }


    public function visiteur()
    {
        return $this->belongsTo(Visiteur::class, 'visiteur_id');
    }
    
    public function formatDate()
    {
        // Définir la locale en français
        App::setLocale('fr');

        // Utiliser Carbon pour analyser la date
        $carbonDate = Carbon::parse($this->date);

        // Formater la date au format JJ/MM/AAAA en français
        return $carbonDate->isoFormat('DD/MMMM/YYYY');
    }
}
