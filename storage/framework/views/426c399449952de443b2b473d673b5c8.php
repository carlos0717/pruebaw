
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo e($title ?? 'SISOGRSU'); ?></title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <?php echo \Livewire\Mechanisms\FrontendAssets\FrontendAssets::styles(); ?>  
    <?php echo $__env->yieldPushContent('styles'); ?>
</head>
<body class="min-h-screen flex flex-col bg-gray-100">
    <header class="bg-white shadow sticky top-0 z-30">
        <div class="flex items-center justify-between px-6 py-3">
            <div class="flex items-center gap-4">
                <span class="text-2xl font-bold text-blue-900 tracking-wide">SIS - OGRSU</span>
                <span class="text-gray-400 mx-2">|</span>
                <nav class="flex items-center text-gray-500 text-sm">
                    <span class="material-icons text-base mr-1">apps</span>
                    <span>Aplicación</span>
                    <span class="mx-2">&gt;</span>
                    <span class="text-blue-600 font-semibold"><?php echo $__env->yieldContent('breadcrumb', 'Dashboard'); ?></span>
                </nav>
            </div>
            <div class="flex items-center gap-6">
                <!-- Notificaciones
                <button class="relative focus:outline-none">
                    <span class="material-icons text-2xl text-gray-500 hover:text-blue-600 transition">notifications</span>
                    <span class="absolute top-0 right-0 block h-2 w-2 rounded-full ring-2 ring-white bg-red-500"></span>
                </button> -->
                <!-- Avatar usuario -->
                <div>
                    <?php echo $__env->make('components.user-menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
            </div>
        </div>
    </header>
    <div class="flex flex-1">
        <?php if (isset($component)) { $__componentOriginal0aab876b288b74948d15144f4269b828 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal0aab876b288b74948d15144f4269b828 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.sidebar-menu','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('sidebar-menu'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal0aab876b288b74948d15144f4269b828)): ?>
<?php $attributes = $__attributesOriginal0aab876b288b74948d15144f4269b828; ?>
<?php unset($__attributesOriginal0aab876b288b74948d15144f4269b828); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal0aab876b288b74948d15144f4269b828)): ?>
<?php $component = $__componentOriginal0aab876b288b74948d15144f4269b828; ?>
<?php unset($__componentOriginal0aab876b288b74948d15144f4269b828); ?>
<?php endif; ?>
        <main class="flex-1 p-8">
            <?php echo e($slot); ?>

        </main>
    </div>
    <?php if (isset($component)) { $__componentOriginal8a8716efb3c62a45938aca52e78e0322 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8a8716efb3c62a45938aca52e78e0322 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.footer','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('footer'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal8a8716efb3c62a45938aca52e78e0322)): ?>
<?php $attributes = $__attributesOriginal8a8716efb3c62a45938aca52e78e0322; ?>
<?php unset($__attributesOriginal8a8716efb3c62a45938aca52e78e0322); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8a8716efb3c62a45938aca52e78e0322)): ?>
<?php $component = $__componentOriginal8a8716efb3c62a45938aca52e78e0322; ?>
<?php unset($__componentOriginal8a8716efb3c62a45938aca52e78e0322); ?>
<?php endif; ?>
    <?php echo \Livewire\Mechanisms\FrontendAssets\FrontendAssets::scripts(); ?>

    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
    <?php echo $__env->yieldPushContent('scripts'); ?>
</body>
</html><?php /**PATH C:\xampp\htdocs\sisogrsu1\resources\views/components/layouts/app.blade.php ENDPATH**/ ?>