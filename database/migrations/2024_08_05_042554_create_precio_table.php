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
        Schema::create('precio', function (Blueprint $table) {
            $table->id();
            $table->string('turno');
            $table->decimal('amount', 8, 2);
            $table->foreignId('cancha_id')->constrained('cancha');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('precio');
    }
};
