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
        schema::create('cancha', function (Blueprint $table) {
            $table->id();
            $table->string('tipo'); // Fútbol, Baloncesto, Voleibol, etc.
            $table->string('direccion');
            $table->string('descripcion'); // Características de la cancha, como si tiene césped artificial, si es techada, etc.
            $table->foreignId('deporte_id')->constrained('deporte');
            $table->foreignId('sede_id')->constrained('sede');
            $table->foreignId('user_id')->constrained('users');
            $table->integer('estado')->default(0); // 0: Disponible, 1: Ocupada, 2: En mantenimiento, 3: No disponible
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cancha');
    }
};
