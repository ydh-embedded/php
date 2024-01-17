<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class SongFactory extends Factory {
    public function definition(): array{
        return [
                    'title' => $this->faker->realText($maxNbChars = 10, $indexSize = 2),
                    'band'  => $this->faker->realText($maxNbChars = 10, $indexSize = 2),
                                //
        ];
    }
}
