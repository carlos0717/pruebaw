<?php

namespace App\Livewire;

use App\Models\Estudiantes as EstudianteModel;
use App\Models\Facultades;
use Livewire\Component;
use Livewire\WithPagination;

class Estudiantes extends Component
{
    use WithPagination;

    public $modalOpen = false;
    public $modalMode = 'create';
    public $nombres, $apellidos, $codigo_universidad, $dni, $celular, $facultad_id, $estudianteId;
    public $confirmingDelete = false;
    public $estudianteToDelete;
    public $search = '';    

    protected $rules = [
        'nombres' => 'required|string|max:255',
        'apellidos' => 'required|string|max:255',
        'codigo_universidad' => 'required|string|max:20|unique:estudiantes,codigo_universidad',
        'dni' => 'required|string|max:15|unique:estudiantes,dni',
        'celular' => 'nullable|string|max:20',
        'facultad_id' => 'required|exists:facultades,id',
    ];

    protected $messages = [
        'nombres.required' => 'El campo nombres es obligatorio',
        'nombres.max' => 'Los nombres no pueden superar los 255 caracteres',
        'apellidos.required' => 'El campo apellidos es obligatorio',
        'apellidos.max' => 'Los apellidos no pueden superar los 255 caracteres',
        'codigo_universidad.required' => 'El código de universidad es obligatorio',
        'codigo_universidad.unique' => 'El código de universidad ya está registrado',
        'codigo_universidad.max' => 'El código de universidad no puede superar los 20 caracteres',
        'dni.required' => 'El campo DNI es obligatorio',
        'dni.unique' => 'El DNI ya está registrado',
        'dni.max' => 'El DNI no puede superar los 15 caracteres',
        'celular.max' => 'El celular no puede superar los 20 caracteres',
        'facultad_id.required' => 'Debe seleccionar una facultad',
        'facultad_id.exists' => 'La facultad seleccionada no existe',
    ];

    public function render()
    {
        $estudiantes = EstudianteModel::query()
            ->when($this->search, function($query) {
                $query->where('nombres', 'like', '%'.$this->search.'%')
                      ->orWhere('apellidos', 'like', '%'.$this->search.'%')
                      ->orWhere('codigo_universidad', 'like', '%'.$this->search.'%');
            })
            ->orderBy('id')
            ->paginate(10);
        $facultades = Facultades::all();
        return view('livewire.estudiantes', compact('estudiantes', 'facultades'));
    }

    public function updatedSearch()
    {        
        $this->resetPage();
    }   

    public function openModal($mode = 'create', $id = null)
    {
        $this->resetValidation();
        $this->reset(['nombres', 'apellidos', 'codigo_universidad', 'dni', 'celular', 'facultad_id', 'estudianteId']);
        $this->modalMode = $mode;
        if ($mode === 'edit' && $id) {
            $estudiante = EstudianteModel::findOrFail($id);
            $this->estudianteId = $estudiante->id;
            $this->nombres = $estudiante->nombres;
            $this->apellidos = $estudiante->apellidos;
            $this->codigo_universidad = $estudiante->codigo_universidad;
            $this->dni = $estudiante->dni;
            $this->celular = $estudiante->celular;
            $this->facultad_id = $estudiante->facultad_id;
        }
        $this->modalOpen = true;
    }

    public function closeModal()
    {
        $this->modalOpen = false;
        $this->resetValidation();
    }

    public function saveEstudiante()
    {
        // Ajustar la regla unique para ignorar el registro actual en edición
        if ($this->modalMode === 'edit' && $this->estudianteId) {
            $this->rules['codigo_universidad'] = 'required|string|max:20|unique:estudiantes,codigo_universidad,' . $this->estudianteId;
            $this->rules['dni'] = 'required|string|max:15|unique:estudiantes,dni,' . $this->estudianteId;
        } else {
            $this->rules['codigo_universidad'] = 'required|string|max:20|unique:estudiantes,codigo_universidad';
            $this->rules['dni'] = 'required|string|max:15|unique:estudiantes,dni';
        }
        $this->validate($this->rules, $this->messages);

        if ($this->modalMode === 'create') {
            EstudianteModel::create([
                'nombres' => $this->nombres,
                'apellidos' => $this->apellidos,
                'codigo_universidad' => $this->codigo_universidad,
                'dni' => $this->dni,
                'celular' => $this->celular,
                'facultad_id' => $this->facultad_id,
            ]);
            $this->dispatch('show-success-modal', message: 'El estudiante ha sido creado correctamente.');
        } else if ($this->modalMode === 'edit' && $this->estudianteId) {
            $estudiante = EstudianteModel::findOrFail($this->estudianteId);
            // Solo actualizar si hay cambios
            if (
                $estudiante->nombres !== $this->nombres ||
                $estudiante->apellidos !== $this->apellidos ||
                $estudiante->codigo_universidad !== $this->codigo_universidad ||
                $estudiante->dni !== $this->dni ||
                $estudiante->celular !== $this->celular ||
                $estudiante->facultad_id != $this->facultad_id
            ) {
                $estudiante->update([
                    'nombres' => $this->nombres,
                    'apellidos' => $this->apellidos,
                    'codigo_universidad' => $this->codigo_universidad,
                    'dni' => $this->dni,
                    'celular' => $this->celular,
                    'facultad_id' => $this->facultad_id,
                ]);
                $this->dispatch('show-success-modal', message: 'El estudiante ha sido actualizado correctamente.');
            } else {
                $this->dispatch('show-success-modal', message: 'No se realizaron cambios.');
            }
        }
        $this->closeModal();
    }

    public function confirmDelete($id)
    {
        $this->estudianteToDelete = $id;
        $this->confirmingDelete = true;
    }

    public function closeDeleteModal()
    {
        $this->confirmingDelete = false;
        $this->estudianteToDelete = null;
    }

    public function deleteEstudiante()
    {
        EstudianteModel::destroy($this->estudianteToDelete);
        $this->confirmingDelete = false;
        $this->estudianteToDelete = null;
        $this->dispatch('show-success-modal', message: 'El estudiante ha sido eliminado correctamente.');
    }

    
}
