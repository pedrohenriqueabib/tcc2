<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

use App\Models\Atividade;
use App\Models\AtividadeHorario;
use App\Models\Colaborador;
use App\Models\ColaboradorAtividade;
use App\Models\Comite;
use App\Models\ComiteOrganizador;
use App\Models\Evento;
use App\Models\Horario;
use App\Models\InscricaoAtividade;
use App\Models\InscricaoEvento;
use App\Models\Local;
use App\Models\Organizacao;
use App\Models\Organizador;
use App\Models\Participante;
use App\Models\Responsavel;

use Database\Seeders\AtividadeSeeder;
use Database\Seeders\AtividadeHorarioSeeder;
use Database\Seeders\ColaboradorSeeder;
use Database\Seeders\ComiteSeeder;
use Database\Seeders\ComiteOrganizadorSeeder;
use Database\Seeders\EventoSeeder;
use Database\Seeders\HorarioSeeder;
use Database\Seeders\InscricaoAtividadeSeeder;
use Database\Seeders\InscricaoEventoSeeder;
use Database\Seeders\LocalSeeder;
use Database\Seeders\OrganizacaoSeeder;
use Database\Seeders\OrganizadorSeeder;
use Database\Seeders\ParticipanteSeeder;
use Database\Seeders\ResponsavelSeeder;



class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        Schema::disableForeignKeyConstraints();
            Atividade::truncate();
            AtividadeHorario::truncate();
            ColaboradorAtividade::truncate();
            Colaborador::truncate();
            Comite::truncate();
            ComiteOrganizador::truncate();
            Evento::truncate();
            Horario::truncate();
            InscricaoAtividade::truncate();
            InscricaoEvento::truncate();
            Local::truncate();
            Organizacao::truncate();
            Organizador::truncate();
            Participante::truncate();
            Responsavel::truncate();
        Schema::enableForeignKeyConstraints();

        $this->call([
            OrganizadorSeeder::class,
            ResponsavelSeeder::class,
            ParticipanteSeeder::class,
            ColaboradorSeeder::class,
            LocalSeeder::class,
            EventoSeeder::class, 
            HorarioSeeder::class,

            OrganizacaoSeeder::class,
            ComiteSeeder::class, 
            ComiteOrganizadorSeeder::class,
            AtividadeSeeder::class,
            AtividadeHorarioSeeder::class,
            ColaboradorAtividadeSeeder::class,
            InscricaoAtividadeSeeder::class,
            InscricaoEventoSeeder::class,
            
        ]);
    }
}
