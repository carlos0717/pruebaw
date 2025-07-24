<?php

namespace App\Livewire;

use App\Models\Docente;
use App\Models\Facultades;
use Livewire\Component;
use Livewire\WithPagination;

class Docentes extends Component
{
    use WithPagination;

    public $modalOpen = false;
    public $modalMode = 'create';
    public $nombres, $apellidos, $dni, $facultad_id, $departamento, $celular, $docenteId;
    public $confirmingDelete = false;
    public $docenteToDelete;
    public $search = '';

    protected $rules = [
        'nombres' => 'required|string|max:255',
        'apellidos' => 'required|string|max:255',
        'dni' => 'required|string|max:15|unique:docentes,dni',
        'facultad_id' => 'required|exists:facultades,id',
        'departamento' => 'nullable|string|max:255',
        'celular' => 'nullable|string|max:20',
    ];

    protected $messages = [
        'nombres.required' => 'El campo nombres es obligatorio',
        'nombres.max' => 'Los nombres no pueden superar los 255 caracteres',
        'apellidos.required' => 'El campo apellidos es obligatorio',
        'apellidos.max' => 'Los apellidos no pueden superar los 255 caracteres',
        'dni.required' => 'El campo DNI es obligatorio',
        'dni.unique' => 'El DNI ya está registrado',
        'dni.max' => 'El DNI no puede superar los 15 caracteres',
        'facultad_id.required' => 'Debe seleccionar una facultad',
        'facultad_id.exists' => 'La facultad seleccionada no existe',
        'departamento.max' => 'El departamento no puede superar los 255 caracteres',
        'celular.max' => 'El celular no puede superar los 20 caracteres',
    ];

    public function render()
    {
        $docentes = Docente::query()
            ->when($this->search, function($query) {
                $query->where('nombres', 'like', '%'.$this->search.'%')
                      ->orWhere('apellidos', 'like', '%'.$this->search.'%')
                      ->orWhere('dni', 'like', '%'.$this->search.'%');
            })
            ->orderBy('id')
            ->paginate(10);
        $facultades = Facultades::all();
        return view('livewire.docentes', compact('docentes', 'facultades'));
    }

    public function openModal($mode = 'create', $id = null)
    {
        $this->resetValidation();
        $this->reset(['nombres', 'apellidos', 'dni', 'facultad_id', 'departamento', 'celular', 'docenteId']);
        $this->modalMode = $mode;
        if ($mode === 'edit' && $id) {
            $docente = Docente::findOrFail($id);
            $this->docenteId = $docente->id;
            $this->nombres = $docente->nombres;
            $this->apellidos = $docente->apellidos;
            $this->dni = $docente->dni;
            $this->facultad_id = $docente->facultad_id;
            $this->departamento = $docente->departamento;
            $this->celular = $docente->celular;
        }
        $this->modalOpen = true;
    }

    public function closeModal()
    {
        $this->modalOpen = false;
        $this->resetValidation();
    }

    public function saveDocente()
    {
        // Ajustar la regla unique para ignorar el registro actual en edición
        if ($this->modalMode === 'edit' && $this->docenteId) {
            $this->rules['dni'] = 'required|string|max:15|unique:docentes,dni,' . $this->docenteId;
        } else {
            $this->rules['dni'] = 'required|string|max:15|unique:docentes,dni';
        }
        $this->validate($this->rules, $this->messages);

        if ($this->modalMode === 'create') {
            Docente::create([
                'nombres' => $this->nombres,
                'apellidos' => $this->apellidos,
                'dni' => $this->dni,
                'facultad_id' => $this->facultad_id,
                'departamento' => $this->departamento,
                'celular' => $this->celular,
            ]);
            $this->dispatch('show-success-modal', message: 'El docente ha sido creado correctamente.');
        } else if ($this->modalMode === 'edit' && $this->docenteId) {
            $docente = Docente::findOrFail($this->docenteId);
            // Solo actualizar si hay cambios
            if (
                $docente->nombres !== $this->nombres ||
                $docente->apellidos !== $this->apellidos ||
                $docente->dni !== $this->dni ||
                $docente->facultad_id != $this->facultad_id ||
                $docente->departamento !== $this->departamento ||
                $docente->celular !== $this->celular
            ) {
                $docente->update([
                    'nombres' => $this->nombres,
                    'apellidos' => $this->apellidos,
                    'dni' => $this->dni,
                    'facultad_id' => $this->facultad_id,
                    'departamento' => $this->departamento,
                    'celular' => $this->celular,
                ]);
                $this->dispatch('show-success-modal', message: 'El docente ha sido actualizado correctamente.');
            } else {
                $this->dispatch('show-success-modal', message: 'No se realizaron cambios.');
            }
        }
        $this->closeModal();
    }

    public function confirmDelete($id)
    {
        $this->docenteToDelete = $id;
        $this->confirmingDelete = true;
    }

    public function closeDeleteModal()
    {
        $this->confirmingDelete = false;
        $this->docenteToDelete = null;
    }

    public function deleteDocente()
    {
        Docente::destroy($this->docenteToDelete);
        $this->confirmingDelete = false;
        $this->docenteToDelete = null;
        $this->dispatch('show-success-modal', message: 'El docente ha sido eliminado correctamente.');
    }
}
