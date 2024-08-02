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
            $table->unsignedBigInteger('id')->primary();
            $table->string('tipo');
            $table->string('ubicacion');
            $table->string('precioporhora');
            $table->string('descripcion');
            $table->foreignId('id_cliente')->constrained('cliente');
            $table->foreignId('id_deporte')->constrained('deporte');
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
