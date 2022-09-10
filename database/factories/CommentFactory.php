<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'content' => fake()->paragraph($nbSentences = 3, $variableNbSentences = true),
            'owner_id' => fake()->randomDigitNot(0),
            'post_id' => fake()->randomDigitNot(0),
            'parent_comment_id' => 0,
            'level' => fake()->numberBetween($min = 1, $max = 10),
            'heat' => fake()->numberBetween($min = 1, $max = 2000),
            'created_at'=>now(),
            'updated_at'=>now(),
        ];
    }
}
