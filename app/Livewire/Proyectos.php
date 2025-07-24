<?php

namespace App\Livewire;

use App\Models\Proyectos as ProyectoModel;
use App\Models\Docente;
use App\Models\Estudiantes;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;

class Proyectos extends Component
{
    use WithPagination;

    public $modalOpen = false;
    public $modalMode = 'create';
    public $proyectoId;
    public $tematica, $titulo, $lineas_rsu, $objetivos_desarrollo_sostenible = [], $ubicacion_localidad, $ubicacion_distrito, $ubicacion_provincia;
    public $beneficiarios_numero_minimo, $beneficiarios_numero_maximo, $acciones_concretas, $fecha_inicio, $fecha_termino, $estado = 'Registrado';
    public $docente_tutor_id, $docente_search = '', $docente_selected = null;
    public $equipo_estudiantes = [], $estudiante_search = '', $estudiante_selected = null;
    public $showEstudianteModal = false;
    public $showDocenteModal = false;
    public $newEstudiante = [];
    public $showOdsModal = false;
    public $newOds = [];
    public $search = '';
    public $confirmingDelete = false;
    public $proyectoToDelete;
    public $ods_search = '';
    public $showDetalleModal = false;
    public $detalleProyecto = null;
    public function verDetalle($id)
    {
        $this->detalleProyecto = ProyectoModel::with(['docenteTutor', 'estudiantes', 'objetivos'])->findOrFail($id);
        $this->showDetalleModal = true;
    }
    public function cerrarDetalleModal()
    {
        $this->showDetalleModal = false;
        $this->detalleProyecto = null;
    }

    protected $rules = [
        'titulo' => 'required|string|max:255',
        'tematica' => 'nullable|string',
        'lineas_rsu' => 'nullable|string',
        'objetivos_desarrollo_sostenible' => 'nullable|array',
        'ubicacion_localidad' => 'nullable|string|max:255',
        'ubicacion_distrito' => 'nullable|string|max:255',
        'ubicacion_provincia' => 'nullable|string|max:255',
        'beneficiarios_numero_minimo' => 'nullable|integer',
        'beneficiarios_numero_maximo' => 'nullable|integer',
        'acciones_concretas' => 'nullable|string',
        'fecha_inicio' => 'nullable|date',
        'fecha_termino' => 'nullable|date',
        'estado' => 'required|string',
        'docente_tutor_id' => 'required|exists:docentes,id',
        'equipo_estudiantes' => 'required|array|min:2|max:4',
    ];

    public function render()
    {
        $proyectos = ProyectoModel::with(['docenteTutor', 'estudiantes'])
            ->when($this->search, function($query) {
                $query->where('titulo', 'like', '%'.$this->search.'%');
            })
            ->orderBy('id', 'desc')
            ->paginate(10);
        return view('livewire.proyectos', compact('proyectos'));
    }

    public function openModal($mode = 'create', $id = null)
    {
        $this->resetValidation();
        $this->reset(['tematica','titulo','lineas_rsu','objetivos_desarrollo_sostenible','ubicacion_localidad','ubicacion_distrito','ubicacion_provincia','beneficiarios_numero_minimo','beneficiarios_numero_maximo','acciones_concretas','fecha_inicio','fecha_termino','estado','docente_tutor_id','equipo_estudiantes','proyectoId']);
        $this->modalMode = $mode;
        if ($mode === 'edit' && $id) {
            $proyecto = ProyectoModel::with(['estudiantes', 'objetivos'])->findOrFail($id);
            $this->proyectoId = $proyecto->id;
            $this->tematica = $proyecto->tematica;
            $this->titulo = $proyecto->titulo;
            $this->lineas_rsu = $proyecto->lineas_rsu;
            $this->objetivos_desarrollo_sostenible = $proyecto->objetivos->pluck('id')->toArray();
            $this->ubicacion_localidad = $proyecto->ubicacion_localidad;
            $this->ubicacion_distrito = $proyecto->ubicacion_distrito;
            $this->ubicacion_provincia = $proyecto->ubicacion_provincia;
            $this->beneficiarios_numero_minimo = $proyecto->beneficiarios_numero_minimo;
            $this->beneficiarios_numero_maximo = $proyecto->beneficiarios_numero_maximo;
            $this->acciones_concretas = $proyecto->acciones_concretas;
            $this->fecha_inicio = $proyecto->fecha_inicio;
            $this->fecha_termino = $proyecto->fecha_termino;
            $this->estado = $proyecto->estado;
            $this->docente_tutor_id = $proyecto->docente_tutor_id;
            $this->equipo_estudiantes = $proyecto->estudiantes->pluck('id')->toArray();
        }
        $this->modalOpen = true;
    }

    public function closeModal()
    {
        $this->modalOpen = false;
        $this->resetValidation();
    }

