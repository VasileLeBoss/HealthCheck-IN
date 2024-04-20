<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Famille;


class Medicament extends Model
{
    use HasFactory;

    protected $fillable = [
        'nomCommercial',
        'composition',
        'effets',
        'contreindication',
        'idFamille',
    ];

    public function famille()
    {
        return $this->belongsTo(Famille::class, 'idFamille');
    }
}
