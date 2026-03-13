<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormulaireReponse extends Model
{
    /** @use HasFactory<\Database\Factories\FormulaireReponseFactory> */
    use HasFactory;

    public function question()
    {
        return $this->belongsTo(Question::class, 'id_question');
    }

    public function reponses()
    {
        return $this->hasMany(Reponse::class, 'id_formulaire_reponse');
    }
}
