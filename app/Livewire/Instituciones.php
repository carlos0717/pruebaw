<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Institucion;

class Instituciones extends Component
{
    use WithPagination;

    public $search = '';
    public $modalOpen = false;
    public $modalMode = 'create';
    public $institucionId;
    public $nombre;
    public $institucion_tipo_id;
    public $descripcion;
    public $activo = 1;

    protected $rules = [
        'nombre' => 'required|string|max:100|unique:instituciones,nombre',
        'institucion_tipo_id' => 'required|exists:institucion_tipos,id',
        'descripcion' => 'nullable|string|max:255',
        'activo' => 'required|boolean',
    ];

    public function render()
    {
        $instituciones = \App\Models\Institucion::with('institucionTipo')
            ->when($this->search, function($query) {
                $query->where('nombre', 'like', '%'.$this->search.'%');
            })
            ->orderBy('id', 'asc')
            ->paginate(10);

        $tipos = \App\Models\InstitucionTipo::orderBy('nombre')->get();

        return view('livewire.instituciones', [
            'instituciones' => $instituciones,
            'tipos' => $tipos
        ]);
    }

    public function openModal($mode = 'create', $id = null)
    {
        $this->resetValidation();
        $this->reset(['nombre', 'institucion_tipo_id', 'descripcion', 'activo', 'institucionId']);
        $this->modalMode = $mode;
        if ($mode === 'edit' && $id) {
            $institucion = \App\Models\Institucion::find($id);
            if ($institucion) {
                $this->institucionId = $institucion->id;
                $this->nombre = $institucion->nombre;
                $this->institucion_tipo_id = $institucion->institucion_tipo_id;
                $this->descripcion = $institucion->descripcion;
                $this->activo = $institucion->activo;
                $this->rules['nombre'] = 'required|string|max:100|unique:instituciones,nombre,' . $institucion->id;
                $this->modalOpen = true;
            } else {
                $this->dispatch('show-success-modal', message: 'No se encontró la institución para editar.');
            }
        } else {
            $this->activo = 1;
            $this->rules['nombre'] = 'required|string|max:100|unique:instituciones,nombre';
            $this->modalOpen = true;
        }
    }

    public function closeModal()
    {
        $this->modalOpen = false;
        $this->resetValidation();
        $this->reset(['nombre', 'institucion_tipo_id', 'descripcion', 'activo', 'institucionId']);
    }

    public function save()
    {
        $this->validate();
        if ($this->modalMode === 'create') {
            $institucion = \App\Models\Institucion::create([
                'nombre' => $this->nombre,
                'institucion_tipo_id' => $this->institucion_tipo_id,
                'descripcion' => $this->descripcion,
                'activo' => $this->activo,
            ]);
            if ($institucion) {
                $this->dispatch('show-success-modal', message: 'Institución creada correctamente.');
            } else {
                $this->dispatch('show-success-modal', message: 'Error al crear la institución.');
            }
        } else {
            $institucion = \App\Models\Institucion::find($this->institucionId);
            if ($institucion) {
                $institucion->update([
                    'nombre' => $this->nombre,
                    'institucion_tipo_id' => $this->institucion_tipo_id,
                    'descripcion' => $this->descripcion,
                    'activo' => $this->activo,
                ]);
                $this->dispatch('show-success-modal', message: 'Institución actualizada correctamente.');
            } else {
                $this->dispatch('show-success-modal', message: 'No se encontró la institución para actualizar.');
            }
        }
        $this->closeModal();
    }

    public function confirmDelete($id)
    {
        $this->institucionId = $id;
        if (\App\Models\Institucion::find($id)) {
            $this->dispatch('show-confirmation-modal', [
                'title' => 'Eliminar Institución',
                'message' => '¿Estás seguro de que deseas eliminar esta institución? Esta acción no se puede deshacer.',
                'confirmButtonText' => 'Sí, Eliminar',
                'cancelButtonText' => 'No, Cancelar',
                'confirmMethod' => 'delete'
            ]);
        } else {
            $this->dispatch('show-success-modal', message: 'No se encontró la institución para eliminar.');
        }
    }

    public function delete()
    {
        $institucion = \App\Models\Institucion::find($this->institucionId);
        if ($institucion) {
            if ($institucion->convenios()->count() > 0) {
                $this->dispatch('show-success-modal', message: 'No se puede eliminar la institución porque tiene convenios relacionados.');
            } else {
                $institucion->delete();
                $this->dispatch('show-success-modal', message: 'Institución eliminada correctamente.');
            }
        } else {
            $this->dispatch('show-success-modal', message: 'No se encontró la institución para eliminar.');
        }
        $this->closeModal();
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }
}
