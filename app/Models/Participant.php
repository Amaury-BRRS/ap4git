<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Participant extends Model
{
    /** @use HasFactory<\Database\Factories\ParticipantFactory> */
    use HasFactory;

    public function contrat()
    {
        return $this->belongsToMany(Contrat::class);
    }

    protected $fillable = [
        'nom',
        'prenom',
        'type_participant',
    ];

    public function enquete(){
        return $this->HasMany(enquete::class); 
    }
}
