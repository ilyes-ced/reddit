<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Thread>
 */
class PostFactory extends Factory
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
            'sub_id' => fake()->randomDigitNot(0),
            'content' => json_encode(['title'=>'big title','body'=>fake()->paragraph($nbSentences = 3, $variableNbSentences = true),'images'=>[fake()->randomElement($array = array ('pic16.jpg','pic15.jpg','pic14.jpg','pic13.jpg','pic12.jpg','pic11.jpg','pic10.jpg','pic9.jpg','pic8.jpg','pic7.jpg','pic6.jpg','pic5.jpg','pic4.jpg','pic3.jpg','pic2.jpg','pic1.jpg')),fake()->randomElement($array = array ('pic16.jpg','pic15.jpg','pic14.jpg','pic13.jpg','pic12.jpg','pic11.jpg','pic10.jpg','pic9.jpg','pic8.jpg','pic7.jpg','pic6.jpg','pic5.jpg','pic4.jpg','pic3.jpg','pic2.jpg','pic1.jpg')),fake()->randomElement($array = array ('pic16.jpg','pic15.jpg','pic14.jpg','pic13.jpg','pic12.jpg','pic11.jpg','pic10.jpg','pic9.jpg','pic8.jpg','pic7.jpg','pic6.jpg','pic5.jpg','pic4.jpg','pic3.jpg','pic2.jpg','pic1.jpg'))]]),
            'heat' => fake()->numberBetween($min = 1, $max = 2000),
            'created_at'=>now(),
            'updated_at'=>now(),
        ];
    }
}


