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
        Schema::create('presupuesto', function (Blueprint $table) {
            $table->id('IdPresupuesto');
            $table->unsignedBigInteger('IdPlan'); // Asegúrate de que este es el mismo tipo de dato y nombre

            $table->decimal('MontoTotal', 15, 2);
            $table->date('FechaAprobacion');
            $table->text('Detalle');
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
        Schema::dropIfExists('presupuesto');
    }
};
