<?php

namespace Database\Factories;

use App\Models\InscricaoEvento;
use App\Models\Evento;
use App\Models\Participante;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\InscricaoEvento>
 */
class InscricaoEventoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = InscricaoEvento::class;

    public function definition() : array
    {
        $existingParticipanteIds = Participante::pluck('id')->toArray();
        $existingEventoIds = Evento::pluck('id')->toArray();
        
        return [
            'evento_id' => $this->faker->randomElement($existingEventoIds),
            'participante_id' => $this->faker->randomElement($existingParticipanteIds),
        ];
    }
}
