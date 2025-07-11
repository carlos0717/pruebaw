<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\User;
use App\Models\Roles;

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
    public $isEdit = false;
    public $confirmingDeleteId;

    protected $rules = [
        'nombres' => 'required|string|max:50|regex:/^[A-Za-zÁÉÍÓÚáéíóúÑñ\s]+$/',
        'apellidos' => 'required|string|max:50|regex:/^[A-Za-zÁÉÍÓÚáéíóúÑñ\s]+$/',
        'email' => 'required|email:rfc,dns|max:100', // unique se agrega dinámicamente
        'role_id' => 'required|exists:roles,id',
        'new_password' => 'nullable|min:6',
    ];

    public function mount()
    {
        $this->roles = Roles::all();
    }

    public function render()
    {
        $users = User::with('role')
            ->where(function($q) {
                $q->where('nombres', 'like', "%{$this->search}%")
                  ->orWhereHas('role', function($qr) {
                      $qr->where('nombre', 'like', "%{$this->search}%");
                  });
            })
            ->orderBy('role_id', 'asc')
            ->orderBy('id', 'desc')
            ->paginate(15);
        return view('livewire.user-table', compact('users'));
    }

    public function openModal($id = null)
    {
        $this->resetValidation();
        $this->reset(['nombres','apellidos','email','role_id','userId','new_password']);
        $this->isEdit = false;
        if ($id) {
            $user = User::findOrFail($id);
            $this->userId = $user->id;
            $this->nombres = $user->nombres;
            $this->apellidos = $user->apellidos;
            $this->email = $user->email;
            $this->role_id = $user->role_id;
            $this->isEdit = true;
        }
        $this->showModal = true;
    }

    public function saveUser()
    {
        // Validación única de email
        if ($this->isEdit && $this->userId) {
            $this->rules['email'] = 'required|email:rfc,dns|max:100|unique:users,email,' . $this->userId;
            $this->rules['new_password'] = 'nullable|min:6';
        } else {
            $this->rules['email'] = 'required|email:rfc,dns|max:100|unique:users,email';
            unset($this->rules['new_password']);
        }
        $this->validate($this->rules, $this->messages);
        if ($this->userId) {
            $user = User::findOrFail($this->userId);
            $user->nombres = $this->nombres;
            $user->apellidos = $this->apellidos;
            $user->email = $this->email;
            $user->role_id = $this->role_id;
            if (!empty($this->new_password)) {
                $user->password = bcrypt($this->new_password);
            }
            $user->save();
        } else {
            User::create([
                'nombres' => $this->nombres,
                'apellidos' => $this->apellidos,
                'email' => $this->email,
                'role_id' => $this->role_id,
                'password' => bcrypt('12345678'), // default password
            ]);
        }
        $this->showModal = false;
        if ($this->isEdit) {
            $this->dispatch('show-success-modal', message: 'El usuario ha sido actualizado correctamente.');
        } else {
            $this->dispatch('show-success-modal', message: 'El usuario ha sido creado correctamente.');
        }
    }

    public function confirmDelete($id)
    {
        $this->confirmingDeleteId = $id;
        $this->showDeleteModal = true;
    }

    public function deleteUser()
    {
        User::findOrFail($this->confirmingDeleteId)->delete();
        $this->showDeleteModal = false;
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function closeModal()
    {
        $this->showModal = false;
        $this->reset(['nombres','apellidos','email','role_id','userId','new_password']);
        $this->resetValidation();
    }

    public function closeSuccessModal()
    {
        $this->showSuccessModal = false;
        $this->reset(['nombres','apellidos','email','role_id','userId','new_password']);
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
        'new_password.min' => 'La contraseña debe tener al menos 6 caracteres',
    ];
}
