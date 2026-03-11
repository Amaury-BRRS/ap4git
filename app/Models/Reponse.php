<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reponse extends Model
{
    /** @use HasFactory<\Database\Factories\ReponseFactory> */
    use HasFactory;

    public function enquete(){
        return $this->BelongsTo(Enquete::class); 
    }

    protected $fillable = [
        'statut',
        'date_reponse'
    ];
}
