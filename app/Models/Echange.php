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
        return $this->belongsTo(Enquete::class, 'id_enquete');
    }

    public function participant()
    {
        return $this->belongsTo(Participant::class, 'id_participant');
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