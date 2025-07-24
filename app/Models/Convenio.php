<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Carbon\Carbon;

class Convenio extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'descripcion',
        'institucion_id',
        'estado_id',
        'fecha_inicio',
        'fecha_fin',
        'documento_nombre',
        'documento_escaneado_path',
        'observaciones'        
    ];

    protected $casts = [
        'fecha_inicio' => 'date',
        'fecha_fin' => 'date',
        'activo' => 'boolean'
    ];

    // Relaciones
    public function institucion(): BelongsTo
    {
        return $this->belongsTo(Institucion::class, 'institucion_id');
    }

    public function estado(): BelongsTo
    {
        return $this->belongsTo(Estado::class, 'estado_id');
    }

    // Scopes
    public function scopeActivos($query)
    {
        return $query->where('activo', true);
    }

    public function scopeVigentes($query)
    {
        return $query->whereHas('estado', function($q) {
            $q->where('nombre', 'Vigente');
        });
    }

    public function scopeEnProceso($query)
    {
        return $query->whereHas('estado', function($q) {
            $q->where('nombre', 'En Proceso');
        });
    }

    public function scopeCaducados($query)
    {
        return $query->whereHas('estado', function($q) {
            $q->where('nombre', 'Caducado');
        });
    }

    public function scopePorInstitucion($query, $institucionId)
    {
        return $query->where('institucion_id', $institucionId);
    }

    public function scopePorRangoFechas($query, $fechaInicio, $fechaFin)
    {
        return $query->whereBetween('fecha_inicio', [$fechaInicio, $fechaFin]);
    }

    // Accessors
    public function getDuracionAttribute()
    {
        if ($this->fecha_inicio && $this->fecha_fin) {
            return $this->fecha_inicio->diffInDays($this->fecha_fin);
        }
        return null;
    }

    public function getEstaVigenteAttribute()
    {
        return $this->estado && $this->estado->nombre === 'Vigente';
    }

    public function getEstaVencidoAttribute()
    {
        if ($this->fecha_fin) {
            return Carbon::now()->gt($this->fecha_fin);
        }
        return false;
    }

    public function getDiasRestantesAttribute()
    {
        if ($this->fecha_fin && $this->esta_vigente) {
            $dias = Carbon::now()->diffInDays($this->fecha_fin, false);
            return $dias > 0 ? $dias : 0;
        }
        return null;
    }

    // Métodos
    public function cambiarEstado($nuevoEstadoId, $observacion = null)
    {
        $this->update([
            'estado_id' => $nuevoEstadoId,
            'observaciones' => $observacion ? ($this->observaciones ? $this->observaciones . "\n" . $observacion : $observacion) : $this->observaciones
        ]);
    }

    public function verificarVencimiento()
    {
        if ($this->fecha_fin && Carbon::now()->gt($this->fecha_fin) && $this->esta_vigente) {
            $estadoCaducado = Estado::caducado();
            if ($estadoCaducado) {
                $this->cambiarEstado($estadoCaducado->id, 'Convenio caducado automáticamente por vencimiento');
            }
        }
    }
}
