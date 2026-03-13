<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Enquete;
use App\Models\Participant;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Echange>
 */
class EchangeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            // type d'échange (type de contact)
            'type' => fake()->randomElement(['email', 'téléphone', 'visio']),

            // date du contact
            'date_de_contact' => fake()->date(),

            // clé étrangère vers users.id
            // ici on crée un user fictif si aucun n'existe encore,
            // ou on en réutilise un selon l'appel de la factory
            'user_id' => User::factory(),
            'enquete_id'=>Enquete::InRandomOrder()->first()->id, 
            'participant_id'=>Participant::InRandomOrder()->first()->id, 

        ];
    }
}
