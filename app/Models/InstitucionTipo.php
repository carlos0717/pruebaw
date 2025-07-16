<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InstitucionTipo extends Model
{
    use HasFactory;

    protected $table = 'institucion_tipos';

    protected $fillable = [
        'nombre',
        'descripcion'
    ];

    // Relaciones
    public function instituciones()
    {
        return $this->hasMany(Institucion::class, 'institucion_tipo_id');
    }

    // Scopes
    public function scopeConDescripcion($query)
    {
        return $query->whereNotNull('descripcion');
    }

    // Accessors
    public function getNombreDescripcionAttribute()
    {
        return $this->nombre . ($this->descripcion ? ' - ' . $this->descripcion : '');
    }
}
