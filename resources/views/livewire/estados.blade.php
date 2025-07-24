<div>
    <h2 class="text-xl font-bold text-gray-800 mb-2">Gestión de Estados</h2>
    <div class="flex justify-end mb-2">
        <button wire:click="openModal('create')" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Nuevo Estado</button>
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
                    <th class="py-2 px-4 text-center uppercase">Descripción</th>
                    <th class="py-2 px-4 text-center uppercase">Color</th>
                    <th class="py-2 px-4 text-center uppercase">Activo</th>
                    <th class="py-2 px-4 text-center uppercase w-40">Acciones</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse($estados as $estado)
                <tr>
                    <td class="px-4 py-3 text-center">{{ $estado->id }}</td>
                    <td class="px-4 py-3">{{ $estado->nombre }}</td>
                    <td class="px-4 py-3">{{ $estado->descripcion }}</td>
                    <td class="px-4 py-3"><span class="inline-block w-6 h-6 rounded-full" style="background: {{ $estado->color }}"></span></td>
                    <td class="px-4 py-3 text-center">{{ $estado->activo ? 'Sí' : 'No' }}</td>
                    <td class="px-4 py-3 text-center">
                        <div class="flex justify-center gap-2">
                            <button wire:click="openModal('edit', {{ $estado->id }})" class="bg-yellow-400 text-white px-3 py-1 rounded hover:bg-yellow-500">Editar</button>
                            <button wire:click="confirmDelete({{ $estado->id }})" class="bg-red-600 text-white px-3 py-1 rounded hover:bg-red-700">Eliminar</button>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="px-4 py-6 text-center text-gray-500">No hay estados registrados.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="mt-4">
        {{ $estados->links() }}
    </div>
</code>    @include('livewire.partials.modal-form-estado')
    @include('livewire.partials.confirm-delete-modal')
    <x-success-modal />
</div>
