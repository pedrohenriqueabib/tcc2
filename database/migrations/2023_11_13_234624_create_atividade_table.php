<?php

use App\Models\Evento;
use App\Models\Responsavel;

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
        Schema::create('atividade', function (Blueprint $table) {
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_unicode_ci';
            
            $table->id();
            $table->string('nome', 100);
            $table->string('descricao', 300);
            $table->string('palavras_chaves', 100);
            $table->string('area', 100);
            $table->string('subarea', 100);
            $table->integer('carga_horaria');
            
            $table->foreignIdFor(Evento::class);
            $table->foreignIdFor(Responsavel::class);
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('atividade');
    }
};
