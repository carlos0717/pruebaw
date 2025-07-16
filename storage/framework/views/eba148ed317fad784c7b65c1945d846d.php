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
                <!--[if BLOCK]><![endif]--><?php $__empty_1 = true; $__currentLoopData = $convenios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $convenio): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <tr>
                    <td class="px-4 py-3 text-center"><?php echo e($convenio->id); ?></td>
                    <td class="px-4 py-3"><?php echo e($convenio->nombre); ?></td>
                    <td class="px-4 py-3"><?php echo e($convenio->institucion->nombre ?? '-'); ?></td>
                    <td class="px-4 py-3"><?php echo e($convenio->institucion->tipo->nombre ?? '-'); ?></td>
                    <td class="px-4 py-3"><?php echo e($convenio->numero_resolucion ?? '-'); ?></td>
                    <td class="px-4 py-3"><?php echo e($convenio->fecha_inicio ? $convenio->fecha_inicio->format('d/m/Y') : '-'); ?></td>
                    <td class="px-4 py-3"><?php echo e($convenio->fecha_fin ? $convenio->fecha_fin->format('d/m/Y') : '-'); ?></td>
                    <td class="px-4 py-3"><?php echo e($convenio->estado->nombre ?? '-'); ?></td>
                    <td class="px-4 py-3">
                        <!--[if BLOCK]><![endif]--><?php if($convenio->documento_escaneado_path): ?>
                            <a href="<?php echo e(asset($convenio->documento_escaneado_path)); ?>" 
                               target="_blank" 
                               class="text-blue-600 hover:underline">
                                Ver PDF
                            </a>
                        <?php else: ?>
                            -
                        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                    </td>
                    <td class="px-4 py-3 text-center">
                        <div class="flex justify-center gap-2">
                            <button wire:click="openModal('edit', <?php echo e($convenio->id); ?>)" class="bg-yellow-400 text-white px-3 py-1 rounded hover:bg-yellow-500">Editar</button>
                            <button wire:click="confirmDelete(<?php echo e($convenio->id); ?>)" class="bg-red-600 text-white px-3 py-1 rounded hover:bg-red-700">Eliminar</button>
                        </div>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <tr>
                    <td colspan="10" class="px-4 py-6 text-center text-gray-500">No hay convenios registrados.</td>
                </tr>
                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
            </tbody>
        </table>
    </div>
    <div class="mt-4">
        <?php echo e($convenios->links()); ?>

    </div>
    <?php echo $__env->make('livewire.partials.modal-form-convenio', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('livewire.partials.confirm-delete-modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</div>
<?php /**PATH C:\xampp\htdocs\sisogrsu1\resources\views/livewire/convenios.blade.php ENDPATH**/ ?>