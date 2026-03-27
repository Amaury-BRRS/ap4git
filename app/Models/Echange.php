<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Echange extends Model
{
    /** @use HasFactory<\Database\Factories\EchangeFactory> */
    use HasFactory;

    public function enquete()
    {
        return $this->belongsTo(Enquete::class, 'enquete_id');
    }

    public function participant()
    {
        return $this->belongsTo(Participant::class, 'participant_id');
    }
  
    protected $fillable = [
        'type',
        'date_de_contact',
        'user_id',
    ];

    protected function casts(): array
    {
        return [
            'date_de_contact' => 'date',
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}