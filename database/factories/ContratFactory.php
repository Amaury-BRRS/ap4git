<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Etablissement;
use App\Models\Formation;
use App\Models\Participant;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Contrat>
 */
class ContratFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'date_debut' =>fake()->date(),
            'date_fin' =>fake()->date(),
            'etablissement_id'=>Etablissement::InRandomOrder()->first()->id, 
            'formation_id'=>Formation::InRandomOrder()->first()->id, 
            // 'participant_id'=>null, 
        ];
    }
}
