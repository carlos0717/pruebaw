

<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('layouts.header-nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <main class="flex-1 w-full">
        <section class="my-8">
            <div class="max-w-3xl mx-auto bg-white rounded-xl shadow-lg overflow-hidden">
                <img src="<?php echo e(asset('storage/' . $noticia->imagen_path)); ?>" alt="Imagen de la noticia" class="w-full h-64 object-cover bg-gray-100 border-b border-blue-100" style="aspect-ratio: 16/9;">
                <div class="p-8">
                    <h1 class="text-3xl md:text-4xl font-serif font-bold text-blue-900 mb-2"><?php echo e($noticia->titulo); ?></h1>
                    <div class="flex items-center text-sm text-gray-500 mb-4">
                        <span class="mr-2"><svg class="inline w-4 h-4 text-blue-700" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V4a2 2 0 10-4 0v1.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/></svg></span>
                        <span><?php echo e($noticia->area_origen); ?></span>
                        <span class="mx-2">|</span>
                        <span><?php echo e(\Carbon\Carbon::parse($noticia->fecha_publicacion)->format('d/m/Y H:i')); ?></span>
                        <span class="mx-2">|</span>
                        <span>Publicado por: <?php echo e($noticia->user->name ?? 'Usuario'); ?></span>
                    </div>
                    <div class="prose max-w-none text-gray-800 text-lg leading-relaxed">
                        <?php echo $noticia->descripcion; ?>

                    </div>
                </div>
            </div>
        </section>
        <div class="max-w-3xl mx-auto mt-8 flex justify-between">
            <a href="<?php echo e(url()->previous()); ?>" class="inline-flex items-center px-4 py-2 bg-blue-700 hover:bg-blue-800 text-white text-sm font-semibold rounded-lg shadow transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-offset-2">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"/></svg>
                Volver
            </a>
        </div>
    </main>
    <?php echo $__env->make('layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php $__env->startPush('scripts'); ?>
        <?php echo app('Illuminate\Foundation\Vite')(['resources/js/app.js']); ?>
    <?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\sisogrsu1\resources\views/template.blade.php ENDPATH**/ ?>