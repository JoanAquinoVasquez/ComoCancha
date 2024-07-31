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
        Schema::create('indicadores', function (Blueprint $table) {
            $table->id('IdIndicador');
            $table->unsignedBigInteger('IdPlan'); // Asegúrate de que este es el mismo tipo de dato y nombre

            $table->string('Descripcion', 255);
            $table->float('ValorMeta');
            $table->float('ValorActual');
            $table->date('FechaMedicion');
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
        Schema::dropIfExists('indicadores');
    }
};
