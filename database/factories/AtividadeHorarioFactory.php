<?php

namespace Database\Factories;

use App\Models\AtividadeHorario;
use App\Models\Atividade;
use App\Models\Horario;
use App\Models\Local;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\AtividadeHorario>
 */
class AtividadeHorarioFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = AtividadeHorario::class;
 
    public function definition() : array
    {
        $existingAtividadeIds = Atividade::pluck('id')->toArray();
        $existingHorarioIds = Horario::pluck('id')->toArray();
        $existingLocalIds = Local::pluck('id')->toArray();

        return [
            'atividade_id' => $this->faker->randomElement($existingAtividadeIds),
            'horario_id' => $this->faker->randomElement($existingHorarioIds),
            'local_id' => $this->faker->randomElement($existingLocalIds),
        ];
    }
}
