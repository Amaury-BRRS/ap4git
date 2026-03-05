<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contrat extends Model
{
    /** @use HasFactory<\Database\Factories\ContratFactory> */
    use HasFactory;

    public function participant()
    {
        return $this->hasMany(Participant::class);
    }

    protected $fillable = [
        'date_debut',
        'date_fin',
    ];
}
