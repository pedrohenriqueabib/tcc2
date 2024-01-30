<?php

namespace Database\Factories;

use App\Models\Participante;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Participante>
 */
class ParticipanteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Participante::class;

    public function definition() : array
    {
        return [
            'nome' => fake('pt_BR')->name(),
            'telefone' => $this->faker->phoneNumber('########'),
            'email'=> $this->faker->email(),
            'password' => $this->faker->password()
        ];
    }
}
