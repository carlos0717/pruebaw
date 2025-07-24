<?php

namespace App\Livewire;

use App\Models\Facultades as FacultadModel;
use Livewire\Component;
use Livewire\WithPagination;

class Facultades extends Component
{
    use WithPagination;

    public $modalOpen = false;
    public $modalMode = 'create';
    public $nombre, $facultadId;
    public $confirmingDelete = false;
    public $facultadToDelete;
    public $search = '';

    protected $rules = [
        'nombre' => 'required|string|max:255|unique:facultades,nombre',
    ];

    protected $messages = [
        'nombre.required' => 'El campo nombre es obligatorio',
        'nombre.unique' => 'El nombre de la facultad ya está registrado',
        'nombre.max' => 'El nombre no puede superar los 255 caracteres',
    ];

    public function render()
    {
        $facultades = FacultadModel::query()
            ->when($this->search, function($query) {
                $query->where('nombre', 'like', '%'.$this->search.'%');
            })
            ->orderBy('id')
            ->paginate(10);
        return view('livewire.facultades', compact('facultades'));
    }

    public function openModal($mode = 'create', $id = null)
    {
        $this->resetValidation();
        $this->reset(['nombre', 'facultadId']);
        $this->modalMode = $mode;
        if ($mode === 'edit' && $id) {
            $facultad = FacultadModel::findOrFail($id);
            $this->facultadId = $facultad->id;
            $this->nombre = $facultad->nombre;
        }
        $this->modalOpen = true;
    }

    public function closeModal()
    {
        $this->modalOpen = false;
        $this->resetValidation();
    }

    public function saveFacultad()
    {
        // Ajustar la regla unique para ignorar el registro actual en edición
        if ($this->modalMode === 'edit' && $this->facultadId) {
            $this->rules['nombre'] = 'required|string|max:255|unique:facultades,nombre,' . $this->facultadId;
        } else {
            $this->rules['nombre'] = 'required|string|max:255|unique:facultades,nombre';
        }
        $this->validate($this->rules, $this->messages);

        if ($this->modalMode === 'create') {
            FacultadModel::create([
                'nombre' => $this->nombre,
            ]);
            $this->dispatch('show-success-modal', message: 'La facultad ha sido creada correctamente.');
        } else if ($this->modalMode === 'edit' && $this->facultadId) {
            $facultad = FacultadModel::findOrFail($this->facultadId);
            // Solo actualizar si hay cambios
            if ($facultad->nombre !== $this->nombre) {
                $facultad->update([
                    'nombre' => $this->nombre,
                ]);
                $this->dispatch('show-success-modal', message: 'La facultad ha sido actualizada correctamente.');
            } else {
                // No hay cambios, solo cerrar modal
                $this->dispatch('show-success-modal', message: 'No se realizaron cambios.');
            }
        }
        $this->closeModal();
    }

    public function confirmDelete($id)
    {
        $this->facultadToDelete = $id;
        $this->confirmingDelete = true;
    }

    public function closeDeleteModal()
    {
        $this->confirmingDelete = false;
        $this->facultadToDelete = null;
    }

    public function deleteFacultad()
    {
        FacultadModel::destroy($this->facultadToDelete);
        $this->confirmingDelete = false;
        $this->facultadToDelete = null;
        $this->dispatch('show-success-modal', message: 'La facultad ha sido eliminada correctamente.');
    }
}
