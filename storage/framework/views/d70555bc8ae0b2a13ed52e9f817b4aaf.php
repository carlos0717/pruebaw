


<?php if (isset($component)) { $__componentOriginal5863877a5171c196453bfa0bd807e410 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5863877a5171c196453bfa0bd807e410 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.layouts.app','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('layouts.app'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
    <div class="flex">
        
        <main class="flex-1 p-8">
            <?php if (isset($component)) { $__componentOriginald37f1b809d8dad08d9600a37cd72bf8e = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald37f1b809d8dad08d9600a37cd72bf8e = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.dashboard-header','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('dashboard-header'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginald37f1b809d8dad08d9600a37cd72bf8e)): ?>
<?php $attributes = $__attributesOriginald37f1b809d8dad08d9600a37cd72bf8e; ?>
<?php unset($__attributesOriginald37f1b809d8dad08d9600a37cd72bf8e); ?>
<?php endif; ?>
<?php if (isset($__componentOriginald37f1b809d8dad08d9600a37cd72bf8e)): ?>
<?php $component = $__componentOriginald37f1b809d8dad08d9600a37cd72bf8e; ?>
<?php unset($__componentOriginald37f1b809d8dad08d9600a37cd72bf8e); ?>
<?php endif; ?>
            <div class="grid grid-cols-3 gap-6 mt-8">
                <?php if (isset($component)) { $__componentOriginalff911a016503f37793340e32da244def = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalff911a016503f37793340e32da244def = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.general-report-card','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('general-report-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalff911a016503f37793340e32da244def)): ?>
<?php $attributes = $__attributesOriginalff911a016503f37793340e32da244def; ?>
<?php unset($__attributesOriginalff911a016503f37793340e32da244def); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalff911a016503f37793340e32da244def)): ?>
<?php $component = $__componentOriginalff911a016503f37793340e32da244def; ?>
<?php unset($__componentOriginalff911a016503f37793340e32da244def); ?>
<?php endif; ?>
                <?php if (isset($component)) { $__componentOriginald51afb13392f2f7af2864a29499b3a65 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald51afb13392f2f7af2864a29499b3a65 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.visitors-card','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('visitors-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginald51afb13392f2f7af2864a29499b3a65)): ?>
<?php $attributes = $__attributesOriginald51afb13392f2f7af2864a29499b3a65; ?>
<?php unset($__attributesOriginald51afb13392f2f7af2864a29499b3a65); ?>
<?php endif; ?>
<?php if (isset($__componentOriginald51afb13392f2f7af2864a29499b3a65)): ?>
<?php $component = $__componentOriginald51afb13392f2f7af2864a29499b3a65; ?>
<?php unset($__componentOriginald51afb13392f2f7af2864a29499b3a65); ?>
<?php endif; ?>
                <?php if (isset($component)) { $__componentOriginal54c5ea4449c35739f8f9084ffd4a542a = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal54c5ea4449c35739f8f9084ffd4a542a = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.users-by-age-card','data' => ['total' => $total,'aprobados' => $aprobados,'enCurso' => $enCurso,'rechazados' => $rechazados,'finalizados' => $finalizados]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('users-by-age-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['total' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($total),'aprobados' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($aprobados),'en-curso' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($enCurso),'rechazados' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($rechazados),'finalizados' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($finalizados)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal54c5ea4449c35739f8f9084ffd4a542a)): ?>
<?php $attributes = $__attributesOriginal54c5ea4449c35739f8f9084ffd4a542a; ?>
<?php unset($__attributesOriginal54c5ea4449c35739f8f9084ffd4a542a); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal54c5ea4449c35739f8f9084ffd4a542a)): ?>
<?php $component = $__componentOriginal54c5ea4449c35739f8f9084ffd4a542a; ?>
<?php unset($__componentOriginal54c5ea4449c35739f8f9084ffd4a542a); ?>
<?php endif; ?>
            </div>
            <div class="grid grid-cols-3 gap-6 mt-8">
                <?php if (isset($component)) { $__componentOriginal0609092d4e442bb89a74544a83e31cd7 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal0609092d4e442bb89a74544a83e31cd7 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.official-store-map','data' => ['class' => 'col-span-2']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('official-store-map'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'col-span-2']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal0609092d4e442bb89a74544a83e31cd7)): ?>
<?php $attributes = $__attributesOriginal0609092d4e442bb89a74544a83e31cd7; ?>
<?php unset($__attributesOriginal0609092d4e442bb89a74544a83e31cd7); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal0609092d4e442bb89a74544a83e31cd7)): ?>
<?php $component = $__componentOriginal0609092d4e442bb89a74544a83e31cd7; ?>
<?php unset($__componentOriginal0609092d4e442bb89a74544a83e31cd7); ?>
<?php endif; ?>
                <?php if (isset($component)) { $__componentOriginalfdcfc370b54b732c4da69dcb292bcf63 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalfdcfc370b54b732c4da69dcb292bcf63 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.weekly-best-sellers','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('weekly-best-sellers'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalfdcfc370b54b732c4da69dcb292bcf63)): ?>
<?php $attributes = $__attributesOriginalfdcfc370b54b732c4da69dcb292bcf63; ?>
<?php unset($__attributesOriginalfdcfc370b54b732c4da69dcb292bcf63); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalfdcfc370b54b732c4da69dcb292bcf63)): ?>
<?php $component = $__componentOriginalfdcfc370b54b732c4da69dcb292bcf63; ?>
<?php unset($__componentOriginalfdcfc370b54b732c4da69dcb292bcf63); ?>
<?php endif; ?>
            </div>
            <div class="grid grid-cols-2 gap-6 mt-8">
                <?php if (isset($component)) { $__componentOriginal8f8d0c0b8842794e974e4faa87b2f3d7 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8f8d0c0b8842794e974e4faa87b2f3d7 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.important-notes','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('important-notes'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal8f8d0c0b8842794e974e4faa87b2f3d7)): ?>
