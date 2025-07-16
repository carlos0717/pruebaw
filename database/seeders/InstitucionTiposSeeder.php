<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InstitucionTiposSeeder extends Seeder
{
    public function run(): void
    {
        $tipos = [
            ['nombre' => 'Comunidad', 'descripcion' => 'Comunidad rural'],
            ['nombre' => 'Centro Poblado', 'descripcion' => 'Centro poblado rural'],
            ['nombre' => 'Municipalidad Distrital', 'descripcion' => 'Municipalidad de distrito'],
            ['nombre' => 'Empresa', 'descripcion' => 'Empresa privada'],
            ['nombre' => 'Municipalidad Provincial', 'descripcion' => 'Municipalidad de provincia'],
        ];

        foreach ($tipos as $tipo) {
            DB::table('institucion_tipos')->updateOrInsert(
                ['nombre' => $tipo['nombre']],
                $tipo
            );
        }
    }
}
