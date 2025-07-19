<div>
    <h2 class="text-xl font-bold text-gray-800 mb-2">Gestión de Convenios</h2>
    <div class="flex justify-between items-center mb-4">
        <div class="w-full md:w-1/3">
            <input type="text" wire:model.live.debounce.500ms="search" placeholder="Buscar por nombre, institución..." class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400" />
        </div>
        <button wire:click="openModal('create')" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Nuevo Convenio</button>
    </div>

    <div class="overflow-x-auto bg-white rounded shadow">
        <table class="min-w-full w-full table-auto divide-y divide-gray-200">
            <thead class="bg-blue-900 text-white">
                <tr>
                    <th class="py-2 px-4 text-center uppercase w-16">#</th>
                    <th class="py-2 px-4 text-left uppercase">Nombre</th>
                    <th class="py-2 px-4 text-left uppercase">Institución</th>
                    <th class="py-2 px-4 text-left uppercase">Tipo Institución</th>
                    <th class="py-2 px-4 text-center uppercase">Resolución</th>
                    <th class="py-2 px-4 text-center uppercase">Fecha Inicio</th> <!-- NUEVA COLUMNA -->
                    <th class="py-2 px-4 text-center uppercase">Fecha Fin</th>
                    <th class="py-2 px-4 text-center uppercase">Estado</th>
                    <th class="py-2 px-4 text-center uppercase">Documento</th>
                    <th class="py-2 px-4 text-center uppercase w-40">Acciones</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                <!--[if BLOCK]><![endif]--><?php $__empty_1 = true; $__currentLoopData = $convenios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $convenio): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <tr>
                    <td class="px-4 py-3 text-center align-middle"><?php echo e($convenio->id); ?></td>
                    <td class="px-4 py-3 align-middle"><?php echo e($convenio->nombre); ?></td>
                    <td class="px-4 py-3 align-middle"><?php echo e($convenio->institucion->nombre ?? '-'); ?></td>
                    <td class="px-4 py-3 align-middle"><?php echo e($convenio->institucion->institucionTipo->nombre ?? '-'); ?></td>
                    <td class="px-4 py-3 text-center align-middle"><?php echo e($convenio->documento_nombre ?? '-'); ?></td>
                    
                    <!-- NUEVA CELDA DE DATOS PARA FECHA INICIO -->
                    <td class="px-4 py-3 text-center align-middle"><?php echo e($convenio->fecha_inicio ? \Carbon\Carbon::parse($convenio->fecha_inicio)->format('d/m/Y') : '-'); ?></td>

                    <td class="px-4 py-3 text-center align-middle"><?php echo e($convenio->fecha_fin ? \Carbon\Carbon::parse($convenio->fecha_fin)->format('d/m/Y') : '-'); ?></td>
                    
                    <td class="px-4 py-3 text-center align-middle">
                        <!--[if BLOCK]><![endif]--><?php if($convenio->estado): ?>
                            <?php
                                $status = strtolower($convenio->estado->nombre);
                                $baseClasses = 'inline-flex items-center px-3 py-1 text-xs font-bold leading-none rounded-full';
                                $colorClasses = '';

                                switch ($status) {
                                    case 'vigente':
                                        $colorClasses = 'bg-green-100 text-green-800';
                                        break;
                                    case 'en proceso':
                                        $colorClasses = 'bg-yellow-100 text-yellow-800';
                                        break;
                                    case 'caducado':
                                        $colorClasses = 'bg-red-100 text-red-800';
                                        break;
                                    default:
                                        $colorClasses = 'bg-gray-100 text-gray-800';
                                        break;
                                }
                            ?>
                            <span class="<?php echo e($baseClasses); ?> <?php echo e($colorClasses); ?>">
                                <?php echo e($convenio->estado->nombre); ?>

                            </span>
                        <?php else: ?>
                            <span>-</span>
                        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                    </td>

                    <td class="px-4 py-3 text-center align-middle">
                        <!--[if BLOCK]><![endif]--><?php if($convenio->documento_escaneado_path): ?>
                            <a href="<?php echo e(Storage::url($convenio->documento_escaneado_path)); ?>" target="_blank" class="text-blue-600 hover:underline">Ver PDF</a>
                        <?php else: ?>
                            -
                        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                    </td>
                    <td class="px-4 py-3 text-center align-middle">
                        <div class="flex justify-center gap-2">
                            <button wire:click="openModal('edit', <?php echo e($convenio->id); ?>)" class="bg-yellow-400 text-white px-3 py-1 rounded hover:bg-yellow-500">Editar</button>
                            <button wire:click="confirmDelete(<?php echo e($convenio->id); ?>)" class="bg-red-600 text-white px-3 py-1 rounded hover:bg-red-700">Eliminar</button>
                        </div>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <tr>
                    <!-- COLSPAN ACTUALIZADO A 10 -->
                    <td colspan="10" class="px-4 py-6 text-center text-gray-500">No hay convenios registrados.</td>
                </tr>
                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        <?php echo e($convenios->links()); ?>

    </div>

    <!--[if BLOCK]><![endif]--><?php if($modalOpen): ?>
        <?php echo $__env->make('livewire.partials.modal-form-convenio', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

    <!--[if BLOCK]><![endif]--><?php if($showInstitucionModal): ?>
        <?php echo $__env->make('livewire.partials.institucion-modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

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
    <?php if (isset($component)) { $__componentOriginal5b8b2d0f151a30be878e1a760ec3900c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5b8b2d0f151a30be878e1a760ec3900c = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.confirmation-modal','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('confirmation-modal'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal5b8b2d0f151a30be878e1a760ec3900c)): ?>
<?php $attributes = $__attributesOriginal5b8b2d0f151a30be878e1a760ec3900c; ?>
<?php unset($__attributesOriginal5b8b2d0f151a30be878e1a760ec3900c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal5b8b2d0f151a30be878e1a760ec3900c)): ?>
<?php $component = $__componentOriginal5b8b2d0f151a30be878e1a760ec3900c; ?>
<?php unset($__componentOriginal5b8b2d0f151a30be878e1a760ec3900c); ?>
<?php endif; ?>
</div><?php /**PATH C:\xampp\htdocs\sisogrsu1\resources\views/livewire/convenios.blade.php ENDPATH**/ ?>