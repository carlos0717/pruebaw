<div>
    @if($modalOpen)
        <div class="fixed inset-0 flex items-center justify-center z-50 bg-black bg-opacity-40">
            <div class="bg-white rounded-lg shadow-lg w-full max-w-md p-6">
                <h2 class="text-lg font-bold mb-4">{{ $modalMode === 'create' ? 'Nuevo Tipo de Institución' : 'Editar Tipo de Institución' }}</h2>
                <form wire:submit.prevent="save">
                    <div class="mb-4">
                        <label class="block text-gray-700">Nombre</label>
                        <input type="text" wire:model.defer="nombre" maxlength="100" class="w-full border rounded px-3 py-2 mt-1 @error('nombre') border-red-500 @enderror" placeholder="Ej: Comunidad" />
                        @error('nombre') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700">Descripción</label>
                        <input type="text" wire:model.defer="descripcion" maxlength="255" class="w-full border rounded px-3 py-2 mt-1 @error('descripcion') border-red-500 @enderror" placeholder="Descripción del tipo" />
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
