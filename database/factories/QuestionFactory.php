<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Enquete;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Question>
 */
class QuestionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
           'type' => fake()->randomElement($array = array ('Ouvert','Fermée')),
            'intitule' => fake()->sentence($nbWords = 6, $variableNbWords = true),
            'ordre' =>fake()->randomDigit(), 
            'enquete_id'=>Enquete::InRandomOrder()->first()->id, 
        ];
    }
}
