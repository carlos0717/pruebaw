<div>
    <h2 class="text-xl font-bold text-gray-800 mb-2">Listado de Proyectos</h2>
    <div class="flex justify-end mb-2">
        <button wire:click="openModal('create')" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Nuevo Proyecto</button>
    </div>
    <div class="w-full md:w-1/3 mb-6">
        <input type="text" wire:model.live.debounce.500ms="search" placeholder="Buscar por título..." class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400" />
    </div>
    <div class="overflow-x-auto bg-white rounded shadow">
        <table class="min-w-full w-full table-auto divide-y divide-gray-200">
            <thead class="bg-blue-900 text-white">
                <tr>
                    <th class="py-2 px-4 text-center uppercase w-16">#</th>
                    <th class="py-2 px-4 text-center uppercase">Título</th>
                    <th class="py-2 px-4 text-center uppercase">Docente Tutor</th>
                    <th class="py-2 px-4 text-center uppercase">Equipo</th>
                    <th class="py-2 px-4 text-center uppercase">Estado</th>
                    <th class="py-2 px-4 text-center uppercase w-40">Acciones</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse($proyectos as $proyecto)
                <tr>
                    <td class="px-4 py-3 whitespace-nowrap text-center align-top">{{ $proyecto->id }}</td>
                    <td class="px-4 py-3 whitespace-normal align-top font-semibold text-gray-800">{{ $proyecto->titulo }}</td>
                    <td class="px-4 py-3 whitespace-normal align-top text-gray-800">{{ $proyecto->docenteTutor->nombres ?? '-' }} {{ $proyecto->docenteTutor->apellidos ?? '' }}</td>
                    <td class="px-4 py-3 whitespace-normal align-top text-gray-800">
                        @foreach($proyecto->estudiantes as $est)
                            <span class="block">{{ $est->nombres }} {{ $est->apellidos }}</span>
                        @endforeach
                    </td>
                    <td class="px-4 py-3 whitespace-normal align-top text-gray-800">{{ $proyecto->estado }}</td>
                    <td class="px-4 py-3 whitespace-nowrap text-center align-top">
                        <div class="flex justify-center gap-2">
                            <!-- <button wire:click="verDetalle({{ $proyecto->id }})" class="bg-blue-700 text-white px-3 py-1 rounded hover:bg-blue-800">Ver Detalles</button> -->
                            <button wire:click="openModal('edit', {{ $proyecto->id }})" class="bg-yellow-400 text-white px-3 py-1 rounded hover:bg-yellow-500">Editar</button>
                            <button wire:click="confirmDelete({{ $proyecto->id }})" class="bg-red-600 text-white px-3 py-1 rounded hover:bg-red-700">Eliminar</button>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="px-4 py-6 text-center text-gray-500">No hay proyectos registrados.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="mt-4">
        {{ $proyectos->links() }}
    </div>

    <!-- Modal principal de Proyecto -->
    @if($modalOpen)
        @include('livewire.partials.proyecto-modal')
    @endif

    <!-- Modal de registro de estudiante -->
    @if($showEstudianteModal)
        @include('livewire.partials.estudiante-modal')
    @endif

    <!-- Modal de Detalle de Proyecto (fuera del loop) -->
    @if(isset($showDetalleModal) && $showDetalleModal && isset($detalleProyecto) && $detalleProyecto)
        @include('livewire.partials.proyecto-detalle-modal')
    @endif

    <!-- Confirm Delete Modal -->
    @if($confirmingDelete)
        <div class="fixed inset-0 flex items-center justify-center z-50 bg-black bg-opacity-40">
            <div class="bg-white rounded-lg shadow-lg w-full max-w-md p-6">
                <h2 class="text-lg font-bold mb-4">Eliminar Proyecto</h2>
                <p class="mb-4">¿Está seguro que desea eliminar este proyecto?</p>
                <div class="flex justify-end gap-2 mt-4">
                    <button wire:click="$set('confirmingDelete', false)" class="bg-gray-300 px-4 py-2 rounded">Cancelar</button>
                    <button wire:click="deleteProyecto" class="bg-red-600 text-white px-4 py-2 rounded">Eliminar</button>
                </div>
            </div>
        </div>
    @endif

    <!-- Modal de éxito con Alpine.js -->
    <x-exito-modal message="" />
</div>