    public function saveProyecto()
    {
        $this->validate();
        DB::beginTransaction();
        try {
            $data = [
                'tematica' => $this->tematica,
                'titulo' => $this->titulo,
                'lineas_rsu' => $this->lineas_rsu,
                'ubicacion_localidad' => $this->ubicacion_localidad,
                'ubicacion_distrito' => $this->ubicacion_distrito,
                'ubicacion_provincia' => $this->ubicacion_provincia,
                'beneficiarios_numero_minimo' => $this->beneficiarios_numero_minimo,
                'beneficiarios_numero_maximo' => $this->beneficiarios_numero_maximo,
                'acciones_concretas' => $this->acciones_concretas,
                'fecha_inicio' => $this->fecha_inicio,
                'fecha_termino' => $this->fecha_termino,
                'estado' => $this->estado,
                'docente_tutor_id' => $this->docente_tutor_id,
            ];
            if ($this->modalMode === 'create') {
                $proyecto = ProyectoModel::create($data);
                $this->dispatch('show-success-modal', message: 'El proyecto ha sido creado correctamente.');
            } else if ($this->modalMode === 'edit' && $this->proyectoId) {
                $proyecto = ProyectoModel::findOrFail($this->proyectoId);
                $proyecto->update($data);
                $this->dispatch('show-success-modal', message: 'El proyecto ha sido actualizado correctamente.');
            }
            // Guardar estudiantes en tabla pivote (solo IDs)
            $proyecto->estudiantes()->sync($this->equipo_estudiantes);
            // Guardar ODS en tabla pivote (solo IDs)
            $proyecto->objetivos()->sync($this->objetivos_desarrollo_sostenible);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            $this->addError('general', 'Error al guardar el proyecto: '.$e->getMessage());
            return;
        }
        $this->closeModal();
    }

    public function confirmDelete($id)
    {
        $this->proyectoToDelete = $id;
        $this->confirmingDelete = true;
    }

    public function closeDeleteModal()
    {
        $this->confirmingDelete = false;
        $this->proyectoToDelete = null;
    }

    public function deleteProyecto()
    {
        ProyectoModel::destroy($this->proyectoToDelete);
        $this->confirmingDelete = false;
        $this->proyectoToDelete = null;
        $this->dispatch('show-success-modal', message: 'El proyecto ha sido eliminado correctamente.');
    }

    // Métodos para búsqueda y registro de estudiantes/docentes/ods
    public function searchEstudiantes($query)
    {
        return Estudiantes::where('nombres', 'like', "%$query%")
            ->orWhere('apellidos', 'like', "%$query%")
            ->orWhere('codigo_universidad', 'like', "%$query%")
            ->limit(10)->get();
    }
    public function searchDocentes($query)
    {
        return Docente::where('nombres', 'like', "%$query%")
            ->orWhere('apellidos', 'like', "%$query%")
            ->orWhere('dni', 'like', "%$query%")
            ->limit(10)->get();
    }
    public function searchOds($query)
    {
        return \App\Models\Objetivos_desarrollo_sostenible::where('nombre', 'like', "%$query%")
            ->limit(10)->get();
    }
    public function addEstudianteToEquipo($estudianteId)
    {
        if (!in_array($estudianteId, $this->equipo_estudiantes) && count($this->equipo_estudiantes) < 4) {
            $this->equipo_estudiantes[] = $estudianteId;
        }
    }
    public function removeEstudianteFromEquipo($estudianteId)
    {
        $this->equipo_estudiantes = array_values(array_filter($this->equipo_estudiantes, fn($id) => $id != $estudianteId));
    }
    public function addOdsToProyecto($odsId)
    {
        if (!in_array($odsId, $this->objetivos_desarrollo_sostenible)) {
            $this->objetivos_desarrollo_sostenible[] = $odsId;
        }
    }
    public function removeOdsFromProyecto($odsId)
    {
        $this->objetivos_desarrollo_sostenible = array_values(array_filter($this->objetivos_desarrollo_sostenible, fn($id) => $id != $odsId));
    }
    public function showEstudianteRegisterModal()
    {
        $this->showEstudianteModal = true;
        $this->newEstudiante = [];
    }
    public function showOdsRegisterModal()
    {
        $this->showOdsModal = true;
        $this->newOds = [];
    }
    public function saveNewEstudiante()
    {
        $validated = $this->validate([
            'newEstudiante.nombres' => 'required|string|max:255',
            'newEstudiante.apellidos' => 'required|string|max:255',
            'newEstudiante.codigo_universidad' => 'required|string|max:20|unique:estudiantes,codigo_universidad',
            'newEstudiante.dni' => 'required|string|max:15|unique:estudiantes,dni',
            'newEstudiante.celular' => 'nullable|string|max:20',
            'newEstudiante.facultad_id' => 'required|exists:facultades,id',
        ]);
        $estudiante = Estudiantes::create($validated['newEstudiante']);
        $this->addEstudianteToEquipo($estudiante->id);
        $this->showEstudianteModal = false;
    }
    public function saveNewOds()
    {
        $validated = $this->validate([
            'newOds.nombre' => 'required|string|max:255|unique:objetivos_desarrollo_sostenible,nombre',
            'newOds.descripcion' => 'nullable|string',
        ]);
        $ods = \App\Models\Objetivos_desarrollo_sostenible::create($validated['newOds']);
        $this->addOdsToProyecto($ods->id);
        $this->showOdsModal = false;
    }
}
