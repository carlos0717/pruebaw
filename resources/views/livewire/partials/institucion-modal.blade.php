<div x-data="{ showNewInstitucionForm: false }" class="fixed inset-0 flex items-center justify-center z-[999] bg-black bg-opacity-40">
    <div class="bg-white rounded-lg shadow-lg w-full max-w-2xl p-6 relative">
        <button type="button" wire:click="$set('showInstitucionModal', false)" class="absolute top-2 right-2 text-gray-400 hover:text-blue-700">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
            </svg>
        </button>
        <h2 class="text-xl font-bold text-blue-900 mb-4">Seleccionar Institución</h2>
        <div class="mb-4">
            <input type="text" wire:model.live.debounce.400ms="institucion_search" placeholder="Buscar institución por nombre..." class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400" />
        </div>
        <div class="mb-2">
            @if($institucion_id)
                @php $institucion = App\Models\Institucion::find($institucion_id); @endphp
                @if($institucion)
                <div class="bg-blue-100 text-blue-800 px-3 py-2 rounded flex items-center justify-between mb-2">
                    <span>{{ $institucion->nombre }} ({{ $institucion->tipo->nombre ?? 'Sin tipo' }})</span>
                    <button wire:click="$set('institucion_id', null)" class="ml-2 text-red-500 hover:text-red-700">
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
                @foreach($this->searchInstituciones($institucion_search) as $inst)
                    <li class="flex items-center justify-between px-3 py-2 border-b hover:bg-blue-50">
                        <div>
                            <span class="font-semibold text-blue-800">{{ $inst->nombre }}</span>
                            <span class="text-gray-500 text-xs ml-2">{{ $inst->tipo->nombre ?? '' }}</span>
                        </div>
                        <button wire:click="$set('institucion_id', {{ $inst->id }})" 
                                class="bg-blue-600 text-white px-3 py-1 rounded hover:bg-blue-700 disabled:opacity-50 disabled:cursor-not-allowed" 
                                @if($institucion_id && $institucion_id != $inst->id) disabled @endif>
                            {{ $institucion_id == $inst->id ? 'Seleccionado' : 'Seleccionar' }}
                        </button>
                    </li>
                @endforeach
                @if(count($this->searchInstituciones($institucion_search)) == 0)
                    <li class="px-3 py-2 text-gray-500">No se encontraron instituciones.</li>
                @endif
            </ul>
        </div>
        <div class="mb-4">
            <button @click="showNewInstitucionForm = !showNewInstitucionForm" class="text-blue-700 hover:underline flex items-center">
                <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                </svg>
                Nueva Institución
            </button>
            <div x-show="showNewInstitucionForm" class="mt-3 bg-blue-50 p-4 rounded">
                <form wire:submit.prevent="saveNewInstitucion">
                    <div class="mb-2">
                        <label class="block text-sm font-medium text-blue-900">Nombre</label>
                        <input type="text" wire:model.defer="newInstitucion.nombre" class="w-full border rounded px-3 py-2 focus:ring-2 focus:ring-blue-400" required maxlength="255">
                    </div>
                    <div class="mb-2">
                        <label class="block text-sm font-medium text-blue-900">Tipo</label>
                        <select wire:model.defer="newInstitucion.institucion_tipo_id" class="w-full border rounded px-3 py-2 focus:ring-2 focus:ring-blue-400" required>
                            <option value="">Seleccione tipo</option>
                            @foreach($tiposInstitucion as $tipo)
                                <option value="{{ $tipo->id }}">{{ $tipo->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-2">
                        <label class="block text-sm font-medium text-blue-900">Dirección</label>
                        <input type="text" wire:model.defer="newInstitucion.direccion" class="w-full border rounded px-3 py-2 focus:ring-2 focus:ring-blue-400" maxlength="255">
                    </div>
                    <div class="flex justify-end gap-2 mt-2">
                        <button type="button" @click="showNewInstitucionForm = false" class="bg-gray-300 px-4 py-2 rounded">Cancelar</button>
                        <button type="submit" class="bg-blue-700 text-white px-4 py-2 rounded hover:bg-blue-800">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="flex justify-end mt-4">
            <button type="button" wire:click="$set('showInstitucionModal', false)" class="bg-blue-700 text-white px-4 py-2 rounded hover:bg-blue-800">Confirmar</button>
        </div>
    </div>
</div>
