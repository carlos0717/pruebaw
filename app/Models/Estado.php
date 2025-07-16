<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'descripcion',
        'color',
        'activo'
    ];

    protected $casts = [
        'activo' => 'boolean'
    ];

    // Relaciones
    public function convenios()
    {
        return $this->hasMany(Convenio::class, 'estado_id');
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

    // Métodos estáticos para obtener estados específicos
    public static function vigente()
    {
        return self::where('nombre', 'Vigente')->first();
    }

    public static function enProceso()
    {
        return self::where('nombre', 'En Proceso')->first();
    }

    public static function caducado()
    {
        return self::where('nombre', 'Caducado')->first();
    }
}
