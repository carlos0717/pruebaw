<div>
    <h2 class="text-xl font-bold text-gray-800 mb-2">Gestión de Estados</h2>
    <div class="flex justify-end mb-2">
        <button wire:click="openModal('create')" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Nuevo Estado</button>
    </div>
    <div class="w-full md:w-1/3 mb-6">
        <input type="text" wire:model.live.debounce.500ms="search" placeholder="Buscar por nombre..." class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400" />
    </div>
    <div class="overflow-x-auto bg-white rounded shadow">
        <table class="min-w-full w-full table-auto divide-y divide-gray-200">
            <thead class="bg-blue-900 text-white">
                <tr>
                    <th class="py-2 px-4 text-center uppercase w-16">#</th>
                    <th class="py-2 px-4 text-center uppercase">Nombre</th>
                    <th class="py-2 px-4 text-center uppercase">Descripción</th>
                    <th class="py-2 px-4 text-center uppercase">Color</th>
                    <th class="py-2 px-4 text-center uppercase">Activo</th>
                    <th class="py-2 px-4 text-center uppercase w-40">Acciones</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                <!--[if BLOCK]><![endif]--><?php $__empty_1 = true; $__currentLoopData = $estados; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $estado): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <tr>
                    <td class="px-4 py-3 text-center"><?php echo e($estado->id); ?></td>
                    <td class="px-4 py-3"><?php echo e($estado->nombre); ?></td>
                    <td class="px-4 py-3"><?php echo e($estado->descripcion); ?></td>
                    <td class="px-4 py-3"><span class="inline-block w-6 h-6 rounded-full" style="background: <?php echo e($estado->color); ?>"></span></td>
                    <td class="px-4 py-3 text-center"><?php echo e($estado->activo ? 'Sí' : 'No'); ?></td>
                    <td class="px-4 py-3 text-center">
                        <div class="flex justify-center gap-2">
                            <button wire:click="openModal('edit', <?php echo e($estado->id); ?>)" class="bg-yellow-400 text-white px-3 py-1 rounded hover:bg-yellow-500">Editar</button>
                            <button wire:click="confirmDelete(<?php echo e($estado->id); ?>)" class="bg-red-600 text-white px-3 py-1 rounded hover:bg-red-700">Eliminar</button>
                        </div>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <tr>
                    <td colspan="6" class="px-4 py-6 text-center text-gray-500">No hay estados registrados.</td>
                </tr>
                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
            </tbody>
        </table>
    </div>
    <div class="mt-4">
        <?php echo e($estados->links()); ?>

    </div>
    <?php echo $__env->make('livewire.partials.modal-form-estado', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('livewire.partials.confirm-delete-modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</div>
<?php /**PATH C:\xampp\htdocs\sisogrsu1\resources\views/livewire/estados.blade.php ENDPATH**/ ?>