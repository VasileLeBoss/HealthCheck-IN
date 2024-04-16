<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Famille extends Model
{
    use HasFactory;

    protected $table = 'familles';

    protected $fillable = [
        'libelle',
    ];

    // Si vous avez besoin de relations avec d'autres tables, vous pouvez les définir ici
    public function medicaments()
    {
        return $this->hasMany(Medicament::class, 'idFamille');
    }
}
