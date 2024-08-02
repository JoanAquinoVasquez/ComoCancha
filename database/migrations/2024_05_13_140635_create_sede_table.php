<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        schema::create('sede', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->integer('telefono')->nullable();
            $table->string('correo')->nullable();
            $table->string('departamento');
            $table->string('provincia');
            $table->string('distrito');
            $table->string('direccion');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sede');
    }
};
