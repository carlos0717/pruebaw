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
        Schema::table('documentos', function (Blueprint $table) {
            $table->enum('area_origen', ['RSU', 'Seguimiento al Egresado', 'Proyeccion Social', 'Extension Universitaria'])
                ->nullable()
                ->after('user_id')
                ->comment('Identifica el área que publica la noticia.');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('documentos', function (Blueprint $table) {
            $table->dropColumn('area_origen');
        });
    }
};
