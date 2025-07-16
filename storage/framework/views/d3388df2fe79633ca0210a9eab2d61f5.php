
<?php
    $user = auth()->user();
    $role = $user?->role?->nombre ?? null;
?>
<aside class="w-64 bg-blue-900 text-white flex flex-col min-h-screen rounded-r-3xl shadow-xl">
    <div class="p-6 text-2xl font-bold border-b border-blue-800 rounded-tr-3xl">
        <span class="tracking-wide">CONTROL OGRSU</span>
    </div>
    <nav class="flex-1 px-4 py-6">
        <?php if($role === 'Administrador' || $role === 'Encargado de RSU' || $role === 'Encargado de SCE' || $role === 'Encargado de PS' || $role === 'Encargado de EU'): ?>
        <div class="mb-4">
            <span class="text-xs font-semibold text-blue-200 uppercase pl-2">Panel Principal</span>
            <ul class="mt-2 space-y-1">
            <li>
                <a href="<?php echo e(route('dashboard')); ?>" class="flex items-center px-4 py-2 rounded-lg transition hover:bg-blue-800 <?php echo e(request()->routeIs('dashboard') ? 'bg-blue-800 ring-2 ring-blue-400' : ''); ?>">
                <span class="material-icons mr-2">home</span> Inicio
                </a>
            </li>
            </ul>
        </div>
        <?php endif; ?>
        <?php if($role === 'Administrador'): ?>
        <div class="mb-4">
            <span class="text-xs font-semibold text-blue-200 uppercase pl-2">Gestión de Usuarios</span>
            <ul class="mt-2 space-y-1">
            <li>
                <a href="<?php echo e(route('users.index')); ?>" class="flex items-center px-4 py-2 rounded-lg transition hover:bg-blue-800 <?php echo e(request()->routeIs('users.index') ? 'bg-blue-800 ring-2 ring-blue-400' : ''); ?>">
                <span class="material-icons mr-2">people</span> Usuarios
                </a>
            </li>
            <li>
                <a href="<?php echo e(route('roles.index')); ?>" class="flex items-center px-4 py-2 rounded-lg transition hover:bg-blue-800 <?php echo e(request()->routeIs('roles.index') ? 'bg-blue-800 ring-2 ring-blue-400' : ''); ?>">
                <span class="material-icons mr-2">badge</span> Cargos
                </a>
            </li>
            </ul>
        </div>
        <?php endif; ?>

        <?php if(in_array($role, ['Administrador', 'Encargado de RSU'])): ?>
        <div class="mb-4">
            <span class="text-xs font-semibold text-blue-200 uppercase pl-2">Gestión Responsabilidad Social</span>
            <ul class="mt-2 space-y-1">
                <li>
                    <a href="<?php echo e(route('facultades')); ?>" class="flex items-center px-4 py-2 rounded-lg transition hover:bg-blue-800 <?php echo e(request()->routeIs('facultades') ? 'bg-blue-800 ring-2 ring-blue-400' : ''); ?>">
                        <span class="material-icons mr-2">apartment</span> Facultades
                    </a>
                </li>
                <li>
                    <a href="<?php echo e(route('objetivos-desarrollo-sostenible')); ?>" class="flex items-center px-4 py-2 rounded-lg transition hover:bg-blue-800 <?php echo e(request()->routeIs('objetivos-desarrollo-sostenible') ? 'bg-blue-800 ring-2 ring-blue-400' : ''); ?>">
                        <span class="material-icons mr-2">eco</span> Objetivos de Desarrollo Sostenible
                    </a>
                </li>
                <li>
                    <a href="<?php echo e(route('estudiantes')); ?>" class="flex items-center px-4 py-2 rounded-lg transition hover:bg-blue-800 <?php echo e(request()->routeIs('estudiantes') ? 'bg-blue-800 ring-2 ring-blue-400' : ''); ?>">
                        <span class="material-icons mr-2">school</span> Estudiantes
                    </a>
                </li>
                <li>
                    <a href="<?php echo e(route('docentes')); ?>" class="flex items-center px-4 py-2 rounded-lg transition hover:bg-blue-800 <?php echo e(request()->routeIs('docentes') ? 'bg-blue-800 ring-2 ring-blue-400' : ''); ?>">
                        <span class="material-icons mr-2">person</span> Docentes
                    </a>
                </li>
                <li>
                    <a href="<?php echo e(route('proyectos')); ?>" class="flex items-center px-4 py-2 rounded-lg transition hover:bg-blue-800 <?php echo e(request()->routeIs('proyectos') ? 'bg-blue-800 ring-2 ring-blue-400' : ''); ?>">
                        <span class="material-icons mr-2">assignment</span> Proyectos
                    </a>
                </li>
                <li>
                    <a href="<?php echo e(route('noticias')); ?>" class="flex items-center px-4 py-2 rounded-lg transition hover:bg-blue-800 <?php echo e(request()->routeIs('noticias') ? 'bg-blue-800 ring-2 ring-blue-400' : ''); ?>">
                        <span class="material-icons mr-2">article</span> Noticias
                    </a>
                </li>
                <li>
                    <a href="<?php echo e(route('documentos')); ?>" class="flex items-center px-4 py-2 rounded-lg transition hover:bg-blue-800 <?php echo e(request()->routeIs('documentos') ? 'bg-blue-800 ring-2 ring-blue-400' : ''); ?>">
                        <span class="material-icons mr-2">description</span> Documentos
                    </a>
                </li>
            </ul>
        </div>
        <?php endif; ?>

        <?php if(in_array($role, ['Administrador', 'Encargado de SCE'])): ?>
        <div class="mb-4">
            <span class="text-xs font-semibold text-blue-200 uppercase pl-2">Seguimiento y Certificación al Egresado</span>
            <ul class="mt-2 space-y-1">
            <li>
                <a href="<?php echo e(route('noticias.egresado')); ?>" class="flex items-center px-4 py-2 rounded-lg transition hover:bg-blue-800 <?php echo e(request()->routeIs('noticias.egresado') ? 'bg-blue-800 ring-2 ring-blue-400' : ''); ?>">
                <span class="material-icons mr-2">article</span> Noticias
                </a>
            </li>
            <li>
                <a href="<?php echo e(route('documentos.egresado')); ?>" class="flex items-center px-4 py-2 rounded-lg transition hover:bg-blue-800 <?php echo e(request()->routeIs('documentos.egresado') ? 'bg-blue-800 ring-2 ring-blue-400' : ''); ?>">
                <span class="material-icons mr-2">description</span> Documentos
                </a>
            </li>
            </ul>
        </div>
        <?php endif; ?>

        <?php if(in_array($role, ['Administrador', 'Encargado de PS'])): ?>
        <div class="mb-4">
            <span class="text-xs font-semibold text-blue-200 uppercase pl-2">Gestión Proyección Social</span>
            <ul class="mt-2 space-y-1">
                <li>
                    <a href="<?php echo e(route('estados.gestion')); ?>" class="flex items-center px-4 py-2 rounded-lg transition hover:bg-blue-800 <?php echo e(request()->routeIs('estados.gestion') ? 'bg-blue-800 ring-2 ring-blue-400' : ''); ?>">
                        <span class="material-icons mr-2">flag</span> Estados
                    </a>
                </li>
                <li>
                    <a href="<?php echo e(route('institucion-tipos.gestion')); ?>" class="flex items-center px-4 py-2 rounded-lg transition hover:bg-blue-800 <?php echo e(request()->routeIs('institucion-tipos.gestion') ? 'bg-blue-800 ring-2 ring-blue-400' : ''); ?>">
                        <span class="material-icons mr-2">category</span> Tipos de Institución
                    </a>
                </li>
                <li>
                    <a href="<?php echo e(route('instituciones.gestion')); ?>" class="flex items-center px-4 py-2 rounded-lg transition hover:bg-blue-800 <?php echo e(request()->routeIs('instituciones.gestion') ? 'bg-blue-800 ring-2 ring-blue-400' : ''); ?>">
                        <span class="material-icons mr-2">business</span> Instituciones
                    </a>
                </li>
                <li>
                    <a href="<?php echo e(route('convenios.gestion')); ?>" class="flex items-center px-4 py-2 rounded-lg transition hover:bg-blue-800 <?php echo e(request()->routeIs('convenios.gestion') ? 'bg-blue-800 ring-2 ring-blue-400' : ''); ?>">
                        <span class="material-icons mr-2">handshake</span> Convenios
                    </a>
                </li>
                <li>
                    <a href="<?php echo e(route('noticias.gestion')); ?>" class="flex items-center px-4 py-2 rounded-lg transition hover:bg-blue-800 <?php echo e(request()->routeIs('noticias.gestion') ? 'bg-blue-800 ring-2 ring-blue-400' : ''); ?>">
                        <span class="material-icons mr-2">article</span> Noticias
                    </a>
                </li>
                <li>
                    <a href="<?php echo e(route('documentos.gestion')); ?>" class="flex items-center px-4 py-2 rounded-lg transition hover:bg-blue-800 <?php echo e(request()->routeIs('documentos.gestion') ? 'bg-blue-800 ring-2 ring-blue-400' : ''); ?>">
                        <span class="material-icons mr-2">description</span> Documentos
                    </a>
                </li>
            </ul>
        </div>
        <?php endif; ?>

        <?php if(in_array($role, ['Administrador', 'Encargado de EU'])): ?>
        <div class="mb-4">
            <span class="text-xs font-semibold text-blue-200 uppercase pl-2">Extensión Universitaria</span>
            <ul class="mt-2 space-y-1">
            <li>
                <a href="<?php echo e(route('noticias.extension')); ?>" class="flex items-center px-4 py-2 rounded-lg transition hover:bg-blue-800 <?php echo e(request()->routeIs('noticias.extension') ? 'bg-blue-800 ring-2 ring-blue-400' : ''); ?>">
                <span class="material-icons mr-2">article</span> Noticias
                </a>
            </li>
            <li>
                <a href="<?php echo e(route('documentos.extension')); ?>" class="flex items-center px-4 py-2 rounded-lg transition hover:bg-blue-800 <?php echo e(request()->routeIs('documentos.extension') ? 'bg-blue-800 ring-2 ring-blue-400' : ''); ?>">
                <span class="material-icons mr-2">description</span> Documentos
                </a>
            </li>
            </ul>
        </div>
        <?php endif; ?>
    </nav>
</aside>
<?php /**PATH C:\xampp\htdocs\sisogrsu1\resources\views/components/sidebar-menu.blade.php ENDPATH**/ ?>