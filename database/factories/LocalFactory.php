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
            'nome' => $this->faker->word(),
            'pavimento' => $this->faker->word(2, true),
            'bloco'=> $this->faker->word(), 
        ];
    }
}
