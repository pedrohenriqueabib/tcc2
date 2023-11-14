<?php

namespace Database\Factories;

use App\Models\Evento;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Evento>
 */
class EventoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Evento::class;

    public function definition() : array
    {
        
        return [
            'nome' => $this->faker->realText($maxNbChars = 100),
            'descricao' => $this->faker->sentence(),
            'edicao'=> $this->faker->numerify('##'),
            'endereco' => $this->faker->streetName(),
            'site'=>$this->faker->safeEmailDomain(),
            'data_inicio'=>$this->faker->dateTime(),
            'data_fim'=>$this->faker->dateTime(),
        ];
    }
}
