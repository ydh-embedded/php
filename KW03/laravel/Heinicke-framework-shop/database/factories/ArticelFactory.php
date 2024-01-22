<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Articel>
 */
class ArticelFactory extends Factory
{
    public function definition(): array{
        return [
                    'ArticName'         =>  $this->faker->realText($maxNbChars = 10 , $indexSize = 1),
                    'ArticName_id_ref'  =>  $this->faker->numberBetween(1,20),
                    'ArticContent'      =>  $this->faker->realText($maxNbChars = 20 , $indexSize = 2),
                    'ArticDescription'  =>  $this->faker->realText($maxNbChars = 69 , $indexSize = 3),
                    'ArticPicture'      =>  $this->faker->realText($maxNbChars = 22 , $indexSize = 2),
                    'ArticThumbnail'    =>  $this->faker->realText($maxNbChars = 22 , $indexSize = 2),
        ];
    }
}
