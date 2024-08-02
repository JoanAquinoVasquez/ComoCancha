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
            $table->string('email')->nullable();
            $table->string('direccion');
            $table->foreignId('distrito_id')->constrained('distrito');
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
