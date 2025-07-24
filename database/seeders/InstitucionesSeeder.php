<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InstitucionesSeeder extends Seeder
{
    public function run(): void
    {
        // Obtener los tipos de institucion
        $tipos = DB::table('institucion_tipos')->pluck('id', 'nombre');

        $instituciones = [
            ['nombre' => 'Comunidad Andina', 'institucion_tipo_id' => $tipos['Comunidad'] ?? 1, 'descripcion' => 'Comunidad rural andina', 'activo' => true],
            ['nombre' => 'Centro Poblado San Juan', 'institucion_tipo_id' => $tipos['Centro Poblado'] ?? 2, 'descripcion' => 'Centro poblado en la sierra', 'activo' => true],
            ['nombre' => 'Municipalidad Distrital de Surco', 'institucion_tipo_id' => $tipos['Municipalidad Distrital'] ?? 3, 'descripcion' => 'Municipalidad de Surco', 'activo' => true],
            ['nombre' => 'Empresa Agroindustrial', 'institucion_tipo_id' => $tipos['Empresa'] ?? 4, 'descripcion' => 'Empresa dedicada a la agroindustria', 'activo' => true],
            ['nombre' => 'Municipalidad Provincial de Lima', 'institucion_tipo_id' => $tipos['Municipalidad Provincial'] ?? 5, 'descripcion' => 'Municipalidad de Lima', 'activo' => true],
            ['nombre' => 'Comunidad Amazónica', 'institucion_tipo_id' => $tipos['Comunidad'] ?? 1, 'descripcion' => 'Comunidad en la selva', 'activo' => true],
            ['nombre' => 'Centro Poblado El Sol', 'institucion_tipo_id' => $tipos['Centro Poblado'] ?? 2, 'descripcion' => 'Centro poblado costero', 'activo' => true],
            ['nombre' => 'Municipalidad Distrital de Miraflores', 'institucion_tipo_id' => $tipos['Municipalidad Distrital'] ?? 3, 'descripcion' => 'Municipalidad de Miraflores', 'activo' => true],
            ['nombre' => 'Empresa Pesquera', 'institucion_tipo_id' => $tipos['Empresa'] ?? 4, 'descripcion' => 'Empresa dedicada a la pesca', 'activo' => true],
            ['nombre' => 'Municipalidad Provincial de Arequipa', 'institucion_tipo_id' => $tipos['Municipalidad Provincial'] ?? 5, 'descripcion' => 'Municipalidad de Arequipa', 'activo' => true],
        ];

        foreach ($instituciones as $institucion) {
            DB::table('instituciones')->updateOrInsert([
                'nombre' => $institucion['nombre']
            ], $institucion);
        }
    }
}
