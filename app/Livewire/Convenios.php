<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use App\Models\Convenio;
use App\Models\Institucion;
use App\Models\InstitucionTipo;

class Convenios extends Component
{
    use WithPagination, WithFileUploads;

    public $search = '';
    public $modalOpen = false;
    public $modalMode = 'create';
    public $confirmingDelete = false;
    public $convenioId;
    public $nombre;
    public $descripcion;
    public $institucion_id;
    public $estado_id;
    public $fecha_inicio;
    public $fecha_fin;
    public $activo = 1;
    public $documento_nombre;
    public $documento_escaneado_path;
    public $documento_escaneado;
    public $showInstitucionModal = false;
    public $institucion_search = '';
    public $newInstitucion = [];
    public $tiposInstitucion;

    public function mount()
    {
        $this->tiposInstitucion = InstitucionTipo::all();
    }

    public function searchInstituciones($search)
    {
        return Institucion::where('nombre', 'like', '%'.$search.'%')
            ->with('tipo')
            ->orderBy('nombre')
            ->limit(10)
            ->get();
    }

    public function saveNewInstitucion()
    {
        $this->validate([
            'newInstitucion.nombre' => 'required|string|max:255',
            'newInstitucion.institucion_tipo_id' => 'required|exists:institucion_tipos,id',
            'newInstitucion.direccion' => 'nullable|string|max:255'
        ]);
        
        $institucion = Institucion::create($this->newInstitucion);
        $this->institucion_id = $institucion->id;
        $this->newInstitucion = [];
    }

    protected $rules = [
        'nombre' => 'required|string|max:255',
        'descripcion' => 'nullable|string|max:500',
        'institucion_id' => 'required|exists:instituciones,id',
        'estado_id' => 'required|exists:estados,id',
        'fecha_inicio' => 'nullable|date',
        'fecha_fin' => 'nullable|date|after_or_equal:fecha_inicio',
        'documento_nombre' => 'nullable|string|max:255',
        'documento_escaneado' => 'nullable|file|mimes:pdf|max:2048',
        'activo' => 'required|boolean',
    ];

    public function render()
    {
        $convenios = Convenio::with(['institucion', 'estado'])
            ->when($this->search, function($query) {
                $query->where('nombre', 'like', '%'.$this->search.'%')
                      ->orWhereHas('institucion', function($q) {
                          $q->where('nombre', 'like', '%'.$this->search.'%');
                      });
            })
            ->orderBy('id', 'desc')
            ->paginate(10);

        $instituciones = \App\Models\Institucion::orderBy('nombre')->get();
        $estados = \App\Models\Estado::orderBy('nombre')->get();

        return view('livewire.convenios', [
            'convenios' => $convenios,
            'instituciones' => $instituciones,
            'estados' => $estados
        ]);
    }

    public function openModal($mode = 'create', $id = null)
    {
        $this->resetValidation();
        $this->reset(['nombre', 'descripcion', 'institucion_id', 'estado_id', 'fecha_inicio', 'fecha_fin', 'activo', 'convenioId']);
        $this->modalMode = $mode;
        if ($mode === 'edit' && $id) {
            $convenio = Convenio::findOrFail($id);
            $this->convenioId = $convenio->id;
            $this->nombre = $convenio->nombre;
            $this->descripcion = $convenio->descripcion;
            $this->institucion_id = $convenio->institucion_id;
            $this->estado_id = $convenio->estado_id;
            $this->fecha_inicio = $convenio->fecha_inicio;
            $this->fecha_fin = $convenio->fecha_fin;
            $this->activo = $convenio->activo;
            $this->documento_nombre = $convenio->documento_nombre;
            $this->documento_escaneado_path = $convenio->documento_escaneado_path;
        } else {
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
        $this->validate();
        if ($this->modalMode === 'create') {
            Convenio::create([
                'nombre' => $this->nombre,
                'descripcion' => $this->descripcion,
                'institucion_id' => $this->institucion_id,
                'estado_id' => $this->estado_id,
                'fecha_inicio' => $this->fecha_inicio,
                'fecha_fin' => $this->fecha_fin,
                'activo' => $this->activo,
            ]);
            session()->flash('success_message', 'Convenio creado correctamente.');
        } else {
            $convenio = Convenio::findOrFail($this->convenioId);
            $convenio->update([
                'nombre' => $this->nombre,
                'descripcion' => $this->descripcion,
                'institucion_id' => $this->institucion_id,
                'estado_id' => $this->estado_id,
                'fecha_inicio' => $this->fecha_inicio,
                'fecha_fin' => $this->fecha_fin,
                'activo' => $this->activo,
            ]);
            session()->flash('success_message', 'Convenio actualizado correctamente.');
        }
        $this->closeModal();
    }

    public function confirmDelete($id)
    {
        $this->convenioId = $id;
        $this->confirmingDelete = true;
    }

    public function delete()
    {
        $convenio = Convenio::findOrFail($this->convenioId);
        $convenio->delete();
        $this->confirmingDelete = false;
        session()->flash('success_message', 'Convenio eliminado correctamente.');
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }
}
