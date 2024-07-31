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
        Schema::create('analisis_externo', function (Blueprint $table) {
            $table->id('IdAnalisisExterno');
            $table->unsignedBigInteger('IdPlan');  // Asegúrate de que este tipo de dato coincide

            $table->text('Oportunidades');
            $table->text('Amenazas');
            $table->timestamps();

            // Asegúrate de que el nombre de la clave foránea coincida con el nombre de la clave primaria en la tabla referenciada
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
        Schema::dropIfExists('analisis_externo');
    }
};
