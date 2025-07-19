<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Direccion;

class DireccionesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $direcciones = [
            ['nombre' => 'Responsabilidad Social', 'descripcion' => null],
            ['nombre' => 'Proyeccion Social', 'descripcion' => null],
            ['nombre' => 'Seguimiento y Certificacion al Egresado', 'descripcion' => null],
            ['nombre' => 'Extension Universitaria', 'descripcion' => null],
        ];

        foreach ($direcciones as $direccion) {
            Direccion::firstOrCreate(['nombre' => $direccion['nombre']], $direccion);
        }
    }
}
