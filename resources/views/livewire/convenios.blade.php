<div>
    <h2 class="text-xl font-bold text-gray-800 mb-2">Gestión de Convenios</h2>
    <div class="flex justify-between items-center mb-4">
        <div class="w-full md:w-1/3">
            <input type="text" wire:model.live.debounce.500ms="search" placeholder="Buscar por nombre, institución..." class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400" />
        </div>
        <button wire:click="openModal('create')" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Nuevo Convenio</button>
    </div>

    <div class="overflow-x-auto bg-white rounded shadow">
        <table class="min-w-full w-full table-auto divide-y divide-gray-200">
            <thead class="bg-blue-900 text-white">
                <tr>
                    <th class="py-2 px-4 text-center uppercase w-16">#</th>
                    <th class="py-2 px-4 text-left uppercase">Nombre</th>
                    <th class="py-2 px-4 text-left uppercase">Institución</th>
                    <th class="py-2 px-4 text-left uppercase">Tipo Institución</th>
                    <th class="py-2 px-4 text-center uppercase">Resolución</th>
                    <th class="py-2 px-4 text-center uppercase">Fecha Inicio</th> <!-- NUEVA COLUMNA -->
                    <th class="py-2 px-4 text-center uppercase">Fecha Fin</th>
                    <th class="py-2 px-4 text-center uppercase">Estado</th>
                    <th class="py-2 px-4 text-center uppercase">Documento</th>
                    <th class="py-2 px-4 text-center uppercase w-40">Acciones</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse($convenios as $convenio)
                <tr>
                    <td class="px-4 py-3 text-center align-middle">{{ $convenio->id }}</td>
                    <td class="px-4 py-3 align-middle">{{ $convenio->nombre }}</td>
                    <td class="px-4 py-3 align-middle">{{ $convenio->institucion->nombre ?? '-' }}</td>
                    <td class="px-4 py-3 align-middle">{{ $convenio->institucion->institucionTipo->nombre ?? '-' }}</td>
                    <td class="px-4 py-3 text-center align-middle">{{ $convenio->documento_nombre ?? '-' }}</td>
                    
                    <!-- NUEVA CELDA DE DATOS PARA FECHA INICIO -->
                    <td class="px-4 py-3 text-center align-middle">{{ $convenio->fecha_inicio ? \Carbon\Carbon::parse($convenio->fecha_inicio)->format('d/m/Y') : '-' }}</td>

                    <td class="px-4 py-3 text-center align-middle">{{ $convenio->fecha_fin ? \Carbon\Carbon::parse($convenio->fecha_fin)->format('d/m/Y') : '-' }}</td>
                    
                    <td class="px-4 py-3 text-center align-middle">
                        @if ($convenio->estado)
                            @php
                                $status = strtolower($convenio->estado->nombre);
                                $baseClasses = 'inline-flex items-center px-3 py-1 text-xs font-bold leading-none rounded-full';
                                $colorClasses = '';

                                switch ($status) {
                                    case 'vigente':
                                        $colorClasses = 'bg-green-100 text-green-800';
                                        break;
                                    case 'en proceso':
                                        $colorClasses = 'bg-yellow-100 text-yellow-800';
                                        break;
                                    case 'caducado':
                                        $colorClasses = 'bg-red-100 text-red-800';
                                        break;
                                    default:
                                        $colorClasses = 'bg-gray-100 text-gray-800';
                                        break;
                                }
                            @endphp
                            <span class="{{ $baseClasses }} {{ $colorClasses }}">
                                {{ $convenio->estado->nombre }}
                            </span>
                        @else
                            <span>-</span>
                        @endif
                    </td>

                    <td class="px-4 py-3 text-center align-middle">
                        @if($convenio->documento_escaneado_path)
                            <a href="{{ Storage::url($convenio->documento_escaneado_path) }}" target="_blank" class="text-blue-600 hover:underline">Ver PDF</a>
                        @else
                            -
                        @endif
                    </td>
                    <td class="px-4 py-3 text-center align-middle">
                        <div class="flex justify-center gap-2">
                            <button wire:click="openModal('edit', {{ $convenio->id }})" class="bg-yellow-400 text-white px-3 py-1 rounded hover:bg-yellow-500">Editar</button>
                            <button wire:click="confirmDelete({{ $convenio->id }})" class="bg-red-600 text-white px-3 py-1 rounded hover:bg-red-700">Eliminar</button>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <!-- COLSPAN ACTUALIZADO A 10 -->
                    <td colspan="10" class="px-4 py-6 text-center text-gray-500">No hay convenios registrados.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        {{ $convenios->links() }}
    </div>

    @if($modalOpen)
        @include('livewire.partials.modal-form-convenio')
    @endif

    @if($showInstitucionModal)
        @include('livewire.partials.institucion-modal')
    @endif

    <x-success-modal />
    <x-confirmation-modal />
</div>