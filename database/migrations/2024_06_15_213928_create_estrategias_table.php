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
        Schema::create('estrategias', function (Blueprint $table) {
            $table->id('IdEstrategia');
            $table->unsignedBigInteger('IdPlan'); // Asegúrate de que este es el mismo tipo de dato y nombre

            $table->string('Descripcion', 255);
            $table->string('Responsable', 255);
            $table->text('Recursos');
            $table->date('FechaInicio');
            $table->date('FechaFin');
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
        Schema::dropIfExists('estrategias');
    }
};
