<?php

namespace Database\Factories;

use App\Models\Horario;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Horario>
 */
class HorarioFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Horario::class;

    public function definition() : array
    {
        return [
            'inicio' => $this->faker->dateTime(),
            'fim' => $this->faker->dateTime(),
            'dia_semana'=> fake()->randomElement(['DOM','SEG','TER','QUA','QUI','SEX','SAB']),
            'carga_horaria' => $this->faker->randomDigit(),
            
        ];
    }
}
