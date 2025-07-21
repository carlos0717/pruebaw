<div>
    <h2 class="text-xl font-bold text-gray-800 mb-2">Listado de Proyectos</h2>
    <div class="flex justify-end mb-2">
        <button wire:click="openModal('create')" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Nuevo Proyecto</button>
    </div>
    <div class="w-full md:w-1/3 mb-6">
        <input type="text" wire:model.live.debounce.500ms="search" placeholder="Buscar por título..." class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400" />
    </div>
    <div class="overflow-x-auto bg-white rounded shadow">
        <table class="min-w-full w-full table-auto divide-y divide-gray-200">
            <thead class="bg-blue-900 text-white">
                <tr>
                    <th class="py-2 px-4 text-center uppercase w-16">#</th>
                    <th class="py-2 px-4 text-center uppercase">Título</th>
                    <th class="py-2 px-4 text-center uppercase">Docente Tutor</th>
                    <th class="py-2 px-4 text-center uppercase">Equipo</th>
                    <th class="py-2 px-4 text-center uppercase">Estado</th>
                    <th class="py-2 px-4 text-center uppercase w-40">Acciones</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                <!--[if BLOCK]><![endif]--><?php $__empty_1 = true; $__currentLoopData = $proyectos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $proyecto): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <tr>
                    <td class="px-4 py-3 whitespace-nowrap text-center align-top"><?php echo e($proyecto->id); ?></td>
                    <td class="px-4 py-3 whitespace-normal align-top font-semibold text-gray-800"><?php echo e($proyecto->titulo); ?></td>
                    <td class="px-4 py-3 whitespace-normal align-top text-gray-800"><?php echo e($proyecto->docenteTutor->nombres ?? '-'); ?> <?php echo e($proyecto->docenteTutor->apellidos ?? ''); ?></td>
                    <td class="px-4 py-3 whitespace-normal align-top text-gray-800">
                        <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $proyecto->estudiantes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $est): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <span class="block"><?php echo e($est->nombres); ?> <?php echo e($est->apellidos); ?></span>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                    </td>
                    <td class="px-4 py-3 whitespace-normal align-top text-gray-800"><?php echo e($proyecto->estado); ?></td>
                    <td class="px-4 py-3 whitespace-nowrap text-center align-top">
                        <div class="flex justify-center gap-2">
                            <!-- <button wire:click="verDetalle(<?php echo e($proyecto->id); ?>)" class="bg-blue-700 text-white px-3 py-1 rounded hover:bg-blue-800">Ver Detalles</button> -->
                            <button wire:click="openModal('edit', <?php echo e($proyecto->id); ?>)" class="bg-yellow-400 text-white px-3 py-1 rounded hover:bg-yellow-500">Editar</button>
                            <button wire:click="confirmDelete(<?php echo e($proyecto->id); ?>)" class="bg-red-600 text-white px-3 py-1 rounded hover:bg-red-700">Eliminar</button>
                        </div>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <tr>
                    <td colspan="6" class="px-4 py-6 text-center text-gray-500">No hay proyectos registrados.</td>
                </tr>
                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
            </tbody>
        </table>
    </div>
    <div class="mt-4">
        <?php echo e($proyectos->links()); ?>

    </div>

    <!-- Modal principal de Proyecto -->
    <!--[if BLOCK]><![endif]--><?php if($modalOpen): ?>
        <?php echo $__env->make('livewire.partials.proyecto-modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

    <!-- Modal de registro de estudiante -->
    <!--[if BLOCK]><![endif]--><?php if($showEstudianteModal): ?>
        <?php echo $__env->make('livewire.partials.estudiante-modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

    <!-- Modal de Detalle de Proyecto (fuera del loop) -->
    <!--[if BLOCK]><![endif]--><?php if(isset($showDetalleModal) && $showDetalleModal && isset($detalleProyecto) && $detalleProyecto): ?>
        <?php echo $__env->make('livewire.partials.proyecto-detalle-modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

    <!-- Confirm Delete Modal -->
    <!--[if BLOCK]><![endif]--><?php if($confirmingDelete): ?>
        <div class="fixed inset-0 flex items-center justify-center z-50 bg-black bg-opacity-40">
            <div class="bg-white rounded-lg shadow-lg w-full max-w-md p-6">
                <h2 class="text-lg font-bold mb-4">Eliminar Proyecto</h2>
                <p class="mb-4">¿Está seguro que desea eliminar este proyecto?</p>
                <div class="flex justify-end gap-2 mt-4">
                    <button type="button" wire:click="closeDeleteModal" class="bg-gray-300 px-4 py-2 rounded">Cancelar</button>
                    <button type="button" wire:click="deleteProyecto" class="bg-red-600 text-white px-4 py-2 rounded">Eliminar</button>
                </div>
            </div>
        </div>
    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

    <!-- Modal de éxito profesional -->
    <?php if (isset($component)) { $__componentOriginal6475feafa5c7d85d71efc5a48adb5766 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal6475feafa5c7d85d71efc5a48adb5766 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.success-modal','data' => ['message' => 'Los cambios se han guardado correctamente.']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('success-modal'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['message' => 'Los cambios se han guardado correctamente.']); ?>
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
</div>
<?php /**PATH C:\xampp\htdocs\sisogrsu1\resources\views/livewire/proyectos.blade.php ENDPATH**/ ?>