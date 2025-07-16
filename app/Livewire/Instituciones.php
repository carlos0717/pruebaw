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
    public $confirmingDelete = false;
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
            $institucion = \App\Models\Institucion::findOrFail($id);
            $this->institucionId = $institucion->id;
            $this->nombre = $institucion->nombre;
            $this->institucion_tipo_id = $institucion->institucion_tipo_id;
            $this->descripcion = $institucion->descripcion;
            $this->activo = $institucion->activo;
            $this->rules['nombre'] = 'required|string|max:100|unique:instituciones,nombre,' . $institucion->id;
        } else {
            $this->activo = 1;
            $this->rules['nombre'] = 'required|string|max:100|unique:instituciones,nombre';
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
        $this->validate();
        if ($this->modalMode === 'create') {
            \App\Models\Institucion::create([
                'nombre' => $this->nombre,
                'institucion_tipo_id' => $this->institucion_tipo_id,
                'descripcion' => $this->descripcion,
                'activo' => $this->activo,
            ]);
            session()->flash('success_message', 'Institución creada correctamente.');
        } else {
            $institucion = \App\Models\Institucion::findOrFail($this->institucionId);
            $institucion->update([
                'nombre' => $this->nombre,
                'institucion_tipo_id' => $this->institucion_tipo_id,
                'descripcion' => $this->descripcion,
                'activo' => $this->activo,
            ]);
            session()->flash('success_message', 'Institución actualizada correctamente.');
        }
        $this->closeModal();
    }

    public function confirmDelete($id)
    {
        $this->institucionId = $id;
        $this->confirmingDelete = true;
    }

    public function delete()
    {
        $institucion = \App\Models\Institucion::findOrFail($this->institucionId);
        $institucion->delete();
        $this->confirmingDelete = false;
        session()->flash('success_message', 'Institución eliminada correctamente.');
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }
}
