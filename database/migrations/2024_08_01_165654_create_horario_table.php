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
            $table->id();
            $table->string('dia');
            $table->time('hora_inicio');
            $table->time('hora_fin');
            $table->foreignId('cancha_id')->constrained('cancha');
            $table->foreignId('user_id')->constrained('user');
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
