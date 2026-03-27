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
        return $this->belongsTo(Question::class, 'question_id');
    }

    public function reponses()
    {
        return $this->hasMany(Reponse::class, 'formulaire_reponse_id');
    }
}
