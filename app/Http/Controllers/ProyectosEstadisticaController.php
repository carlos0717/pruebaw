<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proyectos;

class ProyectosEstadisticaController extends Controller
{
    /**
     * Muestra la tarjeta estadística de proyectos por estado.
     */
    public function proyectosPorEstado()
    {
        // Obtener el total de proyectos
        $total = Proyectos::count();

        // Contar proyectos por estado
        $aprobados = Proyectos::where('estado', 'Aprobado')->count();
        $enCurso = Proyectos::where('estado', 'En Curso')->count();
        $rechazados = Proyectos::where('estado', 'Rechazado')->count();
        $finalizados = Proyectos::where('estado', 'Finalizado')->count();

        // Pasar los datos a la vista
        return view('components.users-by-age-card', [
            'total' => $total,
            'aprobados' => $aprobados,
            'enCurso' => $enCurso,
            'rechazados' => $rechazados,
            'finalizados' => $finalizados,
        ]);
    }
}
