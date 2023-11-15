<?php

namespace Database\Factories;

use App\Models\Local;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Local>
 */
class LocalFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Local::class;

    public function definition() : array
    {
        
        return [
            'nome' => $this->faker->realText($maxNbChars = 30),
            'pavimento' => $this->faker->realText($maxNbChars = 15),
            'bloco'=> $this->faker->realText($maxNbChars = 10),
        ];
    }
}
