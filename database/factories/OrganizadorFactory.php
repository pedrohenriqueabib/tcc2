<?php

namespace Database\Factories;

use App\Models\Organizador;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Responsavel>
 */
class OrganizadorFactory extends Factory
{
     /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Organizador::class;

    public function definition() : array
    {
        //$selectedDays = $this->faker->randomElements(['SEG', 'TER', 'QUA','QUI', 'SEX', 'SAB', 'DOM'], $count = rand(1, 7));
        /*
        return [
            'nome' => 'Ana',
            'telefone' => '(21)99999-9999',
            'email'=> 'ana@ana.com',
            'cargo' => 'Testadora',
            'matricula'=>'1112223',
            
        ];
        */
        return [
            'nome' => fake('pt_BR')->name(),
            'telefone' => $this->faker->phoneNumber('########'),
            'email'=> $this->faker->email(),
            'cargo' => $this->faker->stateAbbr(),
            'matricula'=>$this->faker->numerify('#####'),
            'senha' => $this->faker->password()
            
        ];
        
    }
}
