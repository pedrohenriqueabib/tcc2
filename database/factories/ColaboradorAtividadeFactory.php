<?php

namespace Database\Factories;

use App\Models\ColaboradorAtividade;
use App\Models\Atividade;
use App\Models\Colaborador;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ColaboradorAtividade>
 */
class ColaboradorAtividadeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = ColaboradorAtividade::class;

    public function definition() : array
    {
        $existingColaboradorIds = Colaborador::pluck('id')->toArray();
        $existingAtividadeIds = Atividade::pluck('id')->toArray();
        
        return [
            'atividade_id' => $this->faker->randomElement($existingAtividadeIds),
            'colaborador_id' => $this->faker->randomElement($existingColaboradorIds),
        ];
    }
}
