<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User; // Asegúrate de importar el modelo User


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // Crear roles base si no existen
        $roles = [
            ['nombre' => 'Administrador', 'descripcion' => 'Administrador del sistema'],
            ['nombre' => 'Encargado de RSU', 'descripcion' => 'Encargado de Responsabilidad Social Universitaria'],
            ['nombre' => 'Encargado de PS', 'descripcion' => 'Encargado de Proyección Social'],
            ['nombre' => 'Encargado de SCE', 'descripcion' => 'Encargado de Seguimiento al Egresado'],
            ['nombre' => 'Encargado de EU', 'descripcion' => 'Encargado de Extensión Universitaria'],
        ];
        $roleIds = [];
        foreach ($roles as $rol) {
            $role = \App\Models\Roles::firstOrCreate(['nombre' => $rol['nombre']], $rol);
            $roleIds[$rol['nombre']] = $role->id;
        }        

        //llamar al seeder de Direcciones
        $this->call(\Database\Seeders\DireccionesSeeder::class);

        // Obtener IDs de direcciones por nombre
        $direcciones = [
            'Responsabilidad Social' => \App\Models\Direccion::where('nombre', 'Responsabilidad Social')->value('id'),
            'Proyeccion Social' => \App\Models\Direccion::where('nombre', 'Proyeccion Social')->value('id'),
            'Seguimiento y Certificacion al Egresado' => \App\Models\Direccion::where('nombre', 'Seguimiento y Certificacion al Egresado')->value('id'),
            'Extension Universitaria' => \App\Models\Direccion::where('nombre', 'Extension Universitaria')->value('id'),
        ];        

        // Verificar y crear usuario administrador (sin dirección)
        if (!User::where('email', 'admin@example.com')->exists()) {
            User::create([
                'nombres' => 'Admin',
                'apellidos' => 'User',
                'email' => 'admin@example.com',
                'password' => Hash::make('12345'),
                'role_id' => $roleIds['Administrador'],
                'direccion_id' => null,
            ]);
            $this->command->info('Usuario administrador creado exitosamente.');
        }

        // Verificar y crear usuario para Encargado de RSU
        if (!User::where('email', 'rsu@example.com')->exists()) {
            User::create([
                'nombres' => 'Usuario',
                'apellidos' => 'RSU',
                'email' => 'rsu@example.com',
                'password' => Hash::make('12345'),
                'role_id' => $roleIds['Encargado de RSU'],
                'direccion_id' => $direcciones['Responsabilidad Social'],
            ]);
            $this->command->info('Usuario Encargado de RSU creado exitosamente.');
        }

        // Verificar y crear usuario para Encargado de PS
        if (!User::where('email', 'ps@example.com')->exists()) {
            User::create([
                'nombres' => 'Usuario',
                'apellidos' => 'PS',
                'email' => 'ps@example.com',
                'password' => Hash::make('12345'),
                'role_id' => $roleIds['Encargado de PS'],
                'direccion_id' => $direcciones['Proyeccion Social'],
            ]);
            $this->command->info('Usuario Encargado de PS creado exitosamente.');
        }

        // Verificar y crear usuario para Encargado de SCE
        if (!User::where('email', 'sec@example.com')->exists()) {
            User::create([
                'nombres' => 'Usuario',
                'apellidos' => 'SCE',
                'email' => 'sce@example.com',
                'password' => Hash::make('12345'),
                'role_id' => $roleIds['Encargado de SCE'],
                'direccion_id' => $direcciones['Seguimiento y Certificacion al Egresado'],
            ]);
            $this->command->info('Usuario Encargado de SCE creado exitosamente.');
        }

        // Verificar y crear usuario para Encargado de EU
        if (!User::where('email', 'eu@example.com')->exists()) {
            User::create([
                'nombres' => 'Usuario',
                'apellidos' => 'EU',
                'email' => 'eu@example.com',
                'password' => Hash::make('12345'),
                'role_id' => $roleIds['Encargado de EU'],
                'direccion_id' => $direcciones['Extension Universitaria'],
            ]);
            $this->command->info('Usuario Encargado de EU creado exitosamente.');
        }
        
        //llamar al seeder de Objetivos de Desarrollo Sostenible
        $this->call(ObjetivosDesarrolloSostenibleSeeder::class);
        //llamar al seeder de Facultades
        $this->call(FacultadesSeeder::class);
        //llamar al seeder de Estudiantes
        $this->call(EstudiantesSeeder::class);
        //llamar al seeder de Docentes 
        $this->call(DocentesSeeder::class);
        //llamar al seeder de CategoriaDocumento
        $this->call(CategoriaDocumentoSeeder::class);
        // Seeders para tablas solicitadas
        $this->call(\Database\Seeders\InstitucionTiposSeeder::class);
        $this->call(\Database\Seeders\EstadosSeeder::class);
        $this->call(\Database\Seeders\InstitucionesSeeder::class);
        
    }
}
