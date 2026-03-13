<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enquete extends Model
{
    /** @use HasFactory<\Database\Factories\EnqueteFactory> */
    use HasFactory;

    public function questions()
    {
        return $this->HasMany(Question::class); 
    }

    // réponse au sens où on a répondu à l'enquête en générale, pas aux questions 
    public function reponse()
    {
        return $this->hasMany(Reponse::class); 
    }

<<<<<<< HEAD
    public function echange()
    {
        return $this->hasMany(Echange::class); 
    }

    public function participant()
    {
        return $this->belongsToMany(Participant::class); 
=======
    public function user(){
        return $this->HasOne(User::class); 
>>>>>>> 15e80c3 (no message)
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    protected $fillable = [
        'titre',
        'description',
        'public_cible',
        'date_debut', 
        'date_fin', 
        'statut', 
    ];
}
