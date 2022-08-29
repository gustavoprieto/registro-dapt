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
        Schema::create('informe_turnos', function (Blueprint $table) {
            $table->unsignedBigInteger('informe_id');
            $table->unsignedBigInteger('turno_id');

            $table->foreign('informe_id')
            ->references('id')
            ->on('informes')
            ->ondelete('cascade');

            $table->foreign('turno_id')
            ->references('id')
            ->on('turnos')
            ->ondelete('cascade');
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
        Schema::dropIfExists('informe_turnos');
    }
};
