<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Noticias;

class HomeController extends Controller
{
    public function index()
    {
        // Obtener las 8 noticias/eventos más recientes, sin filtración por área
        $noticias = Noticias::orderByDesc('fecha_publicacion')
            ->take(8)
            ->get(['id', 'titulo', 'descripcion', 'imagen_path', 'area_origen', 'fecha_publicacion']);

        // Puedes agregar más datos para la home si lo requieres
        return view('home', compact('noticias'));
    }
}
