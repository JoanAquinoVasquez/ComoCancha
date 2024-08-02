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
        schema::create('horario', function (Blueprint $table) {
            $table->unsignedBigInteger('id')->primary();
            $table->string('dia');
            $table->time('hora_inicio');
            $table->time('hora_fin');
            $table->foreignId('id_cancha')->constrained('cancha');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        schema::dropIfExists('horario');
    }
};
