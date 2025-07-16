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
        Schema::create('convenios', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 255); // Nombre del convenio
            $table->text('descripcion')->nullable(); // Descripción detallada
            $table->foreignId('institucion_id')->constrained('instituciones')->onDelete('restrict');           
            $table->string('documento_nombre')->nullable(); // Columna para el nombre del archivo pdf
            $table->string('documento_escaneado_path')->nullable(); // Columna para la ruta del archivo pdf
            $table->date('fecha_inicio')->nullable();
            $table->date('fecha_fin')->nullable();
            $table->foreignId('estado_id')->constrained('estados')->onDelete('restrict');
            $table->text('observaciones')->nullable();
            $table->timestamps();

            // Índices para mejorar rendimiento
            $table->index(['institucion_id', 'estado_id']);
            $table->index('fecha_inicio');
            $table->index('fecha_fin');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('convenios');
    }
};
