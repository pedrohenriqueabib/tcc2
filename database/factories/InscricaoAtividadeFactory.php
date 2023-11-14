<?php

namespace Database\Factories;

use App\Models\InscricaoAtividade;
use App\Models\Atividade;
use App\Models\Participante;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\InscricaoAtividade>
 */
class InscricaoAtividadeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = InscricaoAtividade::class;

    public function definition() : array
    {
        $existingParticipanteIds = Participante::pluck('id')->toArray();
        $existingAtividadeIds = Atividade::pluck('id')->toArray();
        
        return [
            'atividade_id' => $this->faker->randomElement($existingAtividadeIds),
            'participante_id' => $this->faker->randomElement($existingParticipanteIds),
        ];
    }
}
