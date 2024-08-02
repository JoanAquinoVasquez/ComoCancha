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
        schema::create('pago', function (Blueprint $table) {
            $table->unsignedBigInteger('id')->primary();
            $table->string('monto');
            $table->timestamp('fecha');
            $table->string('metodo')->nullable();
            $table->boolean('estado');
            $table->foreignId('reserva_id')->constrained('reserva');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pago');
    }
};
