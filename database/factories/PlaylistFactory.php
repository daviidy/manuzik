<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PlaylistFactory extends Factory
{
    public function definition()
    {
        return [
            'title' => $this->faker->unique()->sentence(3),
        ];
    }
}
