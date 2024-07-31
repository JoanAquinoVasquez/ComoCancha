<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('analisis_interno', function (Blueprint $table) {
            $table->id('IdAnalisisInterno');
            $table->unsignedBigInteger('IdPlan');  // Asegúrate de que este es el mismo tipo de dato
            $table->text('Fortalezas');
            $table->text('Debilidades');
            $table->timestamps();

            $table->foreign('IdPlan')->references('IdPlan')->on('plan_estrategico')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('analisis_interno');
    }
};
