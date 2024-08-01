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
            $table->string('tipo');
            $table->string('ubicacion');
            $table->string('precioporhora');
            $table->string('descripcion');
            $table->foreignId('cliente_id')->constrained('cliente');
            $table->foreignId('deporte_id')->constrained('deporte');
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
