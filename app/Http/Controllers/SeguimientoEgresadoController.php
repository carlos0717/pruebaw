<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Noticias;
use App\Models\Documentos;

class SeguimientoEgresadoController extends Controller
{
    public function index()
    {
        // Noticias más recientes (máximo 10) solo del área Seguimiento al Egresado
        $noticias = Noticias::where('area_origen', 'Seguimiento al Egresado')
            ->orderBy('fecha_publicacion', 'desc')
            ->take(10)
            ->get(['id', 'titulo', 'descripcion', 'imagen_path', 'area_origen', 'fecha_publicacion']);

        // Obtener IDs de categorías "Normativos" y "Requisitos"
        $categoriaNormativos = \App\Models\CategoriaDocumento::where('nombre', 'like', '%Normativo%')->first();
        $categoriaRequisitos = \App\Models\CategoriaDocumento::where('nombre', 'like', '%Requisito%')->first();

        // Documentos Normativos (máximo 10) solo del área Seguimiento al Egresado
        $documentosNormativos = $categoriaNormativos
            ? Documentos::where('categoria_id', $categoriaNormativos->id)
                ->where('area_origen', 'Seguimiento al Egresado')
                ->orderBy('created_at', 'desc')
                ->take(10)
                ->get(['id', 'titulo', 'path_archivo', 'formato', 'tamano_mb', 'categoria_id', 'area_origen'])
            : collect();

        // Documentos Requisitos (máximo 10) solo del área Seguimiento al Egresado
        $documentosRequisitos = $categoriaRequisitos
            ? Documentos::where('categoria_id', $categoriaRequisitos->id)
                ->where('area_origen', 'Seguimiento al Egresado')
                ->orderBy('created_at', 'desc')
                ->take(10)
                ->get(['id', 'titulo', 'path_archivo', 'formato', 'tamano_mb', 'categoria_id', 'area_origen'])
            : collect();

        return view('seguimiento-egresado', compact('noticias', 'documentosNormativos', 'documentosRequisitos'));
    }
}
