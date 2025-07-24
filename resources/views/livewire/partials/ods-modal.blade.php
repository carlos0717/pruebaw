
<div x-data="{ showNewOdsForm: false }" class="fixed inset-0 flex items-center justify-center z-50 bg-black bg-opacity-40">
    <div class="bg-white rounded-lg shadow-lg w-full max-w-2xl p-6 relative">
        <button type="button" wire:click="$set('showOdsModal', false)" class="absolute top-2 right-2 text-gray-400 hover:text-blue-700">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
            </svg>
        </button>
        <h2 class="text-xl font-bold text-blue-900 mb-4">Seleccionar Objetivos de Desarrollo Sostenible (ODS)</h2>
        <div class="mb-4">
            <input type="text" wire:model.live.debounce.400ms="ods_search" placeholder="Buscar ODS..." class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400" />
        </div>
        <div class="mb-2 flex flex-wrap gap-2">
            @foreach($objetivos_desarrollo_sostenible as $odsId)
                @php $ods = App\Models\Objetivos_desarrollo_sostenible::find($odsId); @endphp
                @if($ods)
                <span class="bg-blue-100 text-blue-800 px-3 py-1 rounded-full flex items-center">
                    <span>{{ $ods->nombre }}</span>
                    <button wire:click="removeOdsFromProyecto({{ $ods->id }})" class="ml-2 text-red-500 hover:text-red-700" title="Quitar">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </button>
                </span>
                @endif
            @endforeach
        </div>
        <div class="mb-4 text-sm text-gray-600">
            Seleccionados: <span class="font-semibold text-blue-700">{{ count($objetivos_desarrollo_sostenible) }}</span> / 10
            @if(count($objetivos_desarrollo_sostenible) < 2)
                <span class="text-red-600 ml-2">(Mínimo 2 ODS)</span>
            @endif
            @if(count($objetivos_desarrollo_sostenible) > 10)
                <span class="text-red-600 ml-2">(Máximo 10 ODS)</span>
            @endif
        </div>
        <div class="overflow-y-auto max-h-56 mb-4 border rounded">
            <ul>
                @foreach($this->searchOds($ods_search) as $ods)
                    <li class="flex items-center justify-between px-3 py-2 border-b hover:bg-blue-50">
                        <div>
                            <span class="font-semibold text-blue-800">{{ $ods->nombre }}</span>
                            <span class="text-gray-500 text-xs ml-2">{{ $ods->descripcion }}</span>
                        </div>
                        <button wire:click="addOdsToProyecto({{ $ods->id }})" class="bg-blue-600 text-white px-3 py-1 rounded hover:bg-blue-700 disabled:opacity-50" @if(in_array($ods->id, $objetivos_desarrollo_sostenible) || count($objetivos_desarrollo_sostenible) >= 10) disabled @endif>
                            Agregar
                        </button>
                    </li>
                @endforeach
                @if(count($this->searchOds($ods_search)) == 0)
                    <li class="px-3 py-2 text-gray-500">No se encontraron ODS.</li>
                @endif
            </ul>
        </div>
        <div class="mb-4">
            <button @click="showNewOdsForm = !showNewOdsForm" class="text-blue-700 hover:underline flex items-center">
                <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                </svg>
                Nuevo ODS
            </button>
            <div x-show="showNewOdsForm" class="mt-3 bg-blue-50 p-4 rounded">
                <form wire:submit.prevent="saveNewOds">
                    <div class="mb-2">
                        <label class="block text-sm font-medium text-blue-900">Nombre</label>
                        <input type="text" wire:model.defer="newOds.nombre" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400" required maxlength="255">
                        @error('newOds.nombre') <span class="text-red-600 text-xs">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-2">
                        <label class="block text-sm font-medium text-blue-900">Descripción</label>
                        <textarea wire:model.defer="newOds.descripcion" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400" required></textarea>
                        @error('newOds.descripcion') <span class="text-red-600 text-xs">{{ $message }}</span> @enderror
                    </div>
                    <div class="flex justify-end gap-2 mt-2">
                        <button type="button" @click="showNewOdsForm = false" class="bg-gray-300 px-4 py-2 rounded">Cancelar</button>
                        <button type="submit" class="bg-blue-700 text-white px-4 py-2 rounded hover:bg-blue-800">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="flex justify-end mt-4">
            <button type="button" wire:click="$set('showOdsModal', false)" class="bg-gray-400 text-white px-4 py-2 rounded hover:bg-gray-500 mr-2">Cerrar</button>
            <button type="button" wire:click="$set('showOdsModal', false)" class="bg-blue-700 text-white px-4 py-2 rounded hover:bg-blue-800" @if(count($objetivos_desarrollo_sostenible) < 2 || count($objetivos_desarrollo_sostenible) > 10) disabled @endif>Confirmar selección</button>
        </div>
    </div>
</div>
