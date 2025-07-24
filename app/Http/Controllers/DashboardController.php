<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Obtener el total de proyectos
        $total = \App\Models\Proyectos::count();

        // Contar proyectos por estado
        $aprobados = \App\Models\Proyectos::where('estado', 'Aprobado')->count();
        $enCurso = \App\Models\Proyectos::where('estado', 'En Curso')->count();
        $rechazados = \App\Models\Proyectos::where('estado', 'Rechazado')->count();
        $finalizados = \App\Models\Proyectos::where('estado', 'Finalizado')->count();

        return view('dashboard', [
            'total' => $total,
            'aprobados' => $aprobados,
            'enCurso' => $enCurso,
            'rechazados' => $rechazados,
            'finalizados' => $finalizados,
        ]);
    }

    public function overview1()
    {
        return view('overview1');
    }

    public function overview2()
    {
        return view('overview2');
    }
}
