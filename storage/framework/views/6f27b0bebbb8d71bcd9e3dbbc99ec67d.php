<?php $__env->startSection('content'); ?>    
    <main class="h-screen w-full">
        <a href="/" 
           class="transition-all duration-200 ease-in-out"
           style="position: absolute; top: 16px; left: 16px; z-index: 1000; text-decoration: none; font-weight: bold; color: #3490dc; font-size: 18px; backdrop-filter: blur(4px); background: rgba(255,255,255,0.3); padding: 8px 18px; border-radius: 8px;"
           onmouseover="this.style.background='white'; this.style.backdropFilter='none';"
           onmouseout="this.style.background='rgba(255,255,255,0.3)'; this.style.backdropFilter='blur(4px)';"
        >&larr; Volver a Inicio</a>
        <div class="absolute inset-0 flex flex-col items-center justify-center">
            <div class="w-full flex justify-center mb-8">
                <div class="backdrop-blur-sm bg-white bg-opacity-90 rounded-xl px-10 py-6 flex items-center justify-center" style="min-width: 340px;">
                    <h2 class="text-4xl font-serif font-bold text-blue-900 text-center drop-shadow">Iniciar Sesión</h2>
                </div>
            </div>
            <?php if(session('status')): ?>
                <div class="mb-4 font-medium text-sm text-green-600">
                    <?php echo e(session('status')); ?>

                </div>
            <?php endif; ?>
            <form method="POST" action="<?php echo e(route('login')); ?>" class="w-full max-w-lg bg-white bg-opacity-90 rounded-2xl shadow-2xl p-10 space-y-8 mx-auto" id="loginForm">
                <?php echo csrf_field(); ?>
                <div>
                    <label for="email" class="block text-blue-900 font-semibold mb-1">Correo electrónico</label>
                    <input id="email" class="block w-full px-4 py-3 border border-blue-200 rounded focus:ring-2 focus:ring-blue-400 focus:outline-none text-lg" type="email" name="email" value="<?php echo e(old('email')); ?>" required autofocus autocomplete="username">
                </div>
                <div>
                    <label for="password" class="block text-blue-900 font-semibold mb-1">Contraseña</label>
                    <div class="relative">
                        <input id="password" class="block w-full px-4 py-3 border border-blue-200 rounded focus:ring-2 focus:ring-blue-400 focus:outline-none pr-10 text-lg" type="password" name="password" required autocomplete="current-password">
                        <button type="button" onclick="togglePasswordLogin()" class="absolute right-3 top-3 text-blue-700 hover:text-blue-900" tabindex="-1">
                            <svg id="eyeIconLogin" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-.38 1.262-1.01 2.422-1.858 3.418m-2.681 2.681C17.422 19.01 15.761 19 12 19c-4.478 0-8.268-2.943-9.542-7a10.05 10.05 0 013.292-4.418" /></svg>
                        </button>
                    </div>
                </div>
                <div class="flex items-center justify-between">
                    <label class="flex items-center">
                        <input type="checkbox" name="remember" class="rounded border-blue-300 text-blue-800 shadow-sm focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                        <span class="ml-2 text-gray-700">Recordarme</span>
                    </label>
                    <a class="text-blue-700 hover:underline font-semibold" href="<?php echo e(route('password.request')); ?>">¿Olvidaste tu contraseña?</a>
                </div>
                <button type="submit" class="w-full bg-blue-900 text-white py-3 rounded font-bold text-lg hover:bg-blue-800 transition">Ingresar</button>
                <!-- <div class="text-center mt-6">
                    <span class="text-blue-900">¿No tienes cuenta?</span>
                    <a href="<?php echo e(route('register')); ?>" class="text-blue-700 font-semibold hover:underline">Regístrate</a>
                </div> -->
            </form>
        </div>
    </main>
    <script>
    function togglePasswordLogin() {
        const pwd = document.getElementById('password');
        const icon = document.getElementById('eyeIconLogin');
        if (pwd.type === 'password') {
            pwd.type = 'text';
            icon.innerHTML = `<path stroke-linecap=\"round\" stroke-linejoin=\"round\" stroke-width=\"2\" d=\"M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.542-7a10.05 10.05 0 013.292-4.418\" /><path stroke-linecap=\"round\" stroke-linejoin=\"round\" stroke-width=\"2\" d=\"M15 12a3 3 0 11-6 0 3 3 0 016 0z\" /><path stroke-linecap=\"round\" stroke-linejoin=\"round\" stroke-width=\"2\" d=\"M3 3l18 18\" />`;
        } else {
            pwd.type = 'password';
            icon.innerHTML = `<path stroke-linecap=\"round\" stroke-linejoin=\"round\" stroke-width=\"2\" d=\"M15 12a3 3 0 11-6 0 3 3 0 016 0z\" /><path stroke-linecap=\"round\" stroke-linejoin=\"round\" stroke-width=\"2\" d=\"M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-.38 1.262-1.01 2.422-1.858 3.418m-2.681 2.681C17.422 19.01 15.761 19 12 19c-4.478 0-8.268-2.943-9.542-7a10.05 10.05 0 013.292-4.418\" />`;
        }
    }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.fullwidth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\sisogrsu1\resources\views/auth/login.blade.php ENDPATH**/ ?>