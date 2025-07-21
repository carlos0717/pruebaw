<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\User;
use App\Models\Roles;
use App\Models\Direccion;

class UserTable extends Component
{
    use WithPagination;
    public $search = '';
    public $showModal = false;
    public $showDeleteModal = false;
    public $showSuccessModal = false;
    public $userId;
    public $nombres;
    public $apellidos;
    public $email;
    public $role_id;
    public $new_password;
    public $roles = [];
    public $direcciones = [];
    public $direccion_id;
    public $isEdit = false;
    public $confirmingDeleteId;

    protected $rules = [
        'nombres' => 'required|string|max:50|regex:/^[A-Za-zÁÉÍÓÚáéíóúÑñ\s]+$/',
        'apellidos' => 'required|string|max:50|regex:/^[A-Za-zÁÉÍÓÚáéíóúÑñ\s]+$/',
        'email' => 'required|email:rfc,dns|max:100', // unique se agrega dinámicamente
        'role_id' => 'required|exists:roles,id',
        'direccion_id' => 'required|exists:direcciones,id',
        'new_password' => 'nullable|min:6',
    ];

    public function mount()
    {
        $this->roles = Roles::all();
        $this->direcciones = Direccion::all();
    }

    public function render()
    {
        $users = User::with(['role', 'direccion'])
            ->where(function($q) {
                $q->where('nombres', 'like', "%{$this->search}%")
                  ->orWhereHas('role', function($qr) {
                      $qr->where('nombre', 'like', "%{$this->search}%");
                  })
                  ->orWhereHas('direccion', function($qd) {
                      $qd->where('nombre', 'like', "%{$this->search}%");
                  });
            })
            ->orderBy('role_id', 'asc')
            ->orderBy('id', 'desc')
            ->paginate(15);
        return view('livewire.user-table', [
            'users' => $users,
            'direcciones' => $this->direcciones,
        ]);
    }

    public function openModal($id = null)
    {
        $this->resetValidation();
        $this->reset(['nombres','apellidos','email','role_id','userId','new_password','direccion_id']);
        $this->isEdit = false;
        if ($id) {
            $user = User::findOrFail($id);
            $this->userId = $user->id;
            $this->nombres = $user->nombres;
            $this->apellidos = $user->apellidos;
            $this->email = $user->email;
            $this->role_id = $user->role_id;
            $this->direccion_id = $user->direccion_id;
            $this->isEdit = true;
        }
        $this->showModal = true;
    }

    public function saveUser()
    {
        // Validación profesional de email
        $emailRule = 'required|string|email|max:100|unique:users,email';
        if ($this->isEdit && $this->userId) {
            $emailRule .= ',' . $this->userId;
        }
        $rules = [
            'nombres' => $this->rules['nombres'],
            'apellidos' => $this->rules['apellidos'],
            'email' => $emailRule,
            'role_id' => $this->rules['role_id'],
            'direccion_id' => $this->rules['direccion_id'],
        ];
        if ($this->isEdit && $this->userId) {
            $rules['new_password'] = $this->rules['new_password'];
        }
        $this->validate($rules, $this->messages);
        if ($this->userId) {
            $user = User::findOrFail($this->userId);
            $user->nombres = $this->nombres;
            $user->apellidos = $this->apellidos;
            $user->email = $this->email;
            $user->role_id = $this->role_id;
            $user->direccion_id = $this->direccion_id;
            if (!empty($this->new_password)) {
                $user->password = bcrypt($this->new_password);
            }
            $user->save();
            $this->dispatch('show-success-modal', message: 'El usuario ha sido actualizado correctamente.');
        } else {
            User::create([
                'nombres' => $this->nombres,
                'apellidos' => $this->apellidos,
                'email' => $this->email,
                'role_id' => $this->role_id,
                'direccion_id' => $this->direccion_id,
                'password' => bcrypt('12345678'), // default password
            ]);
            $this->dispatch('show-success-modal', message: 'El usuario ha sido creado correctamente.');
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

    public function deleteUser()
    {
        User::findOrFail($this->confirmingDeleteId)->delete();
        $this->showDeleteModal = false;
        $this->confirmingDeleteId = null;
        $this->dispatch('show-success-modal', message: 'El usuario ha sido eliminado correctamente.');
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function closeModal()
    {
        $this->showModal = false;
        $this->reset(['nombres','apellidos','email','role_id','userId','new_password','direccion_id']);
        $this->resetValidation();
    }

    public function closeSuccessModal()
    {
        $this->showSuccessModal = false;
        $this->reset(['nombres','apellidos','email','role_id','userId','new_password','direccion_id']);
        $this->resetValidation();
    }

    protected $messages = [
        'nombres.required' => 'El campo nombres es obligatorio',
        'nombres.regex' => 'El campo nombres solo puede contener letras y espacios',
        'apellidos.required' => 'El campo apellidos es obligatorio',
        'apellidos.regex' => 'El campo apellidos solo puede contener letras y espacios',
        'email.required' => 'El campo correo electrónico es obligatorio',
        'email.email' => 'El correo electrónico no tiene un formato válido',
        'email.unique' => 'El correo electrónico ya está registrado, debe ingresar uno diferente',
        'role_id.required' => 'El campo cargo es obligatorio',
        'direccion_id.required' => 'El campo dirección es obligatorio',
        'direccion_id.exists' => 'La dirección seleccionada no es válida',
        'new_password.min' => 'La contraseña debe tener al menos 6 caracteres',
    ];
}
