<?php

namespace Database\Factories;

use App\Models\ComiteOrganizador;
use App\Models\Comite;
use App\Models\Organizador;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ComiteOrganizador>
 */
class ComiteOrganizadorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = ComiteOrganizador::class;

    public function definition() : array
    {
        $existingComiteIds = Comite::pluck('id')->toArray();
        $existingOrganizadorIds = Organizador::pluck('id')->toArray();
        
        return [
            'comite_id' => $this->faker->randomElement($existingComiteIds),
            'organizador_id' => $this->faker->randomElement($existingOrganizadorIds),
        ];
    }
}
