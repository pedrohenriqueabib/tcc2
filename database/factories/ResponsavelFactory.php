<?php

namespace Database\Factories;

use App\Models\Responsavel;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Responsavel>
 */
class ResponsavelFactory extends Factory
{
     /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Responsavel::class;

    public function definition() : array
    {
        return [
            'nome' => fake('pt_BR')->name(),
            'telefone' => $this->faker->phoneNumber('########'),
            'email'=> $this->faker->email(),
            'cargo' => $this->faker->stateAbbr(),
            'matricula'=>$this->faker->numerify('#####'),
            
        ];
    }
}
