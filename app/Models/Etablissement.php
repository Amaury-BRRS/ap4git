<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Etablissement extends Model
{
    /** @use HasFactory<\Database\Factories\EtablissementFactory> */
    use HasFactory;

    public function formations()
    {
        return $this->belongsToMany(Formation::class);
    }

    protected $fillable = [
        'nom',
        'adresse',
        'ville',
        'code_postal',
        'email',
        'telephone',
    ];
}
