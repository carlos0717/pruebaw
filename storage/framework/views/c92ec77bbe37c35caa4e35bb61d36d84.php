<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('layouts.header-nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <main class="flex-1 w-full">
        <!-- Banner principal -->
        <section class="my-8">
            <div class="flex flex-col lg:flex-row items-center gap-8">
                <div class="lg:w-2/3 mb-3 lg:mb-0">
                    <div class="bg-gradient-to-r from-blue-700 to-blue-400 rounded-xl shadow-lg p-8 flex flex-col justify-center h-full">
                        <h1 class="text-3xl md:text-4xl font-serif font-bold text-white mb-2">Bienvenidos a la Oficina General de Responsabillidad Social Universitaria</h1>
                        <p class="text-lg text-blue-100 mb-4 max-w-2xl">La Oficina General de Responsabilidad Social Universitaria (OGRSU) es el organismo de más alto nivel en la UNASAM en el ámbito de Responsabilidad Social. Se define como un órgano de línea de gestión ética y eficaz del impacto generado por la universidad en la sociedad, derivado de sus funciones académica, de investigación y de servicios de extensión. Su principal encargo es planificar, orientar, coordinar y organizar las actividades que se desarrollarán en sus distintas direcciones y en las unidades de RSU de cada facultad.</p>
                        <!-- <a href="#info" class="inline-block bg-white text-blue-800 font-semibold px-6 py-2 rounded shadow hover:bg-blue-50 transition">Conoce más</a> -->
                    </div>
                </div>
                <div class="flex-1 flex justify-center">
                    <img src="/images/escudo_unasam.png" alt="Escudo Universidad" class="h-40 w-auto drop-shadow-xl">
                </div>
            </div>
        </section>

        <!-- Sección Nuestro Propósito - Diseño moderno, formal e institucional -->
        <section class="relative py-14 bg-gradient-to-br from-blue-900 via-blue-700 to-green-700 rounded-2xl shadow-2xl mb-12 overflow-hidden">
            <div class="absolute inset-0 opacity-10 pointer-events-none" style="background: url('/images/pattern.svg') repeat;"></div>
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="text-center mb-10">
                <h2 class="text-3xl md:text-4xl font-serif font-bold text-white mb-3 drop-shadow-lg">Nuestro Propósito</h2>
                <p class="text-lg md:text-xl text-blue-100 font-medium">Compromiso institucional con la responsabilidad social universitaria</p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Clima Laboral -->
                <div class="bg-white/10 hover:bg-white/20 transition rounded-xl p-7 flex flex-col items-center shadow-lg border border-white/10">
                <div class="bg-gradient-to-tr from-green-400 to-blue-400 rounded-full p-3 mb-4 shadow">
                    <!-- Icono: Personas colaborando -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20v-2a4 4 0 00-8 0v2M12 12a4 4 0 100-8 4 4 0 000 8zm6 8v-2a4 4 0 00-3-3.87M6 20v-2a4 4 0 013-3.87" />
                    </svg>
                </div>
                <h3 class="text-lg font-semibold text-white mb-2">Clima Laboral</h3>
                <p class="text-blue-100 text-center text-sm">Promover un ambiente de trabajo colaborativo y saludable para potenciar el desarrollo académico y personal.</p>
                </div>
                <!-- Gobierno Institucional -->
                <div class="bg-white/10 hover:bg-white/20 transition rounded-xl p-7 flex flex-col items-center shadow-lg border border-white/10">
                <div class="bg-gradient-to-tr from-green-400 to-blue-400 rounded-full p-3 mb-4 shadow">
                    <!-- Icono: Mano con engranaje (gestión ética) -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2a2 2 0 012-2h2a2 2 0 012 2v2m-7-6h10m-5-5v5m7 8a2 2 0 01-2 2H7a2 2 0 01-2-2v-5a2 2 0 012-2h10a2 2 0 012 2v5z" />
                    </svg>
                </div>
                <h3 class="text-lg font-semibold text-white mb-2">Gobierno Institucional</h3>
                <p class="text-blue-100 text-center text-sm">Fomentar la ética, la transparencia y la inclusión en la gestión universitaria para un liderazgo responsable.</p>
                </div>
                <!-- Desarrollo Regional -->
                <div class="bg-white/10 hover:bg-white/20 transition rounded-xl p-7 flex flex-col items-center shadow-lg border border-white/10">
                <div class="bg-gradient-to-tr from-green-400 to-blue-400 rounded-full p-3 mb-4 shadow">
                    <!-- Icono: Mapa con marcador (desarrollo regional) -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-2.724A2 2 0 013 15.382V6.618a2 2 0 011.553-1.894l6-1.5a2 2 0 01.894 0l6 1.5A2 2 0 0121 6.618v8.764a2 2 0 01-1.553 1.894L15 20m-6 0V10m6 10V10" />
                    </svg>
                </div>
                <h3 class="text-lg font-semibold text-white mb-2">Desarrollo Regional</h3>
                <p class="text-blue-100 text-center text-sm">Impulsar el desarrollo sostenible de Áncash y fortalecer el rol transformador de la universidad en la sociedad.</p>
                </div>
                <!-- Campus Sostenible -->
                <div class="bg-white/10 hover:bg-white/20 transition rounded-xl p-7 flex flex-col items-center shadow-lg border border-white/10">
                <div class="bg-gradient-to-tr from-green-400 to-blue-400 rounded-full p-3 mb-4 shadow">
                    <!-- Icono: Hoja y edificio (sostenibilidad) -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 22c4.418 0 8-4.03 8-9 0-4.97-3.582-9-8-9S4 8.03 4 13c0 4.97 3.582 9 8 9zm0 0V13" />
                    </svg>
                </div>
                <h3 class="text-lg font-semibold text-white mb-2">Campus Sostenible</h3>
                <p class="text-blue-100 text-center text-sm">Desarrollar un entorno universitario responsable con el medio ambiente y la sociedad en todas sus dimensiones.</p>
                </div>
                <!-- Investigación Comunitaria -->
                <div class="bg-white/10 hover:bg-white/20 transition rounded-xl p-7 flex flex-col items-center shadow-lg border border-white/10">
                <div class="bg-gradient-to-tr from-green-400 to-blue-400 rounded-full p-3 mb-4 shadow">
                    <!-- Icono: Lupa sobre personas (investigación participativa) -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A7.972 7.972 0 0017 9a8 8 0 10-8 8 7.972 7.972 0 006.595-3.405L20 22" />
                    </svg>
                </div>
                <h3 class="text-lg font-semibold text-white mb-2">Investigación Comunitaria</h3>
                <p class="text-blue-100 text-center text-sm">Impulsar la investigación participativa que involucre a la comunidad en la generación de soluciones innovadoras.</p>
                </div>
                <!-- Difusión del Conocimiento -->
                <div class="bg-white/10 hover:bg-white/20 transition rounded-xl p-7 flex flex-col items-center shadow-lg border border-white/10">
                <div class="bg-gradient-to-tr from-green-400 to-blue-400 rounded-full p-3 mb-4 shadow">
                    <!-- Icono: Libro abierto (difusión de conocimiento) -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 20l9-5-9-5-9 5 9 5zm0 0V10" />
                    </svg>
                </div>
                <h3 class="text-lg font-semibold text-white mb-2">Difusión del Conocimiento</h3>
                <p class="text-blue-100 text-center text-sm">Garantizar la producción y divulgación pública del conocimiento generado en la universidad.</p>
                </div>
            </div>
            </div>
        </section>

        <!-- Sección Principios y Valores - Diseño elegante y formal -->
        <section class="relative py-14 bg-gradient-to-br from-blue-900 via-blue-700 to-green-700 rounded-2xl shadow-2xl mb-12 overflow-hidden">
            <div class="absolute inset-0 opacity-10 pointer-events-none" style="background: url('/images/pattern.svg') repeat;"></div>
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="text-center mb-10">
                <h2 class="text-3xl md:text-4xl font-serif font-bold text-white mb-3 drop-shadow-lg">Principios y Valores</h2>
                <p class="text-lg md:text-xl text-blue-100 font-medium">Fundamentos éticos que guían la gestión universitaria de la OGRSU</p>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                <!-- Dignidad -->
                <div class="bg-white/10 hover:bg-white/20 transition rounded-xl p-7 flex flex-col items-center shadow-lg border border-white/10">
                <div class="bg-gradient-to-tr from-green-400 to-blue-400 rounded-full p-3 mb-4 shadow">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                    </svg>
                </div>
                <h3 class="text-lg font-semibold text-white mb-2">Dignidad</h3>
                <p class="text-blue-100 text-center text-sm">Construcción de personas autónomas con razón y conciencia.</p>
                </div>
                <!-- Libertad -->
                <div class="bg-white/10 hover:bg-white/20 transition rounded-xl p-7 flex flex-col items-center shadow-lg border border-white/10">
                <div class="bg-gradient-to-tr from-green-400 to-blue-400 rounded-full p-3 mb-4 shadow">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/>
                    </svg>
                </div>
                <h3 class="text-lg font-semibold text-white mb-2">Libertad</h3>
                <p class="text-blue-100 text-center text-sm">Respeto de derechos y libertades de la comunidad universitaria.</p>
                </div>
                <!-- Democracia -->
                <div class="bg-white/10 hover:bg-white/20 transition rounded-xl p-7 flex flex-col items-center shadow-lg border border-white/10">
                <div class="bg-gradient-to-tr from-green-400 to-blue-400 rounded-full p-3 mb-4 shadow">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                    </svg>
                </div>
                <h3 class="text-lg font-semibold text-white mb-2">Democracia</h3>
                <p class="text-blue-100 text-center text-sm">Participación libre y responsable en la toma de decisiones.</p>
                </div>
                <!-- Solidaridad -->
                <div class="bg-white/10 hover:bg-white/20 transition rounded-xl p-7 flex flex-col items-center shadow-lg border border-white/10">
                <div class="bg-gradient-to-tr from-green-400 to-blue-400 rounded-full p-3 mb-4 shadow">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                    </svg>
                </div>
                <h3 class="text-lg font-semibold text-white mb-2">Solidaridad</h3>
                <p class="text-blue-100 text-center text-sm">Fortalecimiento de la identidad y reconocimiento colectivo.</p>
                </div>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8 mt-8">
                <!-- Equidad -->
                <div class="bg-white/10 hover:bg-white/20 transition rounded-xl p-7 flex flex-col items-center shadow-lg border border-white/10">
                <div class="bg-gradient-to-tr from-green-400 to-blue-400 rounded-full p-3 mb-4 shadow">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
                <h3 class="text-lg font-semibold text-white mb-2">Equidad</h3>
                <p class="text-blue-100 text-center text-sm">Igualdad de oportunidades para el desarrollo integral.</p>
                </div>
                <!-- Sostenibilidad -->
                <div class="bg-white/10 hover:bg-white/20 transition rounded-xl p-7 flex flex-col items-center shadow-lg border border-white/10">
                <div class="bg-gradient-to-tr from-green-400 to-blue-400 rounded-full p-3 mb-4 shadow">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/>
                    </svg>
                </div>
                <h3 class="text-lg font-semibold text-white mb-2">Sostenibilidad</h3>
                <p class="text-blue-100 text-center text-sm">Desarrollo permanente del capital humano e institucional.</p>
                </div>
                <!-- Transparencia -->
                <div class="bg-white/10 hover:bg-white/20 transition rounded-xl p-7 flex flex-col items-center shadow-lg border border-white/10">
                <div class="bg-gradient-to-tr from-green-400 to-blue-400 rounded-full p-3 mb-4 shadow">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                    </svg>
                </div>
                <h3 class="text-lg font-semibold text-white mb-2">Transparencia</h3>
                <p class="text-blue-100 text-center text-sm">Ejercicio abierto y verificable de las funciones universitarias.</p>
                </div>
                <!-- Ética -->
                <div class="bg-white/10 hover:bg-white/20 transition rounded-xl p-7 flex flex-col items-center shadow-lg border border-white/10">
                <div class="bg-gradient-to-tr from-green-400 to-blue-400 rounded-full p-3 mb-4 shadow">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                    </svg>
                </div>
                <h3 class="text-lg font-semibold text-white mb-2">Ética</h3>
                <p class="text-blue-100 text-center text-sm">Alineamiento con valores morales y costumbres sociales.</p>
                </div>
            </div>
            </div>
        </section>

        <!-- Últimas Noticias (Swiper) -->
        <section class="bg-gray-50 py-8 border-t border-b">
            <div class="px-0">
                <h2 class="font-serif text-2xl font-bold mb-6 text-blue-900">Últimas Noticias</h2>
                <div class="swiper noticias-swiper">
                    <div class="swiper-wrapper">
                        <?php $__empty_1 = true; $__currentLoopData = $noticias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $noticia): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <div class="swiper-slide h-full">
                            <div class="bg-white rounded-lg shadow-md flex flex-col overflow-hidden h-full">
                                <img src="<?php echo e($noticia->imagen_path ? asset('storage/' . $noticia->imagen_path) : '/images/escudo_unasam.png'); ?>" alt="<?php echo e($noticia->titulo); ?>" class="h-40 w-full object-cover bg-gray-100">
                                <div class="p-4 flex-1 flex flex-col">
                                    <h3 class="font-bold text-blue-800 text-lg mb-2 line-clamp-2">
                                        <a href="<?php echo e(route('noticias.show', $noticia->id)); ?>" class="hover:underline hover:text-blue-600 transition-colors duration-150">
                                            <?php echo e($noticia->titulo); ?>

                                        </a>
                                    </h3>
                                    <span class="text-xs text-gray-500 mb-2"><?php echo e($noticia->area_origen); ?> | <?php echo e(\Carbon\Carbon::parse($noticia->fecha_publicacion)->format('d/m/Y H:i')); ?></span>
                                    <!-- <p class="text-gray-700 text-sm line-clamp-3 mb-4"><?php echo e($noticia->descripcion); ?></p> -->
                                    <a href="<?php echo e(route('noticias.show', $noticia->id)); ?>" class="mt-auto text-blue-700 hover:underline font-medium text-sm">Leer más</a>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <div class="swiper-slide">
                            <div class="bg-white rounded-lg shadow-md flex flex-col items-center justify-center h-48 text-gray-500">No hay noticias registradas.</div>
                        </div>
                        <?php endif; ?>
                    </div>
                    <div class="swiper-pagination"></div>
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-button-next"></div>
                </div>
            </div>
        </section>        

        <!-- Nuestras Plataformas Web -->
        <section class="py-8">
            <h2 class="font-serif text-2xl font-bold mb-6 text-blue-900">Nuestras Plataformas Web</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="bg-white rounded-lg shadow p-5 text-center flex flex-col items-center">
                    <img src="/img/plataforma1.png" alt="Sistema Académico" class="mb-3 h-12 w-auto">
                    <h5 class="font-bold text-blue-800 mb-1">Sistema Académico</h5>
                    <a href="#" class="text-blue-700 hover:underline text-sm font-medium">Ingresar</a>
                </div>
                <div class="bg-white rounded-lg shadow p-5 text-center flex flex-col items-center">
                    <img src="/img/plataforma2.png" alt="Biblioteca Virtual" class="mb-3 h-12 w-auto">
                    <h5 class="font-bold text-blue-800 mb-1">Biblioteca Virtual</h5>
                    <a href="#" class="text-blue-700 hover:underline text-sm font-medium">Ingresar</a>
                </div>
                <div class="bg-white rounded-lg shadow p-5 text-center flex flex-col items-center">
                    <img src="/img/plataforma3.png" alt="Aula Virtual" class="mb-3 h-12 w-auto">
                    <h5 class="font-bold text-blue-800 mb-1">Aula Virtual</h5>
                    <a href="#" class="text-blue-700 hover:underline text-sm font-medium">Ingresar</a>
                </div>
            </div>
        </section>
       
    </main>
    <?php echo $__env->make('layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    
    <?php $__env->startPush('styles'); ?>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
    <?php $__env->stopPush(); ?>
    <?php $__env->startPush('scripts'); ?>
        <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                new Swiper('.noticias-swiper', {
                    slidesPerView: 1,
                    spaceBetween: 24,
                    loop: true,
                    pagination: {
                        el: '.swiper-pagination',
                        clickable: true,
                    },
                    navigation: {
                        nextEl: '.swiper-button-next',
                        prevEl: '.swiper-button-prev',
                    },
                    breakpoints: {
                        768: { slidesPerView: 2 },
                        1024: { slidesPerView: 3 },
                        1280: { slidesPerView: 4 }
                    }
                });
            });
        </script>
    <?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\sisogrsu1\resources\views/home.blade.php ENDPATH**/ ?>