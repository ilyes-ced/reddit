<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Sub>
 */
class SubFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'owner_id' => fake()->randomDigitNot(0),
            'name' => fake()->name(),
            'description' => fake()->paragraph($nbSentences = 3, $variableNbSentences = true),
            'number_of_members' => fake()->numberBetween($min = 1, $max = 1000000),
            'images' => json_encode(['pic1.jpg','pic3.jpg']),
            'created_at'=>now(),
            'updated_at'=>now(),
        ];
    }
}
