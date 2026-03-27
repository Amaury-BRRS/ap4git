<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Echange extends Model
{
    /** @use HasFactory<\Database\Factories\EchangeFactory> */
    use HasFactory;

    /**
     * Relation : un échange appartient à une enquête
     */
    public function enquete()
    {
        return $this->belongsTo(Enquete::class, 'enquete_id');
    }

    /**
     * Relation : un échange appartient à un participant
     */
    public function participant()
    {
        return $this->belongsTo(Participant::class, 'participant_id');
    }
  
    /**
     * Champs remplissables en masse pour la création/mise à jour
     */
    protected $fillable = [
        'type',           // Type d'échange (email, téléphone, visio, etc.)
        'date_de_contact', // Date du contact
        'user_id',        // ID de l'utilisateur qui a fait l'échange
        'enquete_id',     // ID de l'enquête concernée
        'participant_id', // ID du participant concerné
    ];

    /**
     * Casts pour les types de données
     */
    protected function casts(): array
    {
        return [
            'date_de_contact' => 'date', // Cast en objet Carbon/Date
        ];
    }

    /**
     * Relation : un échange appartient à un utilisateur
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}