<?php

use App\Models\Evento;
use App\Models\Participante;

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inscricao_evento', function (Blueprint $table) {
            $table->id();

            $table->foreignIdFor(Participante::class);
            $table->foreignIdFor(Evento::class);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inscricao_evento');
    }
};
