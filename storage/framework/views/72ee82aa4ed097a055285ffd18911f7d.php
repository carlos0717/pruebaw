<div class="w-full p-6">
                <h2 class="text-xl font-bold text-gray-800 mb-2">Listado de Noticias</h2>
                <div class="flex justify-end mb-2">
                    <a href="<?php echo e(route('noticias.create')); ?>" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Nueva Noticia</a>
                </div>
                <div class="w-full md:w-1/3 mb-6">
                    <input type="text" wire:model.live.debounce.500ms="search" placeholder="Buscar por título..." class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400" />
                </div>
                <div class="overflow-x-auto bg-white rounded shadow">
                    <table class="min-w-full w-full table-auto divide-y divide-gray-200">
                        <thead class="bg-blue-900 text-white">
                            <tr>
                                <th class="py-2 px-4 text-center w-16">#</th>
                                <th class="px-4 py-2 text-center uppercase">Miniatura</th>
                                <th class="px-4 py-2 text-center uppercase">Título</th>
                                <th class="px-4 py-2 text-center uppercase">Direccion</th>
                                <th class="px-4 py-2 text-center uppercase">Fecha</th>
                                <th class="px-4 py-2 text-center uppercase w-40">Acciones</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            <!--[if BLOCK]><![endif]--><?php $__empty_1 = true; $__currentLoopData = $noticias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $noticia): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr>
                                <td class="px-4 py-3 whitespace-nowrap text-center align-top"><?php echo e($noticia->id); ?></td>
                                <td class="px-4 py-3 whitespace-nowrap text-center align-top">                                    
                                    <!--[if BLOCK]><![endif]--><?php if($noticia->imagen_path): ?>
                                        <img src="<?php echo e(Storage::url($noticia->imagen_path)); ?>" class="h-12 w-20 object-cover rounded shadow" />
                                    <?php else: ?>
                                        <span class="text-gray-400">Sin imagen</span>
                                    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                                </td>
                                <td class="px-4 py-3 whitespace-normal align-top font-semibold text-gray-800"><?php echo e($noticia->titulo); ?></td>
                                <td class="px-4 py-3 whitespace-normal align-top"><?php echo e($noticia->area_origen); ?></td>
                                <td class="px-4 py-3 whitespace-nowrap text-center align-top"><?php echo e($noticia->fecha_publicacion ? \Carbon\Carbon::parse($noticia->fecha_publicacion)->format('d/m/Y H:i') : ''); ?></td>
                                <td class="px-4 py-3 whitespace-nowrap text-center align-top">
                                    <div class="flex justify-center gap-2">
                                        <button wire:click="confirmDelete(<?php echo e($noticia->id); ?>)" class="bg-red-600 text-white px-3 py-1 rounded hover:bg-red-700">Eliminar</button>
                                        <a href="<?php echo e(route('noticias.show', $noticia->id)); ?>" class="bg-blue-700 text-white px-3 py-1 rounded hover:bg-blue-800">Ver más</a>
                                        <a href="<?php echo e(route('noticias.edit', $noticia->id)); ?>" class="bg-yellow-600 text-white px-3 py-1 rounded hover:bg-yellow-700">Editar</a>
                                    </div>
                                </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <tr>
                                <td colspan="6" class="px-4 py-6 text-center text-gray-500">No hay noticias registradas.</td>
                            </tr>
                            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                        </tbody>
                    </table>
                </div>
                <div class="mt-4">
                    <?php echo e($noticias->links()); ?>

                </div>
                <!-- Confirm Delete Modal -->
                <?php
                    $showConfirmingDelete = isset($confirmingDelete) ? $confirmingDelete : (property_exists($this, 'confirmingDelete') ? $this->confirmingDelete : false);
                ?>
                <!--[if BLOCK]><![endif]--><?php if($showConfirmingDelete): ?>
                    <div class="fixed inset-0 flex items-center justify-center z-50 bg-black bg-opacity-40">
                        <div class="bg-white rounded-lg shadow-lg w-full max-w-md p-6">
                            <h2 class="text-lg font-bold mb-4">Eliminar Noticia</h2>
                            <p class="mb-4">¿Está seguro que desea eliminar esta noticia?</p>
                            <div class="flex justify-end gap-2 mt-4">
                                <button type="button" wire:click="closeDeleteModal" class="bg-gray-300 px-4 py-2 rounded">Cancelar</button>
                                <button type="button" wire:click="deleteNoticia" class="bg-red-600 text-white px-4 py-2 rounded">Eliminar</button>
                            </div>
                        </div>
                    </div>
                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
    <!-- Modal de éxito profesional global -->
    <!--[if BLOCK]><![endif]--><?php if(session('success_message')): ?>
        <?php if (isset($component)) { $__componentOriginal6475feafa5c7d85d71efc5a48adb5766 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal6475feafa5c7d85d71efc5a48adb5766 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.success-modal','data' => ['message' => session('success_message')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('success-modal'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['message' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(session('success_message'))]); ?>
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
    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
</div>
<?php /**PATH C:\xampp\htdocs\sisogrsu1\resources\views/livewire/noticias.blade.php ENDPATH**/ ?>