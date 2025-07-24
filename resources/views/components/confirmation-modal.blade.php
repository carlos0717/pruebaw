<div
    x-data="{ 
        show: false, 
        title: '', 
        message: '', 
        confirmButtonText: 'Confirmar',
        cancelButtonText: 'Cancelar',
        confirmMethod: ''
    }"
    x-on:show-confirmation-modal.window="
        show = true;
        title = $event.detail.title || 'Confirmar Acción';
        message = $event.detail.message || '¿Estás seguro de que deseas continuar?';
        confirmButtonText = $event.detail.confirmButtonText || 'Confirmar';
        cancelButtonText = $event.detail.cancelButtonText || 'Cancelar';
        confirmMethod = $event.detail.confirmMethod;
    "
    x-show="show"
    class="fixed inset-0 z-[100] flex items-center justify-center bg-black bg-opacity-50"
    style="display: none;"
    x-cloak
>
    <div 
        @click.away="show = false"
        x-show="show"
        x-transition:enter="ease-out duration-300"
        x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
        x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
        x-transition:leave="ease-in duration-200"
        x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
        x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
        class="bg-white rounded-lg shadow-xl w-full max-w-md p-6"
    >
        <!-- Título del Modal -->
        <h3 class="text-lg font-bold text-gray-900" x-text="title"> </h3>
        
        <!-- Mensaje del Modal -->
        <p class="mt-2 text-sm text-gray-600" x-text="message"> </p>
        
        <!-- Botones de Acción -->
        <div class="mt-6 flex justify-end gap-3">
            <button 
                type="button" 
                @click="show = false" 
                class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                x-text="cancelButtonText"
            >
            </button>
            <button 
                type="button"
                @click="$wire.call(confirmMethod); show = false"
                class="px-4 py-2 text-sm font-medium text-white bg-red-600 border border-transparent rounded-md shadow-sm hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500"
                x-text="confirmButtonText"
            >                
            </button>
        </div>
    </div>
</div>