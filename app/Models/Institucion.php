<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Institucion extends Model
{
    use HasFactory;

    protected $table = 'instituciones';

    protected $fillable = [
        'nombre',
        'institucion_tipo_id',
        'descripcion',
        'activo'
    ];

    protected $casts = [
        'activo' => 'boolean'
    ];

    // Relaciones
    public function convenios()
    {
        return $this->hasMany(Convenio::class, 'institucion_id');
    }

    public function tipo()
    {
        return $this->belongsTo(InstitucionTipo::class, 'institucion_tipo_id');
    }

    // Scopes
    public function scopeActivos($query)
    {
        return $query->where('activo', true);
    }

    // Accessors
    public function getConveniosCountAttribute()
    {
        return $this->convenios()->count();
    }

    public function getConveniosVigentesCountAttribute()
    {
        return $this->convenios()
            ->whereHas('estado', function($query) {
                $query->where('nombre', 'Vigente');
            })
            ->count();
    }
}
