<div>
    <h2 class="text-xl font-bold text-gray-800 mb-2">Listado de Direcciones</h2>
    <div class="flex justify-end mb-2">
        <button wire:click="openModal" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Agregar Dirección</button>
    </div>
    <div class="w-full md:w-1/3 mb-6">
        <input type="text" wire:model.live.debounce.500ms="search" placeholder="Buscar dirección..." class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400" />
    </div>
    <div class="overflow-x-auto bg-white rounded shadow">
        <table class="min-w-full w-full table-auto divide-y divide-gray-200">
            <thead class="bg-blue-900 text-white">
                <tr>
                    <th class="py-2 px-4 text-center">Nombre</th>
                    <th class="py-2 px-4 text-center">Descripción</th>
                    <th class="py-2 px-4 text-center">Acciones</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse($direcciones as $direccion)
                <tr>
                    <td class="px-4 py-3 whitespace-nowrap text-center align-top">{{ $direccion->nombre }}</td>
                    <td class="px-4 py-3 whitespace-nowrap text-center align-top">{{ $direccion->descripcion }}</td>
                    <td class="px-4 py-3 whitespace-nowrap text-center align-top">
                        <div class="flex justify-center gap-2">
                            <button wire:click="openModal({{ $direccion->id }})" class="bg-yellow-400 text-white px-3 py-1 rounded hover:bg-yellow-500">Editar</button>
                            <button wire:click="confirmDelete({{ $direccion->id }})" class="bg-red-600 text-white px-3 py-1 rounded hover:bg-red-700">Eliminar</button>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="3" class="px-4 py-6 text-center text-gray-500">No se encontraron direcciones.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="mt-4">{{ $direcciones->links() }}</div>
    <!-- Modal Crear/Editar Dirección -->
    @if($showModal)
        <div class="fixed inset-0 flex items-center justify-center z-50 bg-black bg-opacity-40">
            <div class="bg-white rounded-lg shadow-lg w-full max-w-md p-6">
                <h2 class="text-lg font-bold mb-4">{{ $isEdit ? 'Editar Dirección' : 'Agregar Dirección' }}</h2>
                <div class="mb-4">
                    <label class="block text-gray-700">Nombre de la Dirección</label>
                    <input type="text" wire:model.defer="nombre" maxlength="255" class="w-full border rounded px-3 py-2 mt-1 @error('nombre') border-red-500 @enderror" placeholder="Ej: Dirección Académica" />
                    @error('nombre') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700">Descripción</label>
                    <textarea wire:model.defer="descripcion" maxlength="500" class="w-full border rounded px-3 py-2 mt-1 @error('descripcion') border-red-500 @enderror" placeholder="Descripción de la dirección"></textarea>
                    @error('descripcion') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>
                <div class="flex justify-end gap-2 mt-4">
                    <button type="button" wire:click="closeModal" class="bg-gray-300 px-4 py-2 rounded">Cancelar</button>
                    <button wire:click="saveDireccion" class="bg-blue-600 text-white px-4 py-2 rounded">{{ $isEdit ? 'Actualizar' : 'Crear' }}</button>
                </div>
            </div>
        </div>
    @endif
    <!-- Confirm Delete Modal -->
    @if($showDeleteModal)
        <div class="fixed inset-0 flex items-center justify-center z-50 bg-black bg-opacity-40">
            <div class="bg-white rounded-lg shadow-lg w-full max-w-md p-6">
                <h2 class="text-lg font-bold mb-4">Eliminar Dirección</h2>
                <p class="mb-4">¿Está seguro que desea eliminar esta dirección?</p>
                <div class="flex justify-end gap-2 mt-4">
                    <button type="button" wire:click="closeDeleteModal" class="bg-gray-300 px-4 py-2 rounded">Cancelar</button>
                    <button wire:click="deleteDireccion" class="bg-red-600 text-white px-4 py-2 rounded">Eliminar</button>
                </div>
            </div>
        </div>
    @endif
    <!-- Modal de éxito con Alpine.js -->
    <x-exito-modal message="Los cambios se han guardado correctamente." />
</div>
