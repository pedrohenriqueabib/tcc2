<?php

namespace Database\Factories;

use App\Models\Comite;
use App\Models\Organizacao;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comite>
 */
class ComiteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Comite::class;

    public function definition() : array
    {
        $existingOrganizacaoIds = Organizacao::pluck('id')->toArray();
        return [
            'nome' => $this->faker->realText($maxNbChars = 100),
            'descricao' => $this->faker->sentence(),
            'organizacao_id' => $this->faker->randomElement($existingOrganizacaoIds),
        ];
    }
}
