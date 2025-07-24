<div class="relative inline-block text-left" x-data="{ open: false }">
    <!-- User Icon Button -->
    <button @click="open = !open" type="button" class="flex items-center justify-center w-10 h-10 rounded-full bg-blue-600 text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
        <!-- User Initials or Icon -->
        <span class="font-bold text-lg"><?php echo e(strtoupper(Auth::user()->name[0] ?? 'U')); ?></span>
    </button>

    <!-- Dropdown Menu -->
    <div x-show="open" @click.away="open = false" class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 z-50" style="display: none;" x-transition>
        <div class="py-1">
            <a href="<?php echo e(route('profile.show')); ?>" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Gestión de usuario</a>
            <button @click.prevent="open = false; $dispatch('open-logout-modal')" class="w-full text-left block px-4 py-2 text-sm text-red-600 hover:bg-gray-100">Cerrar sesión</button>
        </div>
    </div>
</div>

<!-- Notification Bell Icon (static for now) -->
<div class="inline-block ml-4 align-middle">
    <button type="button" class="relative flex items-center justify-center w-10 h-10 rounded-full bg-gray-100 text-gray-600 focus:outline-none">
        <!-- Heroicons Bell -->
        <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
            <path d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V4a2 2 0 10-4 0v1.341C7.67 7.165 6 9.388 6 12v2.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
        </svg>
        <!-- Notification dot (optional) -->
        <span class="absolute top-2 right-2 block w-2 h-2 bg-red-500 rounded-full"></span>
    </button>
</div>

<!-- Logout Confirmation Modal (Alpine.js event-driven) -->
<div x-data="{ show: false }" x-on:open-logout-modal.window="show = true">
    <div x-show="show" class="fixed inset-0 flex items-center justify-center z-50 bg-black bg-opacity-40" style="display: none;">
        <div class="bg-white rounded-lg shadow-lg p-6 w-full max-w-sm">
            <h2 class="text-lg font-semibold mb-4">¿Cerrar sesión?</h2>
            <p class="mb-6 text-gray-600">¿Estás seguro que deseas cerrar sesión?</p>
            <div class="flex justify-end space-x-2">
                <button @click="show = false" class="px-4 py-2 bg-gray-200 rounded hover:bg-gray-300">Cancelar</button>
                <form method="POST" action="<?php echo e(route('logout')); ?>">
                    <?php echo csrf_field(); ?>
                    <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700">Cerrar sesión</button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\sisogrsu1\resources\views/components/user-menu.blade.php ENDPATH**/ ?>