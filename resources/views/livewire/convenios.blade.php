<div>
    <h2 class="text-xl font-bold text-gray-800 mb-2">Gestión de Convenios</h2>
    <div class="flex justify-end mb-2">
        <button wire:click="openModal('create')" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Nuevo Convenio</button>
    </div>
    <div class="w-full md:w-1/3 mb-6">
        <input type="text" wire:model.live.debounce.500ms="search" placeholder="Buscar por nombre, institución..." class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400" />
    </div>
    <div class="overflow-x-auto bg-white rounded shadow">
        <table class="min-w-full w-full table-auto divide-y divide-gray-200">
            <thead class="bg-blue-900 text-white">
                <tr>
                    <th class="py-2 px-4 text-center uppercase w-16">#</th>
                    <th class="py-2 px-4 text-center uppercase">Nombre</th>
                    <th class="py-2 px-4 text-center uppercase">Institución</th>
                    <th class="py-2 px-4 text-center uppercase">Tipo Institución</th>
                    <th class="py-2 px-4 text-center uppercase">Resolución</th>
                    <th class="py-2 px-4 text-center uppercase">Fecha Inicio</th>
                    <th class="py-2 px-4 text-center uppercase">Fecha Fin</th>
                    <th class="py-2 px-4 text-center uppercase">Estado</th>
                    <th class="py-2 px-4 text-center uppercase">Documento</th>
                    <th class="py-2 px-4 text-center uppercase w-40">Acciones</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse($convenios as $convenio)
                <tr>
                    <td class="px-4 py-3 text-center">{{ $convenio->id }}</td>
                    <td class="px-4 py-3">{{ $convenio->nombre }}</td>
                    <td class="px-4 py-3">{{ $convenio->institucion->nombre ?? '-' }}</td>
                    <td class="px-4 py-3">{{ $convenio->institucion->tipo->nombre ?? '-' }}</td>
                    <td class="px-4 py-3">{{ $convenio->numero_resolucion ?? '-' }}</td>
                    <td class="px-4 py-3">{{ $convenio->fecha_inicio ? $convenio->fecha_inicio->format('d/m/Y') : '-' }}</td>
                    <td class="px-4 py-3">{{ $convenio->fecha_fin ? $convenio->fecha_fin->format('d/m/Y') : '-' }}</td>
                    <td class="px-4 py-3">{{ $convenio->estado->nombre ?? '-' }}</td>
                    <td class="px-4 py-3">
                        @if($convenio->documento_escaneado_path)
                            <a href="{{ asset($convenio->documento_escaneado_path) }}" 
                               target="_blank" 
                               class="text-blue-600 hover:underline">
                                Ver PDF
                            </a>
                        @else
                            -
                        @endif
                    </td>
                    <td class="px-4 py-3 text-center">
                        <div class="flex justify-center gap-2">
                            <button wire:click="openModal('edit', {{ $convenio->id }})" class="bg-yellow-400 text-white px-3 py-1 rounded hover:bg-yellow-500">Editar</button>
                            <button wire:click="confirmDelete({{ $convenio->id }})" class="bg-red-600 text-white px-3 py-1 rounded hover:bg-red-700">Eliminar</button>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="10" class="px-4 py-6 text-center text-gray-500">No hay convenios registrados.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="mt-4">
        {{ $convenios->links() }}
    </div>
    @include('livewire.partials.modal-form-convenio')
    @include('livewire.partials.confirm-delete-modal')
</div>
