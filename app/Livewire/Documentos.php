<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use App\Models\Documentos as DocumentosModel;
use App\Models\CategoriaDocumento;
use Illuminate\Support\Facades\Storage;

class Documentos extends Component
{
    use WithPagination, WithFileUploads;

    public $search = '';
    public $modalOpen = false;
    public $modalMode = 'create';
    public $confirmingDelete = false;
    public $documentoToDelete;
    public $titulo, $path_archivo, $formato, $tamano_mb, $categoria_id, $user_id, $area_origen;
    public $archivoActual;
    public $archivo_pdf;
    public $documentoId;
    public $confirmingDeleteArchivo = false;

    protected $rules = [
        'titulo' => 'required|string|max:255',
        'categoria_id' => 'required|exists:categorias_documentos,id',
        'area_origen' => 'required|in:RSU,Seguimiento al Egresado,Proyeccion Social,Extension Universitaria',
        'archivo_pdf' => 'required|file|mimes:pdf|max:10240', // 10MB máximo
    ];

    public function render()
    {
        $documentos = DocumentosModel::with('categoria')
            ->where('titulo', 'like', '%'.$this->search.'%')
            ->orderBy('created_at', 'desc')
            ->paginate(10);
        $categorias = CategoriaDocumento::all();
        return view('livewire.documentos', compact('documentos', 'categorias'));
    }

    public function showCreateModal()
    {
        $this->resetForm();
        $this->modalMode = 'create';
        $this->modalOpen = true;
    }

    public function showEditModal($id)
    {
        $this->resetForm();
        $this->modalMode = 'edit';
        $this->documentoId = $id;
        $doc = DocumentosModel::findOrFail($id);
        $this->titulo = $doc->titulo;
        $this->categoria_id = $doc->categoria_id;
        $this->formato = $doc->formato;
        $this->tamano_mb = $doc->tamano_mb;
        $this->area_origen = $doc->area_origen;
        $this->archivoActual = $doc->path_archivo;
        $this->modalOpen = true;
        $this->confirmingDeleteArchivo = false;
    }

    public function closeModal()
    {
        $this->modalOpen = false;
        $this->resetValidation();
        $this->confirmingDeleteArchivo = false;
    }

    public function confirmDelete($id)
    {
        $this->documentoToDelete = $id;
        $this->confirmingDelete = true;
    }

    public function closeDeleteModal()
    {
        $this->confirmingDelete = false;
    }

    public function deleteDocumento()
    {
        DocumentosModel::destroy($this->documentoToDelete);
        $this->confirmingDelete = false;
        $this->dispatch('show-success-modal', ['message' => 'Documento eliminado correctamente.']);
    }

    public function create()
    {
        $this->validate();
        $path = $this->archivo_pdf->store('documentos', 'public');
        $tamano_mb = round($this->archivo_pdf->getSize() / 1048576, 2);
        DocumentosModel::create([
            'titulo' => $this->titulo,
            'categoria_id' => $this->categoria_id,
            'formato' => 'pdf',
            'tamano_mb' => $tamano_mb,
            'user_id' => auth()->id(),
            'path_archivo' => $path,
            'area_origen' => $this->area_origen,
        ]);
        $this->closeModal();
    }

    public function update()
    {
        $this->validate([
            'titulo' => 'required|string|max:255',
            'categoria_id' => 'required|exists:categorias_documentos,id',
            'area_origen' => 'required|in:RSU,Seguimiento al Egresado,Proyeccion Social,Extension Universitaria',
            'archivo_pdf' => 'nullable|file|mimes:pdf|max:10240',
        ]);
        $doc = DocumentosModel::findOrFail($this->documentoId);
        $data = [
            'titulo' => $this->titulo,
            'categoria_id' => $this->categoria_id,
            'area_origen' => $this->area_origen,
        ];
        if ($this->archivo_pdf) {
            $path = $this->archivo_pdf->store('documentos', 'public');
            $tamano_mb = round($this->archivo_pdf->getSize() / 1048576, 2);
            $data['formato'] = 'pdf';
            $data['tamano_mb'] = $tamano_mb;
            $data['path_archivo'] = $path;
        }
        $doc->update($data);
        $this->closeModal();
    }

    private function resetForm()
    {
        $this->titulo = '';
        $this->categoria_id = '';
        $this->archivo_pdf = null;
        $this->documentoId = null;
        $this->area_origen = '';
        $this->archivoActual = null;
        $this->confirmingDeleteArchivo = false;
    }

    /**
     * Solicita confirmación para eliminar el archivo actual del documento en edición
     */
    public function confirmarEliminarArchivo()
    {
        $this->confirmingDeleteArchivo = true;
    }

    /**
     * Elimina el archivo actual del documento en edición
     */
    public function eliminarArchivo()
    {
        if ($this->archivoActual && $this->documentoId) {
            $doc = DocumentosModel::find($this->documentoId);
            if ($doc && $doc->path_archivo) {
                Storage::disk('public')->delete($doc->path_archivo);
                // En vez de poner null, dejamos el valor anterior, pero marcamos una bandera temporal
                // para forzar la subida de un nuevo archivo antes de guardar cambios
                $this->archivoActual = null;
                $this->addError('archivo_pdf', 'Debe subir un nuevo archivo PDF para guardar los cambios.');
            }
        }
        $this->confirmingDeleteArchivo = false;
    }
}
// Archivo movido correctamente desde App\Http\Livewire\Documentos.php
