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
        Schema::create('rutas_hechas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('vehiculo_id')->constrained('vehiculos')->onDelete('cascade');
            $table->foreignId('conductor_id')->constrained('conductores')->onDelete('cascade');
            $table->integer('kms')->default(0);
            $table->string('destino')->nullable();
            $table->string('objetivo')->nullable();
            $table->string('horasalida');
            $table->string('regresoaprox');
            $table->string('horallegada');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rutas_hechas');
    }
};
