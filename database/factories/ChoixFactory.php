<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Question;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Choix>
 */
class ChoixFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
             'liste_choix' =>fake()->sentence($nbWords = 6, $variableNbWords = true),
            'question_id'=>Question::InRandomOrder()->first()->id, 
        ];
    }
}
