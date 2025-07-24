<div x-data="{ showNewDocenteForm: false }" class="fixed inset-0 flex items-center justify-center z-50 bg-black bg-opacity-40">
    <div class="bg-white rounded-lg shadow-lg w-full max-w-2xl p-6 relative">
        <button type="button" wire:click="$set('showDocenteModal', false)" class="absolute top-2 right-2 text-gray-400 hover:text-blue-700">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
            </svg>
        </button>
        <h2 class="text-xl font-bold text-blue-900 mb-4">Seleccionar Docente Tutor</h2>
        <div class="mb-4">
            <input type="text" wire:model.live.debounce.400ms="docente_search" placeholder="Buscar docente por nombre, apellido o DNI..." class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400" />
        </div>
        <div class="mb-2">
            @if($docente_tutor_id)
                @php $docente = App\Models\Docente::find($docente_tutor_id); @endphp
                @if($docente)
                <div class="bg-blue-100 text-blue-800 px-3 py-2 rounded flex items-center justify-between mb-2">
                    <span>{{ $docente->nombres }} {{ $docente->apellidos }} ({{ $docente->dni }})</span>
                    <button wire:click="$set('docente_tutor_id', null)" class="ml-2 text-red-500 hover:text-red-700" title="Quitar">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </button>
                </div>
                @endif
            @endif
        </div>
        <div class="overflow-y-auto max-h-56 mb-4 border rounded">
            <ul>
                @foreach($this->searchDocentes($docente_search) as $docente)
                    <li class="flex items-center justify-between px-3 py-2 border-b hover:bg-blue-50">
                        <div>
                            <span class="font-semibold text-blue-800">{{ $docente->nombres }} {{ $docente->apellidos }}</span>
                            <span class="text-gray-500 text-xs ml-2">DNI: {{ $docente->dni }}</span>
                        </div>
                        <button wire:click="$set('docente_tutor_id', {{ $docente->id }})" class="bg-blue-600 text-white px-3 py-1 rounded hover:bg-blue-700 disabled:opacity-50" @if($docente_tutor_id && $docente_tutor_id != $docente->id) disabled @endif>
                            Seleccionar
                        </button>
                    </li>
                @endforeach
                @if(count($this->searchDocentes($docente_search)) == 0)
                    <li class="px-3 py-2 text-gray-500">No se encontraron docentes.</li>
                @endif
            </ul>
        </div>
        <div class="mb-4">
            <button @click="showNewDocenteForm = !showNewDocenteForm" class="text-blue-700 hover:underline flex items-center">
                <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                </svg>
                Nuevo Docente
            </button>
            <div x-show="showNewDocenteForm" class="mt-3 bg-blue-50 p-4 rounded">
                <form wire:submit.prevent="saveNewDocente">
                    <div class="mb-2">
                        <label class="block text-sm font-medium text-blue-900">Nombres</label>
                        <input type="text" wire:model.defer="newDocente.nombres" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400" required maxlength="255">
                        @error('newDocente.nombres') <span class="text-red-600 text-xs">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-2">
                        <label class="block text-sm font-medium text-blue-900">Apellidos</label>
                        <input type="text" wire:model.defer="newDocente.apellidos" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400" required maxlength="255">
                        @error('newDocente.apellidos') <span class="text-red-600 text-xs">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-2">
                        <label class="block text-sm font-medium text-blue-900">DNI</label>
                        <input type="text" wire:model.defer="newDocente.dni" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400" required maxlength="15">
                        @error('newDocente.dni') <span class="text-red-600 text-xs">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-2">
                        <label class="block text-sm font-medium text-blue-900">Celular</label>
                        <input type="text" wire:model.defer="newDocente.celular" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400" maxlength="20">
                        @error('newDocente.celular') <span class="text-red-600 text-xs">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-2">
                        <label class="block text-sm font-medium text-blue-900">Departamento</label>
                        <input type="text" wire:model.defer="newDocente.departamento" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400" maxlength="100">
                        @error('newDocente.departamento') <span class="text-red-600 text-xs">{{ $message }}</span> @enderror
                    </div>
                    <div class="flex justify-end gap-2 mt-2">
                        <button type="button" @click="showNewDocenteForm = false" class="bg-gray-300 px-4 py-2 rounded">Cancelar</button>
                        <button type="submit" class="bg-blue-700 text-white px-4 py-2 rounded hover:bg-blue-800">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="flex justify-end mt-4">
            <button type="button" wire:click="$set('showDocenteModal', false)" class="bg-gray-400 text-white px-4 py-2 rounded hover:bg-gray-500 mr-2">Cerrar</button>
            <button type="button" wire:click="$set('showDocenteModal', false)" class="bg-blue-700 text-white px-4 py-2 rounded hover:bg-blue-800" @if(!$docente_tutor_id) disabled @endif>Confirmar selección</button>
        </div>
    </div>
</div>
