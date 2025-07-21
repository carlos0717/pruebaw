<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\InstitucionTipo;
use Illuminate\Validation\Rule;

class InstitucionTipos extends Component
{
    use WithPagination;

    public $search = '';
    public $modalOpen = false;
    public $modalMode = 'create';
    public $confirmingDelete = false;
    public $tipoId;
    public $nombre;
    public $descripcion;

    protected $rules = [
        'nombre' => 'required|string|max:100',
        'descripcion' => 'nullable|string|max:255',
    ];

    public function render()
    {
        $tipos = InstitucionTipo::query()
            ->when($this->search, function($query) {
                $query->where('nombre', 'like', '%'.$this->search.'%');
            })
            ->orderBy('id', 'asc')
            ->paginate(10);

        return view('livewire.institucion-tipos', [
            'tipos' => $tipos
        ]);
    }

    public function openModal($mode = 'create', $id = null)
    {
        $this->resetValidation();
        $this->reset(['nombre', 'descripcion', 'tipoId']);
        $this->modalMode = $mode;
        if ($mode === 'edit' && $id) {
            $tipo = InstitucionTipo::findOrFail($id);
            $this->tipoId = $tipo->id;
            $this->nombre = $tipo->nombre;
            $this->descripcion = $tipo->descripcion;
            $this->rules['nombre'] = 'required|string|max:100|unique:institucion_tipos,nombre,' . $tipo->id;
        } else {
            $this->rules['nombre'] = 'required|string|max:100|unique:institucion_tipos,nombre';
        }
        $this->modalOpen = true;
    }

    public function closeModal()
    {
        $this->modalOpen = false;
        $this->resetValidation();
    }

    public function save()
    {
        $this->validate([
            'nombre' => [
                'required',
                'string',
                'max:100',
                Rule::unique('institucion_tipos')->ignore($this->tipoId)
            ],
            'descripcion' => 'nullable|string|max:255',
        ]);
        if ($this->modalMode === 'create') {
            InstitucionTipo::create([
                'nombre' => $this->nombre,
                'descripcion' => $this->descripcion,
            ]);
            $this->dispatch('show-success-modal', message: 'Tipo de institución creado correctamente.');
        } else {
            $tipo = InstitucionTipo::findOrFail($this->tipoId);
            $tipo->update([
                'nombre' => $this->nombre,
                'descripcion' => $this->descripcion,
            ]);
            $this->dispatch('show-success-modal', message: 'Tipo de institución actualizado correctamente.');
        }
        $this->closeModal();
    }

    public function confirmDelete($id)
    {
        $this->tipoId = $id;
        $this->confirmingDelete = true;
    }

    public function delete()
    {
        $tipo = InstitucionTipo::findOrFail($this->tipoId);
        $tipo->delete();
        $this->confirmingDelete = false;
        $this->dispatch('show-success-modal', message: 'Tipo de institución eliminado correctamente.');
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }
}
