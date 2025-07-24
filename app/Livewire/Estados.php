<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Estado;
use Illuminate\Validation\Rule;

class Estados extends Component
{
    use WithPagination;

    public $search = '';
    public $modalOpen = false;
    public $modalMode = 'create';
    public $confirmingDelete = false;
    public $estadoId;
    public $nombre;
    public $descripcion;
    public $color = '#000000';
    public $activo = 1;

    protected $rules = [
        'nombre' => 'required|string|max:50',
        'descripcion' => 'nullable|string|max:255',
        'color' => 'required|string|size:7',
        'activo' => 'required|boolean',
    ];

    protected $messages = [
        'nombre.required' => 'El nombre es obligatorio.',
        'nombre.unique' => 'El nombre ya existe.',
        'color.required' => 'El color es obligatorio.',
        'color.size' => 'El color debe ser un código hexadecimal válido.',
        'activo.required' => 'El campo activo es obligatorio.',
    ];

    public function render()
    {
        $estados = Estado::query()
            ->when($this->search, function($query) {
                $query->where('nombre', 'like', '%'.$this->search.'%');
            })
            ->orderBy('id', 'asc')
            ->paginate(10);

        return view('livewire.estados', [
            'estados' => $estados
        ]);
    }

    public function openModal($mode = 'create', $id = null)
    {
        $this->resetValidation();
        $this->reset(['nombre', 'descripcion', 'color', 'activo', 'estadoId']);
        $this->modalMode = $mode;
        if ($mode === 'edit' && $id) {
            $estado = Estado::findOrFail($id);
            $this->estadoId = $estado->id;
            $this->nombre = $estado->nombre;
            $this->descripcion = $estado->descripcion;
            $this->color = $estado->color;
            $this->activo = $estado->activo;
        } else {
            $this->color = '#000000';
            $this->activo = 1;
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
                'max:50',
                Rule::unique('estados')->ignore($this->estadoId)
            ],
            'descripcion' => 'nullable|string|max:255',
            'color' => 'required|string|size:7',
            'activo' => 'required|boolean',
        ]);
        if ($this->modalMode === 'create') {
            Estado::create([
                'nombre' => $this->nombre,
                'descripcion' => $this->descripcion,
                'color' => $this->color,
                'activo' => $this->activo,
            ]);
            $this->dispatch('show-success-modal', message: 'Estado creado correctamente.');
        } else {
            $estado = Estado::findOrFail($this->estadoId);
            $estado->update([
                'nombre' => $this->nombre,
                'descripcion' => $this->descripcion,
                'color' => $this->color,
                'activo' => $this->activo,
            ]);
            $this->dispatch('show-success-modal', message: 'Estado actualizado correctamente.');
        }
        $this->closeModal();
    }

    public function confirmDelete($id)
    {
        $this->estadoId = $id;
        $this->confirmingDelete = true;
    }

    public function delete()
    {
        $estado = Estado::findOrFail($this->estadoId);
        $estado->delete();
        $this->confirmingDelete = false;
        $this->dispatch('show-success-modal', message: 'Estado eliminado correctamente.');
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }
}
