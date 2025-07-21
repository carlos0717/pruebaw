<div>
    <h2 class="text-xl font-bold text-gray-800 mb-2">Gestión de Instituciones</h2>
    <div class="flex justify-end mb-2">
        <button wire:click="openModal('create')" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Nueva Institución</button>
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
                    <th class="py-2 px-4 text-center uppercase">Tipo</th>
                    <th class="py-2 px-4 text-center uppercase">Descripción</th>
                    <th class="py-2 px-4 text-center uppercase">Activo</th>
                    <th class="py-2 px-4 text-center uppercase w-40">Acciones</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                <!--[if BLOCK]><![endif]--><?php $__empty_1 = true; $__currentLoopData = $instituciones; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $institucion): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <tr>
                    <td class="px-4 py-3 text-center"><?php echo e($institucion->id); ?></td>
                    <td class="px-4 py-3"><?php echo e($institucion->nombre); ?></td>
                    <td class="px-4 py-3"><?php echo e($institucion->institucionTipo->nombre ?? '-'); ?></td>
                    <td class="px-4 py-3"><?php echo e($institucion->descripcion); ?></td>
                    <td class="px-4 py-3 text-center"><?php echo e($institucion->activo ? 'Sí' : 'No'); ?></td>
                    <td class="px-4 py-3 text-center">
                        <div class="flex justify-center gap-2">
                            <button wire:click="openModal('edit', <?php echo e($institucion->id); ?>)" class="bg-yellow-400 text-white px-3 py-1 rounded hover:bg-yellow-500">Editar</button>
                            <button wire:click="confirmDelete(<?php echo e($institucion->id); ?>)" class="bg-red-600 text-white px-3 py-1 rounded hover:bg-red-700">Eliminar</button>
                        </div>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <tr>
                    <td colspan="6" class="px-4 py-6 text-center text-gray-500">No hay instituciones registradas.</td>
                </tr>
                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
            </tbody>
        </table>
    </div>
    <div class="mt-4">
        <?php echo e($instituciones->links()); ?>

    </div>
    <?php echo $__env->make('livewire.partials.modal-form-institucion', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    
    <?php if (isset($component)) { $__componentOriginal6475feafa5c7d85d71efc5a48adb5766 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal6475feafa5c7d85d71efc5a48adb5766 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.success-modal','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('success-modal'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal6475feafa5c7d85d71efc5a48adb5766)): ?>
<?php $attributes = $__attributesOriginal6475feafa5c7d85d71efc5a48adb5766; ?>
<?php unset($__attributesOriginal6475feafa5c7d85d71efc5a48adb5766); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal6475feafa5c7d85d71efc5a48adb5766)): ?>
<?php $component = $__componentOriginal6475feafa5c7d85d71efc5a48adb5766; ?>
<?php unset($__componentOriginal6475feafa5c7d85d71efc5a48adb5766); ?>
<?php endif; ?>

    <!-- Modal de Confirmación de Eliminación de Institución -->
    <!--[if BLOCK]><![endif]--><?php if($showDeleteModal): ?>
        <div class="fixed inset-0 flex items-center justify-center z-50 bg-black bg-opacity-40">
            <div class="bg-white rounded-lg shadow-lg w-full max-w-md p-6">
                <h2 class="text-lg font-bold mb-4">Eliminar Institución</h2>
                <!--[if BLOCK]><![endif]--><?php if($deleteWarning): ?>
                    <p class="mb-4 text-red-600 font-semibold"><?php echo e($deleteWarning); ?></p>
                    <div class="flex justify-end gap-2 mt-4">
                        <button type="button" wire:click="closeDeleteModal" class="bg-blue-600 text-white px-4 py-2 rounded">Entendido</button>
                    </div>
                <?php else: ?>
                    <p class="mb-4">¿Está seguro que desea eliminar esta institución? Esta acción no se puede deshacer.</p>
                    <div class="flex justify-end gap-2 mt-4">
                        <button type="button" wire:click="closeDeleteModal" class="bg-gray-300 px-4 py-2 rounded">Cancelar</button>
                        <button type="button" wire:click="delete" class="bg-red-600 text-white px-4 py-2 rounded">Eliminar</button>
                    </div>
                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
            </div>
        </div>
    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
</div>
<?php /**PATH C:\xampp\htdocs\sisogrsu1\resources\views/livewire/instituciones.blade.php ENDPATH**/ ?>