<?php

namespace Database\Factories;

use App\Models\Organizacao;
use App\Models\Evento;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Organizacao>
 */
class OrganizacaoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Organizacao::class;

    public function definition() : array
    {
        $existingEventoIds = Evento::pluck('id')->toArray();

        return [
            'nome' => $this->faker->word(),
            'evento_id' => $this->faker->randomElement($existingEventoIds),
        ];
    }
}
