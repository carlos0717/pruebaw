<!-- Header superior institucional + Menú de navegación principal -->
<div class="bg-white border-b border-gray-200 py-3">
    <div class="container mx-auto flex flex-col md:flex-row justify-between items-center px-4 gap-2">
        <div class="flex items-center gap-4">
            <img src="/images/unasam_acredi.png" alt="Logo Universidad" class="h-16 w-auto">
            
        </div>
        <div class="flex items-center gap-4 mt-2 md:mt-0">
            <a href="#" class="text-blue-800 font-semibold hover:underline transition">Intranet</a>
            <a href="#" class="text-blue-800 font-semibold hover:underline transition">Correo</a>
            <a href="#" class="text-blue-800 font-semibold hover:underline transition">Plataformas</a>
            <?php if(auth()->guard()->guest()): ?>
                <a href="<?php echo e(route('login')); ?>" class="text-blue-800 font-semibold hover:underline transition">Iniciar Sesión</a>
            <?php else: ?>
                <a href="<?php echo e(route('dashboard')); ?>" class="text-blue-800 font-semibold hover:underline transition">Ir a Dashboard</a>
            <?php endif; ?>
            <a href="#" class="text-blue-800 hover:text-blue-600" aria-label="Buscar">
                <svg xmlns="http://www.w3.org/2000/svg" class="inline h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-4.35-4.35M17 11a6 6 0 11-12 0 6 6 0 0112 0z" /></svg>
            </a>
        </div>
    </div>
