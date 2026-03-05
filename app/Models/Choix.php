<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Choix extends Model
{
    /** @use HasFactory<\Database\Factories\ChoixFactory> */
    use HasFactory;

    public function question(){
        return $this->belongsTo(Question::class); 
    }

    protected $fillable = [
        'liste_choix'
    ];
}
