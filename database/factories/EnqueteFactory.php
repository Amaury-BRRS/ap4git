<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User; 

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Enquete>
 */
class EnqueteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'titre' => fake()->sentence(3),
            'public_cible' => fake()->randomElement(['Super Admin', 'Administrateur', 'Salarié']),
            'description'=>fake()->sentence(2), 
            'date_debut' => fake()->date(),
            'date_fin' => fake()->date(),
            'statut' => false,
            'user_id'=>User::InRandomOrder()->first()->id, 

        ];
    }
}
