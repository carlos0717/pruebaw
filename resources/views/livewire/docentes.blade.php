<div>
    <h2 class="text-xl font-bold text-gray-800 mb-2">Listado de Docentes</h2>
    <div class="flex justify-end mb-2">
        <button wire:click="openModal('create')" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Nuevo Docente</button>
    </div>
    <div class="w-full md:w-1/3 mb-6">
        <input type="text" wire:model.live.debounce.500ms="search" placeholder="Buscar por nombre, apellido o DNI..." class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400" />
    </div>
    <div class="overflow-x-auto bg-white rounded shadow">
        <table class="min-w-full w-full table-auto divide-y divide-gray-200">
            <thead class="bg-blue-900 text-white">
                <tr>
                    <th class="py-2 px-4 text-center uppercase w-16">#</th>
                    <th class="py-2 px-4 text-center uppercase">Nombres</th>
                    <th class="py-2 px-4 text-center uppercase">Apellidos</th>
                    <th class="py-2 px-4 text-center uppercase">DNI</th>
                    <th class="py-2 px-4 text-center uppercase">Facultad</th>
                    <th class="py-2 px-4 text-center uppercase">Departamento</th>
                    <th class="py-2 px-4 text-center uppercase">Celular</th>
                    <th class="py-2 px-4 text-center uppercase w-40">Acciones</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse($docentes as $docente)
                <tr>
                    <td class="px-4 py-3 whitespace-nowrap text-center align-top">{{ $docente->id }}</td>
                    <td class="px-4 py-3 whitespace-normal align-top font-semibold text-gray-800">{{ $docente->nombres }}</td>
                    <td class="px-4 py-3 whitespace-normal align-top text-gray-800">{{ $docente->apellidos }}</td>
                    <td class="px-4 py-3 whitespace-normal align-top text-gray-800">{{ $docente->dni }}</td>
                    <td class="px-4 py-3 whitespace-normal align-top text-gray-800">{{ $docente->facultad->nombre ?? '-' }}</td>
                    <td class="px-4 py-3 whitespace-normal align-top text-gray-800">{{ $docente->departamento }}</td>
                    <td class="px-4 py-3 whitespace-normal align-top text-gray-800">{{ $docente->celular }}</td>
                    <td class="px-4 py-3 whitespace-nowrap text-center align-top">
                        <div class="flex justify-center gap-2">
                            <button wire:click="openModal('edit', {{ $docente->id }})" class="bg-yellow-400 text-white px-3 py-1 rounded hover:bg-yellow-500">Editar</button>
                            <button wire:click="confirmDelete({{ $docente->id }})" class="bg-red-600 text-white px-3 py-1 rounded hover:bg-red-700">Eliminar</button>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="8" class="px-4 py-6 text-center text-gray-500">No hay docentes registrados.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="mt-4">
        {{ $docentes->links() }}
    </div>

    <!-- Modal -->
    @if($modalOpen)
        <div class="fixed inset-0 flex items-center justify-center z-50 bg-black bg-opacity-40">
            <div class="bg-white rounded-lg shadow-lg w-full max-w-md p-6">
                <h2 class="text-lg font-bold mb-4">{{ $modalMode === 'create' ? 'Nuevo Docente' : 'Editar Docente' }}</h2>
                <div class="mb-4">
                    <label class="block text-gray-700">Nombres</label>
                    <input type="text" wire:model.defer="nombres" maxlength="255" pattern="^[\pL\s\-]+$" class="w-full border rounded px-3 py-2 mt-1 @error('nombres') border-red-500 @enderror" placeholder="Ej: Juan Carlos" />
                    @error('nombres') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700">Apellidos</label>
                    <input type="text" wire:model.defer="apellidos" maxlength="255" pattern="^[\pL\s\-]+$" class="w-full border rounded px-3 py-2 mt-1 @error('apellidos') border-red-500 @enderror" placeholder="Ej: Pérez Gómez" />
                    @error('apellidos') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700">DNI</label>
                    <input type="text" wire:model.defer="dni" maxlength="8" pattern="\d{8}" class="w-full border rounded px-3 py-2 mt-1 @error('dni') border-red-500 @enderror" placeholder="Ej: 12345678" />
                    @error('dni') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700">Facultad</label>
                    <select wire:model.defer="facultad_id" class="w-full border rounded px-3 py-2 mt-1 @error('facultad_id') border-red-500 @enderror">
                        <option value="">Seleccione una facultad</option>
                        @foreach($facultades as $facultad)
                            <option value="{{ $facultad->id }}">{{ $facultad->nombre }}</option>
                        @endforeach
                    </select>
                    @error('facultad_id') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700">Departamento</label>
                    <input type="text" wire:model.defer="departamento" maxlength="255" class="w-full border rounded px-3 py-2 mt-1 @error('departamento') border-red-500 @enderror" placeholder="Ej: Ciencias Básicas" />
                    @error('departamento') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700">Celular</label>
                    <input type="text" wire:model.defer="celular" maxlength="15" pattern="\d{9,15}" class="w-full border rounded px-3 py-2 mt-1 @error('celular') border-red-500 @enderror" placeholder="Ej: 987654321" />
                    @error('celular') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>
                <div class="flex justify-end gap-2 mt-4">
                    <button type="button" wire:click="closeModal" class="bg-gray-300 px-4 py-2 rounded">Cancelar</button>
                    <button wire:click="saveDocente" class="bg-blue-600 text-white px-4 py-2 rounded">{{ $modalMode === 'create' ? 'Crear' : 'Actualizar' }}</button>
                </div>
            </div>
        </div>
    @endif

    <!-- Confirm Delete Modal -->
    @if($confirmingDelete)
        <div class="fixed inset-0 flex items-center justify-center z-50 bg-black bg-opacity-40">
            <div class="bg-white rounded-lg shadow-lg w-full max-w-md p-6">
                <h2 class="text-lg font-bold mb-4">Eliminar Docente</h2>
                <p class="mb-4">¿Está seguro que desea eliminar este docente?</p>
                <div class="flex justify-end gap-2 mt-4">
                    <button type="button" wire:click="closeDeleteModal" class="bg-gray-300 px-4 py-2 rounded">Cancelar</button>
                    <button type="button" wire:click="deleteDocente" class="bg-red-600 text-white px-4 py-2 rounded">Eliminar</button>
                </div>
            </div>
        </div>
    @endif

    <!-- Modal de éxito profesional -->
    <x-success-modal message="Los cambios se han guardado correctamente." />
</div>
