<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EstadosSeeder extends Seeder
{
    public function run(): void
    {
        $estados = [
            ['nombre' => 'Vigente', 'descripcion' => 'Estado vigente', 'color' => '#28a745', 'activo' => true],
            ['nombre' => 'En Proceso', 'descripcion' => 'Estado en proceso', 'color' => '#ffc107', 'activo' => true],
            ['nombre' => 'Caducado', 'descripcion' => 'Estado caducado', 'color' => '#dc3545', 'activo' => true],
        ];

        foreach ($estados as $estado) {
            DB::table('estados')->updateOrInsert([
                'nombre' => $estado['nombre']
            ], $estado);
        }
    }
}