</div>
<nav class="bg-blue-900 sticky top-0 shadow z-20" x-data="{ open: false }">
    <div class="max-w-screen-xl mx-auto px-4">
        <div class="flex justify-between items-center py-2">
            <div class="flex-1 flex justify-center lg:justify-start">
                <button @click="open = !open" class="lg:hidden text-white focus:outline-none" type="button" aria-label="Menú">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
                </button>
            </div>
        </div>
        <ul :class="{'block': open, 'hidden': !open}" class="lg:flex flex-col lg:flex-row lg:space-x-8 font-medium text-center w-full lg:w-auto bg-blue-900 lg:bg-transparent py-2 lg:py-0 rounded-b-lg lg:rounded-none shadow-lg lg:shadow-none z-40">
            <!-- Inicio -->
            <li>
                <a class="block py-2 px-4 text-white hover:bg-blue-800 rounded transition" href="/">Inicio</a>
            </li>
            <!-- RESPONSABILIDAD SOCIAL -->
            <li class="relative" x-data="{ submenu: false }" @mouseenter="submenu = true" @mouseleave="submenu = false" @focusin="submenu = true" @focusout="submenu = false">
                <a href="<?php echo e(route('responsabilidad.social')); ?>" class="block py-2 px-4 text-white hover:bg-blue-800 rounded transition cursor-pointer">
                    Responsabilidad Social
                </a>
                <ul x-show="submenu" x-transition class="absolute left-1/2 -translate-x-1/2 mt-2 w-56 bg-white rounded shadow-xl z-30" @mouseenter="submenu = true" @mouseleave="submenu = false">
                    <li><a class="block px-4 py-2 text-gray-700 hover:bg-blue-700 hover:text-white transition" href="#rsu-proyectos">Área de Proyectos de RSU</a></li>
                    <li><a class="block px-4 py-2 text-gray-700 hover:bg-blue-700 hover:text-white transition" href="#rsu-programas">Área de Programas</a></li>
                </ul>
            </li>
            <!-- SEGUIMIENTO Y CERTIFICACION AL EGRESADO -->
            <li class="relative" x-data="{ submenu: false }" @mouseenter="submenu = true" @mouseleave="submenu = false" @focusin="submenu = true" @focusout="submenu = false">
                <a href="<?php echo e(route('seguimiento.egresado')); ?>" class="block py-2 px-4 text-white hover:bg-blue-800 rounded transition cursor-pointer">
                    Seguimiento y Certificación al Egresado
                </a>
                <ul x-show="submenu" x-transition class="absolute left-1/2 -translate-x-1/2 mt-2 w-64 bg-white rounded shadow-xl z-30" @mouseenter="submenu = true" @mouseleave="submenu = false">
                    <li><a class="block px-4 py-2 text-gray-700 hover:bg-blue-700 hover:text-white transition" href="#bolsa-trabajo">Área de Bolsa de Trabajo</a></li>
                    <li><a class="block px-4 py-2 text-gray-700 hover:bg-blue-700 hover:text-white transition" href="#organizacion-egresados">Área de Organización de Egresados</a></li>
                </ul>
            </li>
            <!-- PROYECCION SOCIAL -->
            <li class="relative" x-data="{ submenu: false }" @mouseenter="submenu = true" @mouseleave="submenu = false" @focusin="submenu = true" @focusout="submenu = false">
                <a href="<?php echo e(route('proyeccion.social')); ?>" class="block py-2 px-4 text-white hover:bg-blue-800 rounded transition cursor-pointer">
                    Proyección Social
                </a>
                <ul x-show="submenu" x-transition class="absolute left-1/2 -translate-x-1/2 mt-2 w-56 bg-white rounded shadow-xl z-30" @mouseenter="submenu = true" @mouseleave="submenu = false">
                    <li><a class="block px-4 py-2 text-gray-700 hover:bg-blue-700 hover:text-white transition" href="#psu-proyectos">Área de Proyectos PSU</a></li>
                    <li><a class="block px-4 py-2 text-gray-700 hover:bg-blue-700 hover:text-white transition" href="#psu-convenios">Área de Convenios</a></li>
                </ul>
            </li>
            <!-- EXTENSIÓN UNIVERSITARIA -->
            <li class="relative" x-data="{ submenu: false }" @mouseenter="submenu = true" @mouseleave="submenu = false" @focusin="submenu = true" @focusout="submenu = false">
                <a href="<?php echo e(route('extension.universitaria')); ?>" class="block py-2 px-4 text-white hover:bg-blue-800 rounded transition cursor-pointer">
                    Extensión Universitaria
                </a>
                <ul x-show="submenu" x-transition class="absolute left-1/2 -translate-x-1/2 mt-2 w-72 bg-white rounded shadow-xl z-30" @mouseenter="submenu = true" @mouseleave="submenu = false">
                    <li><a class="block px-4 py-2 text-gray-700 hover:bg-blue-700 hover:text-white transition" href="#eu-academica">Área Académica</a></li>
                    <li class="relative" x-data="{ subsubmenu: false }" @mouseenter="subsubmenu = true" @mouseleave="subsubmenu = false" @focusin="subsubmenu = true" @focusout="subsubmenu = false">
                        <a @click.prevent="subsubmenu = !subsubmenu" class="block px-4 py-2 text-gray-700 hover:bg-blue-700 hover:text-white cursor-pointer transition">Área de Cultura Artística &raquo;</a>
                        <ul x-show="subsubmenu" x-transition class="absolute left-full top-0 mt-0 ml-1 w-52 bg-white rounded shadow-xl z-40" @mouseenter="subsubmenu = true" @mouseleave="subsubmenu = false">
                            <li><a class="block px-4 py-2 text-gray-700 hover:bg-blue-700 hover:text-white transition" href="#musam">MUSAM</a></li>
                            <li><a class="block px-4 py-2 text-gray-700 hover:bg-blue-700 hover:text-white transition" href="#sama">SAMA</a></li>
                            <li><a class="block px-4 py-2 text-gray-700 hover:bg-blue-700 hover:text-white transition" href="#tusam">TUSAM</a></li>
                            <li><a class="block px-4 py-2 text-gray-700 hover:bg-blue-700 hover:text-white transition" href="#cusam">CUSAM</a></li>
                            <li><a class="block px-4 py-2 text-gray-700 hover:bg-blue-700 hover:text-white transition" href="#tuna">TUNA</a></li>
                            <li><a class="block px-4 py-2 text-gray-700 hover:bg-blue-700 hover:text-white transition" href="#estudiantina">Estudiantina</a></li>
                        </ul>
                    </li>
                </ul>
            </li>
            <!-- CONVENIOS Y CONVOCATORIAS -->
            <!-- <li class="relative" x-data="{ submenu: false }" @mouseenter="submenu = true" @mouseleave="submenu = false" @focusin="submenu = true" @focusout="submenu = false">
                <a href="#" @click.prevent="submenu = !submenu" class="block py-2 px-4 text-white hover:bg-blue-800 rounded transition cursor-pointer">
                    Convenios y Convocatorias
                </a>
                <ul x-show="submenu" x-transition class="absolute left-1/2 -translate-x-1/2 mt-2 w-56 bg-white rounded shadow-xl z-30" @mouseenter="submenu = true" @mouseleave="submenu = false">
                    <li><a class="block px-4 py-2 text-gray-700 hover:bg-blue-700 hover:text-white transition" href="#convenio-1">Convenio 1</a></li>
                    <li><a class="block px-4 py-2 text-gray-700 hover:bg-blue-700 hover:text-white transition" href="#convocatoria-1">Convocatoria 1</a></li>
                </ul>
            </li> -->
        </ul>
    </div>
</nav>
<!-- Alpine.js para interactividad -->
<script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
<?php /**PATH C:\xampp\htdocs\sisogrsu1\resources\views/layouts/header-nav.blade.php ENDPATH**/ ?>