<div>
    @if($modalOpen)
        <div class="fixed inset-0 flex items-center justify-center z-[100] bg-black bg-opacity-40">
            <div class="bg-white rounded-lg shadow-lg w-full max-w-lg p-6">
                <h2 class="text-lg font-bold mb-4">{{ $modalMode === 'create' ? 'Nuevo Convenio' : 'Editar Convenio' }}</h2>
                <form wire:submit.prevent="save">
                    <div class="mb-4">
                        <label class="block text-gray-700">Nombre</label>
                        <input type="text" wire:model.defer="nombre" maxlength="255" class="w-full border rounded px-3 py-2 mt-1 @error('nombre') border-red-500 @enderror" placeholder="Nombre del convenio" />
                        @error('nombre') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700">Institución</label>
                        <button type="button" wire:click="$set('showInstitucionModal', true)" class="bg-blue-100 text-blue-800 px-3 py-2 rounded hover:bg-blue-200 w-full text-left">
                            @if($institucion_id)
                                <div class="flex justify-between items-center">
                                    <span>{{ $instituciones->firstWhere('id', $institucion_id)->nombre }}</span>
                                    <button wire:click="$set('institucion_id', null)" class="ml-2 text-red-500 hover:text-red-700">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                        </svg>
                                    </button>
                                </div>
                            @else
                                Seleccionar Institución
                            @endif
                        </button>
                        @error('institucion_id') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                    </div>
                    <!-- aca debe tener otro apartado que es para registrar Numero de Resolucion que se registrara en documento_nombre -->
                    <div class="mb-4">
                        <label class="block text-gray-700">Número de Resolución</label>
                        <input type="text" wire:model.defer="documento_nombre" maxlength="100" class="w-full border rounded px-3 py-2 mt-1 @error('documento_nombre') border-red-500 @enderror" placeholder="Número de resolución del convenio" />
                        @error('documento_nombre') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                    </div>
                     <!-- aca se debe cargar el archivo pdf mediante el gestor de archivos -->
                    <div class="mb-4">
                        <label class="block text-gray-700">Documento Escaneado</label>
                        <input type="file" wire:model.defer="documento_escaneado" accept=".pdf" class="w-full border rounded px-3 py-2 mt-1 @error('documento_escaneado') border-red-500 @enderror" />
                        @error('documento_escaneado') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                    </div>
                    
                    <div class="mb-4">
                        <label class="block text-gray-700">Fecha Inicio</label>
                        <input type="date" wire:model.defer="fecha_inicio" class="w-full border rounded px-3 py-2 mt-1 @error('fecha_inicio') border-red-500 @enderror" />
                        @error('fecha_inicio') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700">Fecha Fin</label>
                        <input type="date" wire:model.defer="fecha_fin" class="w-full border rounded px-3 py-2 mt-1 @error('fecha_fin') border-red-500 @enderror" />
                        @error('fecha_fin') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700">Estado</label>
                        <select wire:model.defer="estado_id" class="w-full border rounded px-3 py-2 mt-1 @error('estado_id') border-red-500 @enderror">
                            <option value="">Seleccione un estado</option>
                            @foreach($estados as $est)
                                <option value="{{ $est->id }}">{{ $est->nombre }}</option>
                            @endforeach
                        </select>
                        @error('estado_id') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700">Descripción</label>
                        <textarea wire:model.defer="descripcion" maxlength="500" class="w-full border rounded px-3 py-2 mt-1 @error('descripcion') border-red-500 @enderror" placeholder="Descripción del convenio"></textarea>
                        @error('descripcion') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                    </div>
                    
                    <div class="flex justify-end gap-2 mt-4">
                        <button type="button" wire:click="closeModal" class="bg-gray-300 px-4 py-2 rounded">Cancelar</button>
                        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">{{ $modalMode === 'create' ? 'Crear' : 'Actualizar' }}</button>
                    </div>
                </form>
            </div>
        </div>
    @endif
</div>

@if($showInstitucionModal)
    @include('livewire.partials.institucion-modal', ['showInstitucionModal' => $showInstitucionModal])
@endif
