<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reponse extends Model
{
    /** @use HasFactory<\Database\Factories\ReponseFactory> */
    use HasFactory;

    public function enquete(){
        return $this->belongsTo(Enquete::class); 
    }

    public function formulaireReponse()
    {
        return $this->belongsTo(FormulaireReponse::class, 'formulaire_reponse_id');
    }

    public function participant()
    {
        return $this->belongsTo(Participant::class, 'participant_id');
    }

    protected $fillable = [
        'statut',
        'date_reponse'
    ];
}
