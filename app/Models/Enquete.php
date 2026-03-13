<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enquete extends Model
{
    /** @use HasFactory<\Database\Factories\EnqueteFactory> */
    use HasFactory;

    public function echange(){
        return $this->HasMany(Echange::class); 
    }
}
