<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\FormulaireReponse; 
use App\Models\Enquete; 
use App\Models\Participant; 

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Reponse>
 */
class ReponseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'date_reponse' =>fake()->date(),
            'statut' =>fake()->randomElement($array = array ('0','1')),
            // 'reponse_id'=>Reponse::InRandomOrder()->first()->id, 
            'enquete_id'=>Enquete::InRandomOrder()->first()->id, 
            'participant_id'=>Participant::InRandomOrder()->first()->id, 
            'formulaire_reponse_id'=>FormulaireReponse::InRandomOrder()->first()->id, 

        ];
    }
}
