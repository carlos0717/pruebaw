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
        Schema::create('documentos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('titulo', 255);
            $table->string('path_archivo', 255)->unique()->comment('Ruta física del archivo en el servidor.');
            $table->string('formato', 10)->default('PDF');
            $table->decimal('tamano_mb', 8, 2)->comment('Tamaño del archivo en Megabytes.');
            $table->unsignedBigInteger('categoria_id')->comment('Ej: Normativa, Resolución, Requisito, Convenio Escaneado.');
            $table->unsignedBigInteger('user_id')->comment('Usuario que cargó el documento.');
            $table->timestamps();
            
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('categoria_id')->references('id')->on('categorias_documentos');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('documentos');
    }
};
