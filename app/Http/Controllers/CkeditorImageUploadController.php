<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Intervention\Image\Laravel\Facades\Image;

class CkeditorImageUploadController extends Controller
{
    /**
     * Maneja la carga de imágenes desde CKEditor.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function upload(Request $request)
    {
        // 1. Validación del archivo
        $validator = Validator::make($request->all(), [
            'upload' => 'required|image|mimes:jpeg,png,webp,gif|max:5120', // 5MB Max
        ]);

        if ($validator->fails()) {
            return response()->json([
                'error' => ['message' => $validator->errors()->first('upload')]
            ], 422); // Unprocessable Entity
        }

        // 2. Procesamiento y optimización de la imagen
        try {
            $file = $request->file('upload');
            
            // Genera un nombre de archivo único y lo convierte a formato WebP
            $filename = Str::ulid() . '.webp';
            
            // Define la ruta de almacenamiento
            $path = 'public/noticias_content/' . $filename;

            // Optimiza la imagen: convierte a WebP con 80% de calidad
            // y redimensiona si es más ancha de 1200px, manteniendo la relación de aspecto.
            $image = Image::read($file);
            $image->scaleDown(width: 1200);
            $encodedImage = $image->toWebp(80);

            // 3. Almacenamiento del archivo
            Storage::put($path, (string) $encodedImage);

            // 4. Genera la URL pública
            $url = Storage::url('noticias_content/' . $filename);

            // 5. Devuelve la respuesta JSON que CKEditor espera
            return response()->json([
                'url' => $url
            ]);

        } catch (\Exception $e) {
            // Manejo de errores inesperados durante el procesamiento
            return response()->json([
                'error' => ['message' => 'No se pudo procesar la imagen. Error: ' . $e->getMessage()]
            ], 500);
        }
    }
}