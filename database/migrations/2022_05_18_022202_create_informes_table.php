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
        Schema::create('informes', function (Blueprint $table) {
            $table->id();
            $table->date('Fecha');
            $table->longText('comentario')->nullable();
            $table->enum('status',[1,2])->default(1);
            $table->unsignedBigInteger('usuario_id')->nullable();
            $table->unsignedBigInteger('turno_id')->nullable();


            $table->foreign('usuario_id')
            ->references('id')
            ->on('users')
            ->onDelete('set null');

            $table->foreign('turno_id')
            ->references('id')
            ->on('turnos')
            ->onDelete('set null');

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
        Schema::dropIfExists('informes');
    }
};