<div class="fixed inset-0 flex items-center justify-center z-50 bg-black bg-opacity-40">
    <div class="bg-white rounded-lg shadow-lg w-full max-w-3xl p-8 relative overflow-y-auto max-h-[90vh]">
        <h2 class="text-2xl font-bold text-blue-900 mb-6 text-center">Detalle del Proyecto</h2>
        <div class="prose max-w-none text-gray-800">
            <h3 class="text-xl font-semibold mb-2"><?php echo e($detalleProyecto->titulo); ?></h3>
            <p><span class="font-semibold">Temática:</span> <?php echo e($detalleProyecto->tematica); ?></p>
            <p><span class="font-semibold">Líneas RSU:</span> <?php echo e($detalleProyecto->lineas_rsu); ?></p>
            <p><span class="font-semibold">Estado:</span> <?php echo e($detalleProyecto->estado); ?></p>
            <p><span class="font-semibold">Docente Tutor:</span> <?php echo e($detalleProyecto->docenteTutor->nombres ?? '-'); ?> <?php echo e($detalleProyecto->docenteTutor->apellidos ?? ''); ?></p>
            <p><span class="font-semibold">Ubicación:</span> <?php echo e($detalleProyecto->ubicacion_localidad); ?>, <?php echo e($detalleProyecto->ubicacion_distrito); ?>, <?php echo e($detalleProyecto->ubicacion_provincia); ?></p>
            <p><span class="font-semibold">Beneficiarios:</span> Mínimo <?php echo e($detalleProyecto->beneficiarios_numero_minimo); ?>, Máximo <?php echo e($detalleProyecto->beneficiarios_numero_maximo); ?></p>
            <p><span class="font-semibold">Acciones Concretas:</span> <?php echo e($detalleProyecto->acciones_concretas); ?></p>
            <p><span class="font-semibold">Fechas:</span> Inicio: <?php echo e($detalleProyecto->fecha_inicio); ?> | Término: <?php echo e($detalleProyecto->fecha_termino); ?></p>
            <div class="mt-4">
                <h4 class="font-semibold">ODS Relacionados:</h4>
                <ul class="list-disc pl-6">
                    <?php $__currentLoopData = $detalleProyecto->objetivos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ods): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($ods->nombre); ?> <span class="text-gray-500 text-xs"><?php echo e($ods->descripcion); ?></span></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
            <div class="mt-4">
                <h4 class="font-semibold">Equipo de Estudiantes:</h4>
                <ul class="list-disc pl-6">
                    <?php $__currentLoopData = $detalleProyecto->estudiantes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $est): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($est->nombres); ?> <?php echo e($est->apellidos); ?> <span class="text-gray-500 text-xs">(<?php echo e($est->codigo_universidad); ?>)</span></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        </div>
        <div class="flex justify-end gap-2 mt-8">
            <button wire:click="openModal('edit', <?php echo e($detalleProyecto->id); ?>)" class="bg-yellow-500 text-white px-5 py-2 rounded hover:bg-yellow-600">Editar</button>
            <button wire:click="cerrarDetalleModal" class="bg-gray-400 text-white px-5 py-2 rounded hover:bg-gray-500">Cerrar</button>
        </div>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\sisogrsu1\resources\views/livewire/partials/proyecto-detalle-modal.blade.php ENDPATH**/ ?>