<?php

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
        Schema::create('evento', function (Blueprint $table) {
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_unicode_ci';
            
            $table->id();
            $table->string('nome', 100);
            $table->string('descricao', 300);
            $table->string('edicao', 100);
            $table->string('endereco', 200);
            $table->string('site', 200);
            $table->date('data_inicio')->default(date("Y-m-d H:i:s"));
            $table->date('data_fim')->default(date("Y-m-d H:i:s"));
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('evento');
    }
};
