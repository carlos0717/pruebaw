<div>
    <h2 class="text-xl font-bold text-gray-800 mb-2">Gestión de Convenios</h2>
    <div class="flex justify-between items-center mb-4">
        <div class="w-full md:w-1/3">
            <input type="text" wire:model.live.debounce.500ms="search" placeholder="Buscar por nombre, institución..." class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400" />
        </div>
        <div class="flex gap-2">
            <button wire:click="showTotals" class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700 shadow font-semibold flex items-center"><svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M3 6h18M3 14h18M3 18h18" /></svg>Totales</button>
            <button wire:click="openModal('create')" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Nuevo Convenio</button>
        </div>
    </div>
    <!-- Modal de Totales de Convenios -->
    <!--[if BLOCK]><![endif]--><?php if($showTotalsModal): ?>
        <div class="fixed inset-0 flex items-center justify-center z-50 bg-black bg-opacity-40">
            <div class="bg-white rounded-lg shadow-2xl w-full max-w-3xl p-8 relative animate-fade-in">
                <button type="button" wire:click="closeTotalsModal" class="absolute top-4 right-4 text-gray-400 hover:text-gray-700 text-2xl font-bold focus:outline-none" aria-label="Cerrar">&times;</button>
                <h2 class="text-2xl font-bold mb-6 text-indigo-800 flex items-center"><svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M3 6h18M3 14h18M3 18h18" /></svg>Resumen de Convenios</h2>
                <div class="overflow-x-auto">
                    <table class="min-w-full table-auto border border-gray-200 rounded-lg shadow-sm">
                        <thead class="bg-indigo-700 text-white">
                            <tr>
                                <th class="py-2 px-4 text-center uppercase">Entidad</th>
                                <th class="py-2 px-4 text-center uppercase">Caducado</th>
                                <th class="py-2 px-4 text-center uppercase">En Proceso</th>
                                <th class="py-2 px-4 text-center uppercase">Vigente</th>
                                <th class="py-2 px-4 text-center uppercase">Total General</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $totalsData['rows']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td class="px-4 py-3 text-center font-semibold text-gray-800"><?php echo e($row['entidad']); ?></td>
                                    <td class="px-4 py-3 text-center text-red-600 font-bold"><?php echo e($row['Caducado']); ?></td>
                                    <td class="px-4 py-3 text-center text-yellow-600 font-bold"><?php echo e($row['En proceso']); ?></td>
                                    <td class="px-4 py-3 text-center text-green-700 font-bold"><?php echo e($row['Vigente']); ?></td>
                                    <td class="px-4 py-3 text-center font-bold text-indigo-800"><?php echo e($row['total']); ?></td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                        </tbody>
                        <tfoot class="bg-indigo-100 font-bold">
                            <tr>
                                <td class="px-4 py-3 text-center">Total general</td>
                                <td class="px-4 py-3 text-center text-red-700"><?php echo e($totalsData['totalPorEstado']['Caducado']); ?></td>
                                <td class="px-4 py-3 text-center text-yellow-700"><?php echo e($totalsData['totalPorEstado']['En proceso']); ?></td>
                                <td class="px-4 py-3 text-center text-green-800"><?php echo e($totalsData['totalPorEstado']['Vigente']); ?></td>
                                <td class="px-4 py-3 text-center text-indigo-900"><?php echo e($totalsData['totalGeneral']); ?></td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

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

    <!-- Modal de Confirmación de Eliminación -->
    <!--[if BLOCK]><![endif]--><?php if($showDeleteModal): ?>
        <div class="fixed inset-0 flex items-center justify-center z-50 bg-black bg-opacity-40">
            <div class="bg-white rounded-lg shadow-lg w-full max-w-md p-6">
                <h2 class="text-lg font-bold mb-4">Eliminar Convenio</h2>
                <p class="mb-4">¿Está seguro que desea eliminar este convenio? Esta acción no se puede deshacer.</p>
                <div class="flex justify-end gap-2 mt-4">
                    <button type="button" wire:click="closeDeleteModal" class="bg-gray-300 px-4 py-2 rounded">Cancelar</button>
                    <button type="button" wire:click="deleteConvenio" class="bg-red-600 text-white px-4 py-2 rounded">Eliminar</button>
                </div>
            </div>
        </div>
    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
</div><?php /**PATH C:\xampp\htdocs\sisogrsu1\resources\views/livewire/convenios.blade.php ENDPATH**/ ?>