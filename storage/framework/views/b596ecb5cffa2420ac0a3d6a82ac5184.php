<div>
    <h2 class="text-xl font-bold text-gray-800 mb-2">Listado de Facultades</h2>
    <div class="flex justify-end mb-2">
        <button wire:click="openModal('create')" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Nueva Facultad</button>
    </div>
    <div class="w-full md:w-1/3 mb-6">
        <input type="text" wire:model.live.debounce.500ms="search" placeholder="Buscar por nombre..." class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400" />
    </div>
    <div class="overflow-x-auto bg-white rounded shadow">
        <table class="min-w-full w-full table-auto divide-y divide-gray-200">
            <thead class="bg-blue-900 text-white">
                <tr>
                    <th class="py-2 px-4 text-center w-16">#</th>
                    <th class="px-4 py-2 text-center uppercase">Nombre</th>
                    <th class="px-4 py-2 text-center uppercase w-40">Acciones</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                <!--[if BLOCK]><![endif]--><?php $__empty_1 = true; $__currentLoopData = $facultades; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $facultad): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <tr>
                    <td class="px-4 py-3 whitespace-nowrap text-center align-top"><?php echo e($facultad->id); ?></td>
                    <td class="px-4 py-3 whitespace-normal align-top font-semibold text-gray-800"><?php echo e($facultad->nombre); ?></td>
                    <td class="px-4 py-3 whitespace-nowrap text-center align-top">
                        <div class="flex justify-center gap-2">
                            <button wire:click="openModal('edit', <?php echo e($facultad->id); ?>)" class="bg-yellow-400 text-white px-3 py-1 rounded hover:bg-yellow-500">Editar</button>
                            <button wire:click="confirmDelete(<?php echo e($facultad->id); ?>)" class="bg-red-600 text-white px-3 py-1 rounded hover:bg-red-700">Eliminar</button>
                        </div>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <tr>
                    <td colspan="3" class="px-4 py-6 text-center text-gray-500">No hay facultades registradas.</td>
                </tr>
                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
            </tbody>
        </table>
    </div>
    <div class="mt-4">
        <?php echo e($facultades->links()); ?>

    </div>
    <!-- Modal -->
    <!--[if BLOCK]><![endif]--><?php if($modalOpen): ?>
        <div class="fixed inset-0 flex items-center justify-center z-50 bg-black bg-opacity-40">
            <div class="bg-white rounded-lg shadow-lg w-full max-w-md p-6">
                <h2 class="text-lg font-bold mb-4"><?php echo e($modalMode === 'create' ? 'Nueva Facultad' : 'Editar Facultad'); ?></h2>
                <div class="mb-4">
                    <label class="block text-gray-700">Nombre de la Facultad</label>
                    <input type="text" wire:model.defer="nombre" maxlength="255" class="w-full border rounded px-3 py-2 mt-1 <?php $__errorArgs = ['nombre'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-500 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="Ej: Facultad de Ingeniería" />
                    <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['nombre'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-red-500 text-xs"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
                </div>
                <div class="flex justify-end gap-2 mt-4">
                    <button type="button" wire:click="closeModal" class="bg-gray-300 px-4 py-2 rounded">Cancelar</button>
                    <button wire:click="saveFacultad" class="bg-blue-600 text-white px-4 py-2 rounded"><?php echo e($modalMode === 'create' ? 'Crear' : 'Actualizar'); ?></button>
                </div>
            </div>
        </div>
    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
    <!-- Confirm Delete Modal -->
    <!--[if BLOCK]><![endif]--><?php if($confirmingDelete): ?>
        <div class="fixed inset-0 flex items-center justify-center z-50 bg-black bg-opacity-40">
            <div class="bg-white rounded-lg shadow-lg w-full max-w-md p-6">
                <h2 class="text-lg font-bold mb-4">Eliminar Facultad</h2>
                <p class="mb-4">¿Está seguro que desea eliminar esta facultad?</p>
                <div class="flex justify-end gap-2 mt-4">
                    <button type="button" wire:click="$set('confirmingDelete', false)" class="bg-gray-300 px-4 py-2 rounded">Cancelar</button>
                    <button wire:click="deleteFacultad" class="bg-red-600 text-white px-4 py-2 rounded">Eliminar</button>
                </div>
            </div>
        </div>
    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
    <!-- Modal de éxito con Alpine.js -->
    <?php if (isset($component)) { $__componentOriginal1347047ed676050ce05de3ccca425f13 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal1347047ed676050ce05de3ccca425f13 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.exito-modal','data' => ['message' => '']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('exito-modal'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['message' => '']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal1347047ed676050ce05de3ccca425f13)): ?>
<?php $attributes = $__attributesOriginal1347047ed676050ce05de3ccca425f13; ?>
<?php unset($__attributesOriginal1347047ed676050ce05de3ccca425f13); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal1347047ed676050ce05de3ccca425f13)): ?>
<?php $component = $__componentOriginal1347047ed676050ce05de3ccca425f13; ?>
<?php unset($__componentOriginal1347047ed676050ce05de3ccca425f13); ?>
<?php endif; ?>
</div>
<?php /**PATH C:\xampp\htdocs\sisogrsu1\resources\views/livewire/facultades.blade.php ENDPATH**/ ?>