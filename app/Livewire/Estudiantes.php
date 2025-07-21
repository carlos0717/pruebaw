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
            $this->rules['codigo_universidad'] = 'required|string|max:20|unique:estudiantes,codigo_universidad,' . $id;
            $this->rules['dni'] = 'required|string|max:15|unique:estudiantes,dni,' . $id;
        } else {
            $this->rules['codigo_universidad'] = 'required|string|max:20|unique:estudiantes,codigo_universidad';
            $this->rules['dni'] = 'required|string|max:15|unique:estudiantes,dni';
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
        $this->validate();
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
            $estudiante->update([
                'nombres' => $this->nombres,
                'apellidos' => $this->apellidos,
                'codigo_universidad' => $this->codigo_universidad,
                'dni' => $this->dni,
                'celular' => $this->celular,
                'facultad_id' => $this->facultad_id,
            ]);
            $this->dispatch('show-success-modal', message: 'El estudiante ha sido actualizado correctamente.');
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
