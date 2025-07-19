<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Direccion;

class DireccionTable extends Component
{
    use WithPagination;
    public $search = '';
    public $showModal = false;
    public $showDeleteModal = false;
    public $showSuccessModal = false;
    public $direccionId;
    public $nombre;
    public $descripcion;
    public $isEdit = false;
    public $confirmingDeleteId;

    protected $rules = [
        'nombre' => 'required|string|max:255|unique:direcciones,nombre',
        'descripcion' => 'nullable|string|max:500',
    ];

    public function render()
    {
        $direcciones = Direccion::where('nombre', 'like', "%{$this->search}%")
            ->orderBy('id', 'desc')
            ->paginate(15);
        return view('livewire.direccion-table', compact('direcciones'));
    }

    public function openModal($id = null)
    {
        $this->resetValidation();
        $this->reset(['nombre','descripcion','direccionId']);
        $this->isEdit = false;
        if ($id) {
            $direccion = Direccion::findOrFail($id);
            $this->direccionId = $direccion->id;
            $this->nombre = $direccion->nombre;
            $this->descripcion = $direccion->descripcion;
            $this->isEdit = true;
        }
        $this->showModal = true;
    }

    public function saveDireccion()
    {
        if ($this->isEdit && $this->direccionId) {
            $this->rules['nombre'] = 'required|string|max:255|unique:direcciones,nombre,' . $this->direccionId;
        } else {
            $this->rules['nombre'] = 'required|string|max:255|unique:direcciones,nombre';
        }
        $this->validate($this->rules, $this->messages);
        if ($this->direccionId) {
            $direccion = Direccion::findOrFail($this->direccionId);
            $direccion->nombre = $this->nombre;
            $direccion->descripcion = $this->descripcion;
            $direccion->save();
        } else {
            Direccion::create([
                'nombre' => $this->nombre,
                'descripcion' => $this->descripcion,
            ]);
        }
        $this->showModal = false;
        $this->dispatch('show-success-modal', message: $this->isEdit ? 'La dirección ha sido actualizada correctamente.' : 'La dirección ha sido creada correctamente.');
    }

    public function confirmDelete($id)
    {
        $this->confirmingDeleteId = $id;
        $this->showDeleteModal = true;
    }

    public function deleteDireccion()
    {
        Direccion::findOrFail($this->confirmingDeleteId)->delete();
        $this->showDeleteModal = false;
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function closeModal()
    {
        $this->showModal = false;
        $this->reset(['nombre','descripcion','direccionId']);
        $this->resetValidation();
    }

    public function closeSuccessModal()
    {
        $this->showSuccessModal = false;
        $this->reset(['nombre','descripcion','direccionId']);
        $this->resetValidation();
    }

    public function closeDeleteModal()
    {
        $this->showDeleteModal = false;
        $this->reset(['confirmingDeleteId']);
    }

    protected $messages = [
        'nombre.required' => 'El campo nombre es obligatorio',
        'nombre.unique' => 'El nombre de la dirección ya está registrado',
        'nombre.max' => 'El nombre no puede superar los 255 caracteres',
        'descripcion.max' => 'La descripción no puede superar los 500 caracteres',
    ];
}
