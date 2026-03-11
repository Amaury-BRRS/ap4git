<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Formation extends Model
{
    /** @use HasFactory<\Database\Factories\FormationFactory> */
    use HasFactory;

    public function etablissement()
    {
        return $this->belongsToMany(Etablissement::class);
    }

    protected $fillable = [
        'libelle',
    ];
}
