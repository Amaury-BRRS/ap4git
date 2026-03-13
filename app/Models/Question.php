<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    /** @use HasFactory<\Database\Factories\QuestionFactory> */
    use HasFactory;

    public function choix(){
        return $this->hasMany(Choix::class); 
    }

    public function enquete(){
        return $this->belongsTo(Enquete::class); 
    }

    public function formulairesReponse()
    {
        return $this->hasMany(FormulaireReponse::class, 'id_question');
    }

    protected $fillable = [
        'type',
        'intitule',
        'ordre',
    ];
}
