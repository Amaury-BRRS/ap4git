<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Enquete;
use App\Models\Participant;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * Factory pour générer des données fictives d'échanges
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Echange>
 */
class EchangeFactory extends Factory
{
    /**
     * Définition des attributs par défaut pour un échange fictif
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            // Type d'échange (type de contact)
            'type' => fake()->randomElement(['email', 'téléphone', 'visio']),

            // Date du contact (date aléatoire)
            'date_de_contact' => fake()->date(),

            // Clé étrangère vers users.id (utilisateur qui fait l'échange)
            'user_id' => User::factory(),

            // Clé étrangère vers enquetes.id (enquête concernée)
            'enquete_id'=>Enquete::InRandomOrder()->first()->id, 

            // Clé étrangère vers participants.id (participant concerné)
            'participant_id'=>Participant::InRandomOrder()->first()->id, 
        ];
    }
}
