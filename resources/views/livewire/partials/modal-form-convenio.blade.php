<div class="fixed inset-0 flex items-center justify-center z-50 bg-black bg-opacity-40">
    <div class="bg-white rounded-lg shadow-lg w-full max-w-2xl p-6 overflow-y-auto max-h-[90vh] relative">
        <!-- Botón X de cierre -->
        <button type="button" wire:click="closeModal" class="absolute top-3 right-3 text-gray-400 hover:text-gray-700 text-2xl font-bold focus:outline-none" aria-label="Cerrar">&times;</button>
        <h2 class="text-lg font-bold mb-4">{{ $modalMode === 'create' ? 'Nuevo Convenio' : 'Editar Convenio' }}</h2>
        <form wire:submit.prevent="save">
            <div class="mb-4">
                <label class="block text-gray-700">Nombre del Convenio</label>
                <input type="text" wire:model.defer="nombre" maxlength="255" class="w-full border rounded px-3 py-2 mt-1 @error('nombre') border-red-500 @enderror" placeholder="Nombre del convenio" />
                @error('nombre') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            </div>
            <div class="mb-4">
                <label class="block text-gray-700">Institución</label>
                <button type="button" wire:click="$set('showInstitucionModal', true)" class="bg-blue-100 text-blue-800 px-3 py-2 rounded hover:bg-blue-200 mt-2">
                    Seleccionar Institución
                </button>
                <div class="mt-2">
                    @if($institucion_id && ($inst = $instituciones->firstWhere('id', $institucion_id)))
                    <div class="flex items-center justify-between bg-green-100 rounded px-3 py-2">
                        <span class="font-semibold">{{ $inst->nombre }} - {{ $inst->tipo->nombre ?? 'Sin tipo' }}</span>
                        <button type="button" wire:click.stop="$set('institucion_id', null)" class="text-red-600 hover:text-red-800 text-xs ml-2 font-bold">QUITAR</button>
                    </div>
                    @endif
                </div>
                @error('institucion_id') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="mb-4">
                    <label class="block text-gray-700">Número de Resolución</label>
                    <input type="text" wire:model.defer="documento_nombre" maxlength="100" class="w-full border rounded px-3 py-2 mt-1 @error('documento_nombre') border-red-500 @enderror" placeholder="Ej: R.R. N° 123-2025" />
                    @error('documento_nombre') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700">Documento Escaneado (PDF, Máx. 5MB)</label>
                    <input type="file" wire:model="documento_escaneado" accept=".pdf" class="w-full border rounded px-3 py-2 mt-1 @error('documento_escaneado') border-red-500 @enderror" />
                    @error('documento_escaneado') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror

                    <!-- Lógica para mostrar archivo actual Y ELIMINARLO -->
                    @if ($modalMode === 'edit' && $documento_escaneado_path)
                    <div class="mt-2 text-sm flex items-center justify-between bg-gray-100 p-2 rounded">
                        <div>
                            <span class="text-gray-600 font-semibold">Archivo actual:</span>
                            <a href="{{ Storage::url($documento_escaneado_path) }}" target="_blank" class="text-blue-600 hover:underline ml-2">
                                Ver Documento
                            </a>
                        </div>
                        <!-- Botón para eliminar el documento -->
                        <button
                            type="button"
                            wire:click="confirmDocumentDelete"
                            wire:loading.attr="disabled"
                            class="text-red-500 hover:text-red-700 font-bold text-xs">
                            ELIMINAR
                        </button>
                    </div>
                    @endif
                </div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
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
                <textarea wire:model.defer="descripcion" maxlength="500" class="w-full border rounded px-3 py-2 mt-1 @error('descripcion') border-red-500 @enderror" placeholder="Descripción u observaciones del convenio"></textarea>
                @error('descripcion') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            </div>
            <div class="flex justify-end gap-2 mt-4">
                <button type="button" wire:click="closeModal" class="bg-gray-300 px-4 py-2 rounded">Cancelar</button>
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Guardar</button>
            </div>
        </form>
    </div>
</div>