<?php $attributes = $__attributesOriginal8f8d0c0b8842794e974e4faa87b2f3d7; ?>
<?php unset($__attributesOriginal8f8d0c0b8842794e974e4faa87b2f3d7); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8f8d0c0b8842794e974e4faa87b2f3d7)): ?>
<?php $component = $__componentOriginal8f8d0c0b8842794e974e4faa87b2f3d7; ?>
<?php unset($__componentOriginal8f8d0c0b8842794e974e4faa87b2f3d7); ?>
<?php endif; ?>
                <?php if (isset($component)) { $__componentOriginald52dc072360af62beb6a51be11522e5b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald52dc072360af62beb6a51be11522e5b = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.recent-activities','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('recent-activities'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginald52dc072360af62beb6a51be11522e5b)): ?>
<?php $attributes = $__attributesOriginald52dc072360af62beb6a51be11522e5b; ?>
<?php unset($__attributesOriginald52dc072360af62beb6a51be11522e5b); ?>
<?php endif; ?>
<?php if (isset($__componentOriginald52dc072360af62beb6a51be11522e5b)): ?>
<?php $component = $__componentOriginald52dc072360af62beb6a51be11522e5b; ?>
<?php unset($__componentOriginald52dc072360af62beb6a51be11522e5b); ?>
<?php endif; ?>
                <?php if (isset($component)) { $__componentOriginal40536465f169e6b81e9487c656af22f2 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal40536465f169e6b81e9487c656af22f2 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.transactions','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('transactions'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal40536465f169e6b81e9487c656af22f2)): ?>
<?php $attributes = $__attributesOriginal40536465f169e6b81e9487c656af22f2; ?>
<?php unset($__attributesOriginal40536465f169e6b81e9487c656af22f2); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal40536465f169e6b81e9487c656af22f2)): ?>
<?php $component = $__componentOriginal40536465f169e6b81e9487c656af22f2; ?>
<?php unset($__componentOriginal40536465f169e6b81e9487c656af22f2); ?>
<?php endif; ?>
            </div>
        </main>
    </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal5863877a5171c196453bfa0bd807e410)): ?>
<?php $attributes = $__attributesOriginal5863877a5171c196453bfa0bd807e410; ?>
<?php unset($__attributesOriginal5863877a5171c196453bfa0bd807e410); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal5863877a5171c196453bfa0bd807e410)): ?>
<?php $component = $__componentOriginal5863877a5171c196453bfa0bd807e410; ?>
<?php unset($__componentOriginal5863877a5171c196453bfa0bd807e410); ?>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\sisogrsu1\resources\views/dashboard.blade.php ENDPATH**/ ?>