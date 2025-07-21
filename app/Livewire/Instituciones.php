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
    public $showDeleteModal = false;
    public $deleteWarning = '';

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
        $institucion = \App\Models\Institucion::find($id);
        if ($institucion) {
            $conveniosCount = $institucion->convenios()->count();
            if ($conveniosCount > 0) {
                $this->deleteWarning = 'Esta institución está relacionada con ' . $conveniosCount . ' convenio(s). Para eliminarla, primero debe desvincularla de todos los convenios.';
                $this->showDeleteModal = true;
            } else {
                $this->deleteWarning = '';
                $this->showDeleteModal = true;
            }
        } else {
            $this->dispatch('show-success-modal', message: 'No se encontró la institución para eliminar.');
        }
    }

    public function closeDeleteModal()
    {
        $this->showDeleteModal = false;
        $this->deleteWarning = '';
        $this->institucionId = null;
    }

    public function delete()
    {
        $institucion = \App\Models\Institucion::find($this->institucionId);
        if ($institucion) {
            if ($institucion->convenios()->count() > 0) {
                // No eliminar, solo cerrar modal (la advertencia ya fue mostrada)
                $this->closeDeleteModal();
                return;
            } else {
                $institucion->delete();
                $this->dispatch('show-success-modal', message: 'Institución eliminada correctamente.');
            }
        } else {
            $this->dispatch('show-success-modal', message: 'No se encontró la institución para eliminar.');
        }
        $this->closeDeleteModal();
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }
}
