<div x-data="{ showNewInstitucionForm: false }" class="fixed inset-0 flex items-center justify-center z-[60] bg-black bg-opacity-40">
    <div class="bg-white rounded-lg shadow-lg w-full max-w-2xl p-6 relative">
        <button type="button" wire:click="$set('showInstitucionModal', false)" class="absolute top-2 right-2 text-gray-400 hover:text-blue-700">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
        </button>
        <h2 class="text-xl font-bold text-blue-900 mb-4">Seleccionar Institución</h2>
        <div class="mb-4">
            <input type="text" wire:model.live.debounce.400ms="institucion_search" placeholder="Buscar institución por nombre..." class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400" />
        </div>
        <div class="mb-2">
            <!--[if BLOCK]><![endif]--><?php if($institucion_id && ($inst = $instituciones->firstWhere('id', $institucion_id))): ?>
                <span class="bg-blue-100 text-blue-800 px-3 py-2 rounded-full flex items-center justify-between">
                    <span><strong>Seleccionado:</strong> <?php echo e($inst->nombre); ?></span>
                    <button wire:click="removeInstitucion" class="ml-2 text-red-500 hover:text-red-700" title="Quitar">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                    </button>
                </span>
            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
        </div>
        <div class="overflow-y-auto max-h-56 mb-4 border rounded">
            <ul>
                <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $this->searchInstituciones($institucion_search); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $inst): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li class="flex items-center justify-between px-3 py-2 border-b hover:bg-blue-50">
                        <div>
                            <span class="font-semibold text-blue-800"><?php echo e($inst->nombre); ?></span>
                            <span class="text-gray-500 text-xs ml-2"><?php echo e($inst->tipo->nombre ?? ''); ?></span>
                        </div>
                        <button wire:click="selectInstitucion(<?php echo e($inst->id); ?>)"
                                class="bg-blue-600 text-white px-3 py-1 rounded hover:bg-blue-700 disabled:opacity-50 disabled:cursor-not-allowed"
                                <?php if($institucion_id && $institucion_id != $inst->id): ?> disabled <?php endif; ?>>
                            <?php echo e($institucion_id == $inst->id ? 'Seleccionado' : 'Seleccionar'); ?>

                        </button>
                    </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                <!--[if BLOCK]><![endif]--><?php if(count($this->searchInstituciones($institucion_search)) == 0): ?>
                    <li class="px-3 py-2 text-gray-500">No se encontraron instituciones.</li>
                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
            </ul>
        </div>
        <div class="flex justify-end mt-4 gap-3">
            <button type="button" wire:click="$set('showInstitucionModal', false)" class="bg-gray-400 text-white px-4 py-2 rounded hover:bg-gray-500">Cancelar</button>
            <button type="button" wire:click="confirmInstitucionSelection" class="bg-blue-700 text-white px-4 py-2 rounded hover:bg-blue-800 disabled:opacity-50" <?php if(!$institucion_id): ?> disabled <?php endif; ?>>
                Confirmar Selección
            </button>
        </div>
    </div>
</div><?php /**PATH C:\xampp\htdocs\sisogrsu1\resources\views/livewire/partials/institucion-modal.blade.php ENDPATH**/ ?>