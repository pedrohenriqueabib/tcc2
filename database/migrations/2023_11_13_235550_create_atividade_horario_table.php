<?php

use App\Models\Atividade;
use App\Models\Horario;
use App\Models\Local;

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
        Schema::create('atividade_horario', function (Blueprint $table) {
            $table->id();
            
            $table->foreignIdFor(Atividade::class);
            $table->foreignIdFor(Horario::class);
            $table->foreignIdFor(Local::class);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('atividade_horario');
    }
};
