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
        Schema::create('reserva', function (Blueprint $table) {
            $table->unsignedBigInteger('id')->primary();
            $table->timestamp('fecha_reserva');
            $table->timestamp('hora_inicio');
            $table->timestamp('hora_fin');
            $table->string('estado');
            $table->foreignId('id_cliente')->constrained('cliente');
            $table->foreignId('id_cancha')->constrained('cancha');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reserva');
    }
};
?>
