<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
//
use App\Models\Noticias;
use App\Models\Documentos;

class ResponsabilidadSocialController extends Controller
{
    //
    public function index()
    {
        // Noticias más recientes (máximo 10) solo del área RSU
        $noticias = Noticias::where('area_origen', 'RSU')
            ->orderBy('fecha_publicacion', 'desc')
            ->take(10)
            ->get(['id', 'titulo', 'descripcion', 'imagen_path', 'area_origen', 'fecha_publicacion']);

        // Obtener IDs de categorías "Normativos" y "Requisitos"
        $categoriaNormativos = \App\Models\CategoriaDocumento::where('nombre', 'like', '%Normativo%')->first();
        $categoriaRequisitos = \App\Models\CategoriaDocumento::where('nombre', 'like', '%Requisito%')->first();

        // Documentos Normativos (máximo 10) solo del área RSU
        $documentosNormativos = $categoriaNormativos
            ? Documentos::where('categoria_id', $categoriaNormativos->id)
                ->where('area_origen', 'RSU')
                ->orderBy('created_at', 'desc')
                ->take(10)
                ->get(['id', 'titulo', 'path_archivo', 'formato', 'tamano_mb', 'categoria_id', 'area_origen'])
            : collect();

        // Documentos Requisitos (máximo 10) solo del área RSU
        $documentosRequisitos = $categoriaRequisitos
            ? Documentos::where('categoria_id', $categoriaRequisitos->id)
                ->where('area_origen', 'RSU')
                ->orderBy('created_at', 'desc')
                ->take(10)
                ->get(['id', 'titulo', 'path_archivo', 'formato', 'tamano_mb', 'categoria_id', 'area_origen'])
            : collect();

        return view('responsabilidad-social', compact('noticias', 'documentosNormativos', 'documentosRequisitos'));
    }

    // Crea una nueva clase que controlador el formulario de contacto
    public function contactoRSU(Request $request){
        // Validar datos del formulario
        $request->validate([
            'email' => [
                'required',
                'email',
                'regex:/^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,}$/'
            ],
            'asunto' => 'required|string|max:255',
            'mensaje' => 'required|string',
        ]);

        // Detectar área según la URL anterior
        $referer = $request->headers->get('referer');
        $area = 'RSU';
        if ($referer) {
            if (strpos($referer, 'proyeccion-social') !== false) {
                $area = 'PS';
            } elseif (strpos($referer, 'extension-universitaria') !== false) {
                $area = 'EU';
            } elseif (strpos($referer, 'seguimiento-egresado') !== false) {
                $area = 'SCE';
            }
        }

        // Enviar correo usando la Mailable, pasando el área
        Mail::to(config('mail.from.address'))
            ->send(new \App\Mail\ContactoRSUMail(
                $request->input('email'),
                $request->input('asunto'),
                $request->input('mensaje'),
                $area
            ));

        // Redirigir con mensaje de éxito
        return redirect()->back()->with('success', 'Tu mensaje ha sido enviado correctamente.');
    }
}
