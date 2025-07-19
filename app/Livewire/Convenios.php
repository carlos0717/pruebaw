<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use App\Models\Convenio;
use App\Models\Institucion;
use App\Models\InstitucionTipo;
use App\Models\Estado;
use Illuminate\Support\Facades\Storage;

class Convenios extends Component
{
    use WithPagination, WithFileUploads;

    // Propiedades del componente
    public $search = '';
    public $modalOpen = false;
    public $modalMode = 'create';
    public $convenioId;
    public $nombre, $descripcion, $institucion_id, $estado_id, $fecha_inicio, $fecha_fin, $documento_nombre;
    // public $activo = 1; // PROPIEDAD ELIMINADA
    public $documento_escaneado;
    public $documento_escaneado_path;
    public $showInstitucionModal = false;
    public $institucion_search = '';
    public $newInstitucion = [];
    public $tiposInstitucion;

    /**
     * Reglas de validación condicionales.
     */
    protected function rules()
    {
        $rules = [
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string|max:500',
            'institucion_id' => 'required|exists:instituciones,id',
            'estado_id' => 'required|exists:estados,id',
            'fecha_inicio' => 'nullable|date',
            'fecha_fin' => 'nullable|date|after_or_equal:fecha_inicio',
            'documento_nombre' => 'nullable|string|max:255',
            // 'activo' => 'required|boolean', // LÍNEA ELIMINADA
        ];

        if ($this->modalMode === 'create') {
            $rules['documento_escaneado'] = 'required|file|mimes:pdf|max:5120';
        } elseif ($this->documento_escaneado) {
            $rules['documento_escaneado'] = 'nullable|file|mimes:pdf|max:5120';
        }
        
        return $rules;
    }

    public function mount()
    {
        $this->tiposInstitucion = InstitucionTipo::orderBy('nombre')->get();
    }

    /**
     * Renderiza la vista con los datos necesarios.
     */
    public function render()
    {
        $convenios = Convenio::with(['institucion.institucionTipo', 'estado'])
            ->when($this->search, function ($query) {
                $query->where('nombre', 'like', '%' . $this->search . '%')
                      ->orWhereHas('institucion', function ($q) {
                          $q->where('nombre', 'like', '%' . $this->search . '%');
                      });
            })
            ->orderBy('id', 'desc')
            ->paginate(10);

        return view('livewire.convenios', [
            'convenios' => $convenios,
            'instituciones' => Institucion::with('institucionTipo')->orderBy('nombre')->get(),
            'estados' => Estado::orderBy('nombre')->get()
        ]);
    }

    public function openModal($mode = 'create', $id = null)
    {
        $this->resetValidation();
        // Campo 'activo' eliminado del reset
        $this->reset(['nombre', 'descripcion', 'institucion_id', 'estado_id', 'fecha_inicio', 'fecha_fin', 'convenioId', 'documento_nombre', 'documento_escaneado_path', 'documento_escaneado']);
        $this->modalMode = $mode;

        if ($mode === 'edit' && $id) {
            $convenio = Convenio::findOrFail($id);
            $this->convenioId = $convenio->id;
            $this->nombre = $convenio->nombre;
            $this->descripcion = $convenio->descripcion;
            $this->institucion_id = $convenio->institucion_id;
            $this->estado_id = $convenio->estado_id;
            $this->fecha_inicio = $convenio->fecha_inicio ? $convenio->fecha_inicio->format('Y-m-d') : null;
            $this->fecha_fin = $convenio->fecha_fin ? $convenio->fecha_fin->format('Y-m-d') : null;
            // $this->activo = $convenio->activo; // LÍNEA ELIMINADA
            $this->documento_nombre = $convenio->documento_nombre;
            $this->documento_escaneado_path = $convenio->documento_escaneado_path;
        }
        
        $this->modalOpen = true;
    }

    public function closeModal()
    {
        $this->modalOpen = false;
    }

    public function save()
    {
        $this->validate();

        $data = [
            'nombre' => $this->nombre,
            'descripcion' => $this->descripcion,
            'institucion_id' => $this->institucion_id,
            'estado_id' => $this->estado_id,
            'fecha_inicio' => $this->fecha_inicio,
            'fecha_fin' => $this->fecha_fin,
            // 'activo' => $this->activo, // LÍNEA ELIMINADA
            'documento_nombre' => $this->documento_nombre,
        ];

        if ($this->documento_escaneado) {
            if ($this->modalMode === 'edit' && $this->documento_escaneado_path) {
                Storage::disk('public')->delete($this->documento_escaneado_path);
            }
            $path = $this->documento_escaneado->store('convenios', 'public');
            $data['documento_escaneado_path'] = $path;
        }

        Convenio::updateOrCreate(['id' => $this->convenioId], $data);
        
        $this->dispatch('show-success-modal', message: 'Convenio ' . ($this->modalMode === 'create' ? 'creado' : 'actualizado') . ' correctamente.');
        $this->closeModal();
    }

    public function selectInstitucion($id)
    {
        $this->institucion_id = $id;
    }

    public function removeInstitucion()
    {
        $this->institucion_id = null;
    }
    
    public function confirmInstitucionSelection()
    {
        $this->showInstitucionModal = false;
    }
    
    public function searchInstituciones($search)
    {
        return Institucion::where('nombre', 'like', '%' . $search . '%')
            ->with('institucionTipo')
            ->orderBy('nombre')
            ->limit(10)
            ->get();
    }
    
    public function saveNewInstitucion()
    {
        $validatedData = $this->validate([
            'newInstitucion.nombre' => 'required|string|max:255|unique:instituciones,nombre',
            'newInstitucion.institucion_tipo_id' => 'required|exists:institucion_tipos,id',
            'newInstitucion.direccion' => 'nullable|string|max:255'
        ]);
        $institucion = Institucion::create($validatedData['newInstitucion']);
        $this->institucion_id = $institucion->id;
        $this->newInstitucion = [];
        $this->dispatch('show-success-modal', message: 'Institución creada y seleccionada.');
    }
    
    public function confirmDelete($id)
    {
        $this->convenioId = $id;
        $this->dispatch('show-confirmation-modal', [
            'title' => 'Eliminar Convenio',
            'message' => '¿Estás seguro de que deseas eliminar este convenio? Esta acción no se puede deshacer.',
            'confirmButtonText' => 'Sí, Eliminar',
            'cancelButtonText' => 'No, Cancelar',
            'confirmMethod' => 'delete'
        ]);
    }

    public function delete()
    {
        $convenio = Convenio::findOrFail($this->convenioId);
        if ($convenio->documento_escaneado_path) {
            Storage::disk('public')->delete($convenio->documento_escaneado_path);
        }
        $convenio->delete();
        $this->dispatch('show-success-modal', message: 'Convenio eliminado con éxito.');
    }
        
    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function confirmDocumentDelete()
    {
        $this->dispatch('show-confirmation-modal', [
            'title' => 'Eliminar Documento',
            'message' => '¿Estás seguro de que deseas eliminar el documento adjunto a este convenio?',
            'confirmButtonText' => 'Sí, Eliminar Documento',
            'cancelButtonText' => 'Cancelar',
            'confirmMethod' => 'deleteDocument'
        ]);
    }

    public function deleteDocument()
    {
        $convenio = Convenio::findOrFail($this->convenioId);
        if ($convenio->documento_escaneado_path) {
            Storage::disk('public')->delete($convenio->documento_escaneado_path);
            $convenio->update(['documento_escaneado_path' => null]);
            $this->documento_escaneado_path = null;
            $this->dispatch('show-success-modal', message: 'Documento eliminado correctamente.');
        }
    }
}