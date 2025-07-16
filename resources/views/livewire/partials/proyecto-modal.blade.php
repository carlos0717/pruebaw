<div class="fixed inset-0 flex items-center justify-center z-50 bg-black bg-opacity-40">
    <div class="bg-white rounded-lg shadow-lg w-full max-w-2xl p-6 overflow-y-auto max-h-[90vh]">
        <h2 class="text-lg font-bold mb-4">{{ $modalMode === 'create' ? 'Nuevo Proyecto' : 'Editar Proyecto' }}</h2>
        <form wire:submit.prevent="saveProyecto">
            <div class="mb-4">
                <label class="block text-gray-700">Título</label>
                <input type="text" wire:model.defer="titulo" maxlength="255" class="w-full border rounded px-3 py-2 mt-1 @error('titulo') border-red-500 @enderror" placeholder="Ej: Proyecto de Salud Comunitaria" />
                @error('titulo') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            </div>
            <div class="mb-4">
                <label class="block text-gray-700">Temática</label>
                <textarea wire:model.defer="tematica" maxlength="500" class="w-full border rounded px-3 py-2 mt-1 @error('tematica') border-red-500 @enderror" placeholder="Describe la temática del proyecto"></textarea>
                @error('tematica') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            </div>
            <div class="mb-4">
                <label class="block text-gray-700">Líneas RSU</label>
                <textarea wire:model.defer="lineas_rsu" maxlength="500" class="w-full border rounded px-3 py-2 mt-1 @error('lineas_rsu') border-red-500 @enderror" placeholder="Describe las líneas RSU"></textarea>
                @error('lineas_rsu') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            </div>
            <div class="mb-4">
                <label class="block text-gray-700">ODS (2-10)</label>
                <button type="button" wire:click="showOdsRegisterModal" class="bg-blue-100 text-blue-800 px-3 py-2 rounded hover:bg-blue-200 mt-2">Seleccionar ODS</button>
                <div class="mt-2">
                    @foreach($objetivos_desarrollo_sostenible as $id)
                        @php $ods = App\Models\Objetivos_desarrollo_sostenible::find($id); @endphp
                        @if($ods)
                        <div class="flex items-center justify-between bg-green-100 rounded px-2 py-1 mb-1">
                            <span>{{ $ods->nombre }}</span>
                            <button type="button" wire:click="removeOdsFromProyecto({{ $ods->id }})" class="text-red-600 text-xs">Quitar</button>
                        </div>
                        @endif
                    @endforeach
                </div>
                @error('objetivos_desarrollo_sostenible') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            </div>
            <div class="mb-4 grid grid-cols-1 md:grid-cols-3 gap-2">
                <div>
                    <label class="block text-gray-700">Localidad</label>
                    <input type="text" wire:model.defer="ubicacion_localidad" maxlength="255" class="w-full border rounded px-3 py-2 mt-1 @error('ubicacion_localidad') border-red-500 @enderror" placeholder="Ej: Marian" />
                    @error('ubicacion_localidad') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>
                <div>
                    <label class="block text-gray-700">Distrito</label>
                    <input type="text" wire:model.defer="ubicacion_distrito" maxlength="255" class="w-full border rounded px-3 py-2 mt-1 @error('ubicacion_distrito') border-red-500 @enderror" placeholder="Ej: Independencia" />
                    @error('ubicacion_distrito') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>
                <div>
                    <label class="block text-gray-700">Provincia</label>
                    <input type="text" wire:model.defer="ubicacion_provincia" maxlength="255" class="w-full border rounded px-3 py-2 mt-1 @error('ubicacion_provincia') border-red-500 @enderror" placeholder="Ej: Ancash" />
                    @error('ubicacion_provincia') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="mb-4 grid grid-cols-2 gap-2">
                <div>
                    <label class="block text-gray-700">Beneficiarios Mínimo</label>
                    <input type="number" wire:model.defer="beneficiarios_numero_minimo" min="0" class="w-full border rounded px-3 py-2 mt-1 @error('beneficiarios_numero_minimo') border-red-500 @enderror" placeholder="Ej: 2" />
                    @error('beneficiarios_numero_minimo') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>
                <div>
                    <label class="block text-gray-700">Beneficiarios Máximo</label>
                    <input type="number" wire:model.defer="beneficiarios_numero_maximo" min="0" class="w-full border rounded px-3 py-2 mt-1 @error('beneficiarios_numero_maximo') border-red-500 @enderror" placeholder="Ej: 20" />
                    @error('beneficiarios_numero_maximo') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700">Acciones Concretas</label>
                <textarea wire:model.defer="acciones_concretas" maxlength="1000" class="w-full border rounded px-3 py-2 mt-1 @error('acciones_concretas') border-red-500 @enderror" placeholder="Describe las acciones concretas del proyecto"></textarea>
                @error('acciones_concretas') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            </div>
            <div class="mb-4 grid grid-cols-2 gap-2">
                <div>
                    <label class="block text-gray-700">Fecha Inicio</label>
                    <input type="date" wire:model.defer="fecha_inicio" class="w-full border rounded px-3 py-2 mt-1 @error('fecha_inicio') border-red-500 @enderror" />
                    @error('fecha_inicio') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>
                <div>
                    <label class="block text-gray-700">Fecha Término</label>
                    <input type="date" wire:model.defer="fecha_termino" class="w-full border rounded px-3 py-2 mt-1 @error('fecha_termino') border-red-500 @enderror" />
                    @error('fecha_termino') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700">Estado</label>
                <select wire:model.defer="estado" class="w-full border rounded px-3 py-2 mt-1 @error('estado') border-red-500 @enderror">
                    <option value="Registrado">Registrado</option>
                    <option value="Aprobado">Aprobado</option>
                    <option value="En Curso">En Curso</option>
                    <option value="Rechazado">Rechazado</option>
                    <option value="Finalizado">Finalizado</option>
                    <option value="Con Informe">Con Informe</option>
                </select>
                @error('estado') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            </div>
            <div class="mb-4">
                <label class="block text-gray-700">Docente Tutor</label>
                <button type="button" wire:click="$set('showDocenteModal', true)" class="bg-blue-100 text-blue-800 px-3 py-2 rounded hover:bg-blue-200 mt-2">Seleccionar Docente</button>
                <div class="mt-2">
                    @if($docente_tutor_id)
                        @php $docente = App\Models\Docente::find($docente_tutor_id); @endphp
                        @if($docente)
                        <div class="flex items-center justify-between bg-green-100 rounded px-2 py-1 mb-1">
                            <span>{{ $docente->nombres }} {{ $docente->apellidos }} ({{ $docente->dni }})</span>
                            <button type="button" wire:click="$set('docente_tutor_id', null)" class="text-red-600 text-xs">Quitar</button>
                        </div>
                        @endif
                    @endif
                </div>
                @error('docente_tutor_id') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            </div>
            <div class="mb-4">
                <label class="block text-gray-700">Equipo de Estudiantes (2-4)</label>
                <button type="button" wire:click="$set('showEstudianteModal', true)" class="bg-blue-100 text-blue-800 px-3 py-2 rounded hover:bg-blue-200 mt-2">Seleccionar Estudiantes</button>
                <div class="mt-2">
                    @foreach($equipo_estudiantes as $id)
                        @php $est = App\Models\Estudiantes::find($id); @endphp
                        @if($est)
                        <div class="flex items-center justify-between bg-green-100 rounded px-2 py-1 mb-1">
                            <span>{{ $est->nombres }} {{ $est->apellidos }} ({{ $est->codigo_universidad }})</span>
                            <button type="button" wire:click="removeEstudianteFromEquipo({{ $est->id }})" class="text-red-600 text-xs">Quitar</button>
                        </div>
                        @endif
                    @endforeach
                </div>
                @error('equipo_estudiantes') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            </div>
            <div class="flex justify-end gap-2 mt-4">
                <button type="button" wire:click="closeModal" class="bg-gray-300 px-4 py-2 rounded">Cancelar</button>
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">{{ $modalMode === 'create' ? 'Crear' : 'Actualizar' }}</button>
            </div>
        </form>
    </div>
</div>

@if($showOdsModal)
    @include('livewire.partials.ods-modal')
@endif

@if($showDocenteModal)
    @include('livewire.partials.docente-modal')
@endif

@if($showEstudianteModal)
    @include('livewire.partials.estudiante-modal')
@endif
