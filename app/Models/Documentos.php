<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Documentos extends Model
{
    use HasFactory;

    protected $table = 'documentos';

    protected $fillable = [
        'titulo',
        'path_archivo',
        'formato',
        'tamano_mb',
        'categoria_id',
        'user_id',
        'area_origen', // Nuevo campo para identificar la dirección
    ];

    public function categoria()
    {
        return $this->belongsTo(CategoriaDocumento::class, 'categoria_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
