<div class="fixed inset-0 flex items-center justify-center z-50 bg-black bg-opacity-40">
    <div class="bg-white rounded-lg shadow-lg w-full max-w-2xl p-6 overflow-y-auto max-h-[90vh]">
        <h2 class="text-lg font-bold mb-4"><?php echo e($modalMode === 'create' ? 'Nuevo Convenio' : 'Editar Convenio'); ?></h2>
        <form wire:submit.prevent="save">
            <div class="mb-4">
                <label class="block text-gray-700">Nombre del Convenio</label>
                <input type="text" wire:model.defer="nombre" maxlength="255" class="w-full border rounded px-3 py-2 mt-1 <?php $__errorArgs = ['nombre'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-500 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="Nombre del convenio" />
                <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['nombre'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-red-500 text-xs"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
            </div>
            <div class="mb-4">
                <label class="block text-gray-700">Institución</label>
                <button type="button" wire:click="$set('showInstitucionModal', true)" class="bg-blue-100 text-blue-800 px-3 py-2 rounded hover:bg-blue-200 mt-2">
                    Seleccionar Institución
                </button>
                <div class="mt-2">
                    <!--[if BLOCK]><![endif]--><?php if($institucion_id && ($inst = $instituciones->firstWhere('id', $institucion_id))): ?>
                    <div class="flex items-center justify-between bg-green-100 rounded px-3 py-2">
                        <span class="font-semibold"><?php echo e($inst->nombre); ?> - <?php echo e($inst->tipo->nombre ?? 'Sin tipo'); ?></span>
                        <button type="button" wire:click.stop="$set('institucion_id', null)" class="text-red-600 hover:text-red-800 text-xs ml-2 font-bold">QUITAR</button>
                    </div>
                    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                </div>
                <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['institucion_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-red-500 text-xs mt-1"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="mb-4">
                    <label class="block text-gray-700">Número de Resolución</label>
                    <input type="text" wire:model.defer="documento_nombre" maxlength="100" class="w-full border rounded px-3 py-2 mt-1 <?php $__errorArgs = ['documento_nombre'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-500 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="Ej: R.R. N° 123-2025" />
                    <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['documento_nombre'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-red-500 text-xs"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700">Documento Escaneado (PDF, Máx. 5MB)</label>
                    <input type="file" wire:model="documento_escaneado" accept=".pdf" class="w-full border rounded px-3 py-2 mt-1 <?php $__errorArgs = ['documento_escaneado'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-500 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" />
                    <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['documento_escaneado'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-red-500 text-xs"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->

                    <!-- Lógica para mostrar archivo actual Y ELIMINARLO -->
                    <!--[if BLOCK]><![endif]--><?php if($modalMode === 'edit' && $documento_escaneado_path): ?>
                    <div class="mt-2 text-sm flex items-center justify-between bg-gray-100 p-2 rounded">
                        <div>
                            <span class="text-gray-600 font-semibold">Archivo actual:</span>
                            <a href="<?php echo e(Storage::url($documento_escaneado_path)); ?>" target="_blank" class="text-blue-600 hover:underline ml-2">
                                Ver Documento
                            </a>
                        </div>
                        <!-- Botón para eliminar el documento -->
                        <button
                            type="button"
                            wire:click="confirmDocumentDelete"
                            wire:loading.attr="disabled"
                            class="text-red-500 hover:text-red-700 font-bold text-xs">
                            ELIMINAR
                        </button>
                    </div>
                    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                </div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="mb-4">
                    <label class="block text-gray-700">Fecha Inicio</label>
                    <input type="date" wire:model.defer="fecha_inicio" class="w-full border rounded px-3 py-2 mt-1 <?php $__errorArgs = ['fecha_inicio'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-500 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" />
                    <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['fecha_inicio'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-red-500 text-xs"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700">Fecha Fin</label>
                    <input type="date" wire:model.defer="fecha_fin" class="w-full border rounded px-3 py-2 mt-1 <?php $__errorArgs = ['fecha_fin'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-500 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" />
                    <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['fecha_fin'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-red-500 text-xs"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
                </div>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700">Estado</label>
                <select wire:model.defer="estado_id" class="w-full border rounded px-3 py-2 mt-1 <?php $__errorArgs = ['estado_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-500 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                    <option value="">Seleccione un estado</option>
                    <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $estados; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $est): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($est->id); ?>"><?php echo e($est->nombre); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                </select>
                <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['estado_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-red-500 text-xs"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
            </div>
            <div class="mb-4">
                <label class="block text-gray-700">Descripción</label>
                <textarea wire:model.defer="descripcion" maxlength="500" class="w-full border rounded px-3 py-2 mt-1 <?php $__errorArgs = ['descripcion'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-500 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="Descripción u observaciones del convenio"></textarea>
                <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['descripcion'];
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
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Guardar</button>
            </div>
        </form>
    </div>
</div><?php /**PATH C:\xampp\htdocs\sisogrsu1\resources\views/livewire/partials/modal-form-convenio.blade.php ENDPATH**/ ?>