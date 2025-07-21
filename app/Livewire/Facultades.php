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
            $this->rules['nombre'] = 'required|string|max:255|unique:facultades,nombre,' . $id;
        } else {
            $this->rules['nombre'] = 'required|string|max:255|unique:facultades,nombre';
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
        $this->validate();
        if ($this->modalMode === 'create') {
            FacultadModel::create([
                'nombre' => $this->nombre,
            ]);
            $this->dispatch('show-success-modal', message: 'La facultad ha sido creada correctamente.');
        } else if ($this->modalMode === 'edit' && $this->facultadId) {
            $facultad = FacultadModel::findOrFail($this->facultadId);
            $facultad->update([
                'nombre' => $this->nombre,
            ]);
            $this->dispatch('show-success-modal', message: 'La facultad ha sido actualizada correctamente.');
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
