<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\Colaborador;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Colaborador>
 */
class ColaboradorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Colaborador::class;

    public function definition()
    {
        return [
            'nome' => fake('pt_BR')->name(),
            'telefone' => $this->faker->phoneNumber('########'),
            'email'=> $this->faker->email(),
            'descricao' => $this->faker->sentence(),
        ];
    }
}
