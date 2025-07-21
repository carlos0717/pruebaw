<?php

namespace App\Livewire;

use App\Models\Objetivos_desarrollo_sostenible;
use Livewire\Component;
use Livewire\WithPagination;

class ObjetivosDesarrolloSostenible extends Component
{
    use WithPagination;

    public $modalOpen = false;
    public $modalMode = 'create';
    public $nombre, $descripcion, $objetivoId;
    public $confirmingDelete = false;
    public $objetivoToDelete;
    public $search = '';

    protected $rules = [
        'nombre' => 'required|string|max:255|unique:objetivos_desarrollo_sostenible,nombre',
        'descripcion' => 'nullable|string',
    ];

    public function render()
    {
        $objetivos = Objetivos_desarrollo_sostenible::query()
            ->when($this->search, function($query) {
                $query->where('nombre', 'like', '%'.$this->search.'%');
            })
            ->orderBy('id')
            ->paginate(10);
        return view('livewire.objetivos-desarrollo-sostenible', compact('objetivos'));
    }

    public function openModal($mode = 'create', $id = null)
    {
        $this->resetValidation();
        $this->reset(['nombre', 'descripcion', 'objetivoId']);
        $this->modalMode = $mode;
        if ($mode === 'edit' && $id) {
            $objetivo = Objetivos_desarrollo_sostenible::findOrFail($id);
            $this->objetivoId = $objetivo->id;
            $this->nombre = $objetivo->nombre;
            $this->descripcion = $objetivo->descripcion;
            $this->rules['nombre'] = 'required|string|max:255|unique:objetivos_desarrollo_sostenible,nombre,' . $id;
        } else {
            $this->rules['nombre'] = 'required|string|max:255|unique:objetivos_desarrollo_sostenible,nombre';
        }
        $this->modalOpen = true;
    }

    public function closeModal()
    {
        $this->modalOpen = false;
        $this->resetValidation();
    }

    public function saveObjetivo()
    {
        $this->validate();
        if ($this->modalMode === 'create') {
            Objetivos_desarrollo_sostenible::create([
                'nombre' => $this->nombre,
                'descripcion' => $this->descripcion,
            ]);
            $this->dispatch('show-success-modal', message: 'El objetivo ha sido creado correctamente.');
        } else if ($this->modalMode === 'edit' && $this->objetivoId) {
            $objetivo = Objetivos_desarrollo_sostenible::findOrFail($this->objetivoId);
            $objetivo->update([
                'nombre' => $this->nombre,
                'descripcion' => $this->descripcion,
            ]);
            $this->dispatch('show-success-modal', message: 'El objetivo ha sido actualizado correctamente.');
        }
        $this->closeModal();
    }

    public function confirmDelete($id)
    {
        $this->objetivoToDelete = $id;
        $this->confirmingDelete = true;
    }

    public function closeDeleteModal()
    {
        $this->confirmingDelete = false;
        $this->objetivoToDelete = null;
    }

    public function deleteObjetivo()
    {
        Objetivos_desarrollo_sostenible::destroy($this->objetivoToDelete);
        $this->confirmingDelete = false;
        $this->objetivoToDelete = null;
        $this->dispatch('show-success-modal', message: 'El objetivo ha sido eliminado correctamente.');
    }
}
