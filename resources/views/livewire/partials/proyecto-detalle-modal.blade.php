<div class="fixed inset-0 flex items-center justify-center z-50 bg-black bg-opacity-40">
    <div class="bg-white rounded-lg shadow-lg w-full max-w-3xl p-8 relative overflow-y-auto max-h-[90vh]">
        <h2 class="text-2xl font-bold text-blue-900 mb-6 text-center">Detalle del Proyecto</h2>
        <div class="prose max-w-none text-gray-800">
            <h3 class="text-xl font-semibold mb-2">{{ $detalleProyecto->titulo }}</h3>
            <p><span class="font-semibold">Temática:</span> {{ $detalleProyecto->tematica }}</p>
            <p><span class="font-semibold">Líneas RSU:</span> {{ $detalleProyecto->lineas_rsu }}</p>
            <p><span class="font-semibold">Estado:</span> {{ $detalleProyecto->estado }}</p>
            <p><span class="font-semibold">Docente Tutor:</span> {{ $detalleProyecto->docenteTutor->nombres ?? '-' }} {{ $detalleProyecto->docenteTutor->apellidos ?? '' }}</p>
            <p><span class="font-semibold">Ubicación:</span> {{ $detalleProyecto->ubicacion_localidad }}, {{ $detalleProyecto->ubicacion_distrito }}, {{ $detalleProyecto->ubicacion_provincia }}</p>
            <p><span class="font-semibold">Beneficiarios:</span> Mínimo {{ $detalleProyecto->beneficiarios_numero_minimo }}, Máximo {{ $detalleProyecto->beneficiarios_numero_maximo }}</p>
            <p><span class="font-semibold">Acciones Concretas:</span> {{ $detalleProyecto->acciones_concretas }}</p>
            <p><span class="font-semibold">Fechas:</span> Inicio: {{ $detalleProyecto->fecha_inicio }} | Término: {{ $detalleProyecto->fecha_termino }}</p>
            <div class="mt-4">
                <h4 class="font-semibold">ODS Relacionados:</h4>
                <ul class="list-disc pl-6">
                    @foreach($detalleProyecto->objetivos as $ods)
                        <li>{{ $ods->nombre }} <span class="text-gray-500 text-xs">{{ $ods->descripcion }}</span></li>
                    @endforeach
                </ul>
            </div>
            <div class="mt-4">
                <h4 class="font-semibold">Equipo de Estudiantes:</h4>
                <ul class="list-disc pl-6">
                    @foreach($detalleProyecto->estudiantes as $est)
                        <li>{{ $est->nombres }} {{ $est->apellidos }} <span class="text-gray-500 text-xs">({{ $est->codigo_universidad }})</span></li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="flex justify-end gap-2 mt-8">
            <button wire:click="openModal('edit', {{ $detalleProyecto->id }})" class="bg-yellow-500 text-white px-5 py-2 rounded hover:bg-yellow-600">Editar</button>
            <button wire:click="cerrarDetalleModal" class="bg-gray-400 text-white px-5 py-2 rounded hover:bg-gray-500">Cerrar</button>
        </div>
    </div>
</div>
