<?php
namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Roles;

class RoleTable extends Component
{
    use WithPagination;
    public $search = '';
    public $showModal = false;
    public $showDeleteModal = false;
    public $roleId;
    public $nombre;
    public $descripcion;
    public $isEdit = false;
    public $confirmingDeleteId;

    protected $rules = [
        'nombre' => 'required|string|unique:roles,nombre',
        'descripcion' => 'nullable|string',
    ];

    public function render()
    {
        $roles = Roles::where('nombre', 'like', "%{$this->search}%")
            ->orWhere('descripcion', 'like', "%{$this->search}%")
            ->orderBy('id', 'asc')
            ->paginate(15);
        return view('livewire.role-table', compact('roles'));
    }

    public function openModal($id = null)
    {
        $this->resetValidation();
        $this->reset(['nombre','descripcion','roleId']);
        $this->isEdit = false;
        if ($id) {
            $role = Roles::findOrFail($id);
            $this->roleId = $role->id;
            $this->nombre = $role->nombre;
            $this->descripcion = $role->descripcion;
            $this->isEdit = true;
        }
        $this->showModal = true;
    }

    public function closeModal()
    {
        $this->showModal = false;
        $this->reset(['nombre','descripcion','roleId']);
        $this->resetValidation();
        $this->isEdit = false;
    }

    public function saveRole()
    {
        $this->validate($this->isEdit ? [
            'nombre' => 'required|string|unique:roles,nombre,' . $this->roleId,
            'descripcion' => 'nullable|string',
        ] : $this->rules);
        if ($this->roleId) {
            $role = Roles::findOrFail($this->roleId);
            $role->update([
                'nombre' => $this->nombre,
                'descripcion' => $this->descripcion,
            ]);
            $this->dispatch('show-success-modal', message: 'El cargo ha sido actualizado correctamente.');
        } else {
            Roles::create([
                'nombre' => $this->nombre,
                'descripcion' => $this->descripcion,
            ]);
            $this->dispatch('show-success-modal', message: 'El cargo ha sido creado correctamente.');
        }
        $this->showModal = false;
    }


    public function confirmDelete($id)
    {
        $this->confirmingDeleteId = $id;
        $this->showDeleteModal = true;
    }

    public function closeDeleteModal()
    {
        $this->showDeleteModal = false;
        $this->confirmingDeleteId = null;
    }

    public function deleteRole()
    {
        Roles::findOrFail($this->confirmingDeleteId)->delete();
        $this->showDeleteModal = false;
        $this->confirmingDeleteId = null;
        $this->dispatch('show-success-modal', message: 'El cargo ha sido eliminado correctamente.');
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }
}
