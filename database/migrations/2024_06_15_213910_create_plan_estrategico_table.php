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
        Schema::create('plan_estrategico', function (Blueprint $table) {
            $table->id('IdPlan');
            $table->string('Vision', 255);
            $table->string('Mision', 255);
            $table->text('Valores');
            $table->date('FechaCreacion');
            $table->string('Archivo', 255);
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
        Schema::dropIfExists('plan_estrategico');
    }
};
