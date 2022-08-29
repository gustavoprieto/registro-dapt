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
        Schema::create('informeables', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('estado_id');
            $table->unsignedBigInteger('equipo_id');
            $table->unsignedBigInteger('tipoequipo_id');
            $table->unsignedBigInteger('informe_id');
            $table->enum('status', [1,2])->default(1);
            $table->longText('comentario')->nullable();
            
            $table->foreign('estado_id')
            ->references('id')
            ->on('estados');

            $table->foreign('tipoequipo_id')
            ->references('id')
            ->on('tipo_equipos');
            
            $table->foreign('equipo_id')
            ->references('id')
            ->on('equipos');

            $table->foreign('informe_id')
            ->references('id')
            ->on('informes')
            ->delete('cascade');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('informeables');
    }
};