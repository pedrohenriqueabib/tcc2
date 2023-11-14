<?php

namespace Database\Factories;

use App\Models\Atividade;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Atividade>
 */
class AtividadeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Atividade::class;

    public function definition() : array
    {
        
        return [
            'nome' => $this->faker->realText($maxNbChars = 100),
            'descricao' => $this->faker->sentence(),
            'palavras_chaves'=> $this->faker->words(5, true),
            'area' => $this->faker->realText($maxNbChars = 20),
            'subarea'=>$this->faker->realText($maxNbChars = 20),
            'carga_horaria'=>$this->faker->numerify('##'),
            
        ];
    }
}
