<div>
    <h2 class="text-xl font-bold text-gray-800 mb-2">Gestión de Instituciones</h2>
    <div class="flex justify-end mb-2">
        <button wire:click="openModal('create')" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Nueva Institución</button>
    </div>
    <div class="w-full md:w-1/3 mb-6">
        <input type="text" wire:model.live.debounce.500ms="search" placeholder="Buscar por nombre..." class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400" />
    </div>
    <div class="overflow-x-auto bg-white rounded shadow">
        <table class="min-w-full w-full table-auto divide-y divide-gray-200">
            <thead class="bg-blue-900 text-white">
                <tr>
                    <th class="py-2 px-4 text-center uppercase w-16">#</th>
                    <th class="py-2 px-4 text-center uppercase">Nombre</th>
                    <th class="py-2 px-4 text-center uppercase">Tipo</th>
                    <th class="py-2 px-4 text-center uppercase">Descripción</th>
                    <th class="py-2 px-4 text-center uppercase">Activo</th>
                    <th class="py-2 px-4 text-center uppercase w-40">Acciones</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse($instituciones as $institucion)
                <tr>
                    <td class="px-4 py-3 text-center">{{ $institucion->id }}</td>
                    <td class="px-4 py-3">{{ $institucion->nombre }}</td>
                    <td class="px-4 py-3">{{ $institucion->institucionTipo->nombre ?? '-' }}</td>
                    <td class="px-4 py-3">{{ $institucion->descripcion }}</td>
                    <td class="px-4 py-3 text-center">{{ $institucion->activo ? 'Sí' : 'No' }}</td>
                    <td class="px-4 py-3 text-center">
                        <div class="flex justify-center gap-2">
                            <button wire:click="openModal('edit', {{ $institucion->id }})" class="bg-yellow-400 text-white px-3 py-1 rounded hover:bg-yellow-500">Editar</button>
                            <button wire:click="confirmDelete({{ $institucion->id }})" class="bg-red-600 text-white px-3 py-1 rounded hover:bg-red-700">Eliminar</button>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="px-4 py-6 text-center text-gray-500">No hay instituciones registradas.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="mt-4">
        {{ $instituciones->links() }}
    </div>
    @include('livewire.partials.modal-form-institucion')
    
    <x-success-modal />

    <!-- Modal de Confirmación de Eliminación de Institución -->
    @if($showDeleteModal)
        <div class="fixed inset-0 flex items-center justify-center z-50 bg-black bg-opacity-40">
            <div class="bg-white rounded-lg shadow-lg w-full max-w-md p-6">
                <h2 class="text-lg font-bold mb-4">Eliminar Institución</h2>
                @if($deleteWarning)
                    <p class="mb-4 text-red-600 font-semibold">{{ $deleteWarning }}</p>
                    <div class="flex justify-end gap-2 mt-4">
                        <button type="button" wire:click="closeDeleteModal" class="bg-blue-600 text-white px-4 py-2 rounded">Entendido</button>
                    </div>
                @else
                    <p class="mb-4">¿Está seguro que desea eliminar esta institución? Esta acción no se puede deshacer.</p>
                    <div class="flex justify-end gap-2 mt-4">
                        <button type="button" wire:click="closeDeleteModal" class="bg-gray-300 px-4 py-2 rounded">Cancelar</button>
                        <button type="button" wire:click="delete" class="bg-red-600 text-white px-4 py-2 rounded">Eliminar</button>
                    </div>
                @endif
            </div>
        </div>
    @endif
</div>
