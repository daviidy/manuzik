<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class MusicFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->word,
            'artist' => $this->faker->name,
            'album' => $this->faker->word,
            'year' => $this->faker->year,
            'genre' => $this->faker->word,
            'notation' => $this->faker->numberBetween(0, 5),
            'image' => null,
        ];
    }
}
