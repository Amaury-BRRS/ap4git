<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Participant extends Model
{
    /** @use HasFactory<\Database\Factories\ParticipantFactory> */
    use HasFactory;

    public function contrats()
    {
        return $this->belongsToMany(Contrat::class);
    }
    
    public function enquete()
    {
        return $this->belongsToMany(enquete::class); 
    }

    public function reponses()
    {
        return $this->hasMany(Reponse::class, 'id_participant');
    }

    public function echanges()
    {
        return $this->hasMany(Echange::class, 'id_participant');
    }

    protected $fillable = [
        'nom',
        'prenom',
        'type_participant',
    ];

}
