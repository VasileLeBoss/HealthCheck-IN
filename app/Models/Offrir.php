<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Medicament;
use App\Models\Rapport;

class Offrir extends Model
{
    use HasFactory;

    protected $table = 'offrir';

    protected $fillable = [
        'idRapport',
        'idMedicament',
        'quantite',
    ];

    public function rapport()
    {
        return $this->belongsTo(Rapport::class, 'idRapport');
    }

    public function medicament()
    {
        return $this->belongsTo(Medicament::class, 'idMedicament');
    }
    
    
}
