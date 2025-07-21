<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('layouts.header-nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <main class="flex-1 w-full">
        <section class="my-8">
            <div class="flex flex-col lg:flex-row items-center gap-8">
                <div class="lg:w-2/3 mb-3 lg:mb-0">
                    <div class="bg-gradient-to-r from-blue-700 to-blue-400 rounded-xl shadow-lg p-8 flex flex-col justify-center h-full">
                        <h1 class="text-3xl md:text-4xl font-serif font-bold text-white mb-2">Seguimiento y Certificación al Egresado</h1>
                        <p class="text-lg text-blue-100 mb-4 max-w-2xl">Esta área se instituye para fomentar y facilitar oportunidades y relaciones sociales y laborales que apoyen el desarrollo de la vida profesional del egresado de la UNASAM. Su función es mantener una vinculación permanente con ellos.</p>
                    </div>
                </div>
                <div class="flex-1 flex justify-center">
                    <img src="/images/escudo_unasam.png" alt="Escudo Universidad" class="h-40 w-auto drop-shadow-xl">
                </div>
            </div>
        </section>

        <section class="mb-12">
            <!-- Objetivo Principal -->
            <div class="bg-white rounded-xl shadow-lg p-8 mb-8">
                <h2 class="text-3xl font-serif font-semibold text-blue-900 mb-6">Objetivo Principal</h2>
                <p class="text-lg text-gray-600 leading-relaxed">
                    Servir de enlace entre instituciones públicas, privadas y egresados de la UNASAM para facilitar 
                    su inserción laboral, manteniendo una vinculación permanente que impulse su desarrollo profesional.
                </p>
            </div>

            <!-- Funciones Principales -->
            <div class="bg-white rounded-xl shadow-lg p-8 mb-8">
                <h2 class="text-3xl font-serif font-semibold text-blue-900 mb-6">Funciones Principales</h2>
                <div class="grid md:grid-cols-2 gap-6">
                    <div class="flex gap-4">
                        <div class="bg-blue-100 p-3 rounded-lg shrink-0">
                            <svg class="w-6 h-6 text-blue-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 7v10c0 2.21 3.582 4 8 4s8-1.79 8-4V7M4 7c0 2.21 3.582 4 8 4s8-1.79 8-4M4 7c0-2.21 3.582-4 8-4s8 1.79 8 4m0 5c0 2.21-3.582 4-8 4s-8-1.79-8-4"/>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-xl font-semibold text-blue-900 mb-2">Base de Datos Actualizada</h3>
                            <p class="text-gray-600">Mantenemos un registro permanente del perfil y necesidades de nuestros egresados.</p>
                        </div>
                    </div>

                    <div class="flex gap-4">
                        <div class="bg-blue-100 p-3 rounded-lg shrink-0">
                            <svg class="w-6 h-6 text-blue-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-xl font-semibold text-blue-900 mb-2">Monitoreo Laboral</h3>
                            <p class="text-gray-600">Seguimiento continuo de la inserción laboral y medición de empleabilidad.</p>
                        </div>
                    </div>

                    <div class="flex gap-4">
                        <div class="bg-blue-100 p-3 rounded-lg shrink-0">
                            <svg class="w-6 h-6 text-blue-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-xl font-semibold text-blue-900 mb-2">Gestión de Bolsa de Trabajo</h3>
                            <p class="text-gray-600">Coordinación de ofertas laborales según perfiles académicos y experiencia.</p>
                        </div>
                    </div>

                    <div class="flex gap-4">
                        <div class="bg-blue-100 p-3 rounded-lg shrink-0">
                            <svg class="w-6 h-6 text-blue-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-xl font-semibold text-blue-900 mb-2">Alianzas Estratégicas</h3>
                            <p class="text-gray-600">Colaboración con instituciones para mejorar nuestra plataforma virtual.</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Servicio Destacado -->
            <div class="bg-blue-50 rounded-xl shadow-lg p-8">
                <h2 class="text-3xl font-serif font-semibold text-blue-900 mb-6">Bolsa de Trabajo UNASAM</h2>
                
                <div class="space-y-6">
                    <div>
                        <h3 class="text-xl font-semibold text-blue-900 mb-3">¿Qué es?</h3>
                        <p class="text-gray-600">Plataforma de vinculación laboral que conecta egresados con oportunidades profesionales acordes a su formación académica.</p>
                    </div>

                    <div>
                        <h3 class="text-xl font-semibold text-blue-900 mb-3">Funcionamiento</h3>
                        <ul class="list-disc pl-6 space-y-2 text-gray-600">
                            <li>Recepción y clasificación de ofertas laborales</li>
                            <li>Emparejamiento inteligente por perfiles académicos</li>
                            <li>Notificaciones personalizadas a egresados</li>
                            <li>Sistema de postulación cronológica</li>
                        </ul>
                    </div>

                    <div class="bg-white p-4 rounded-lg">
                        <h3 class="text-xl font-semibold text-blue-900 mb-3">Vigencia</h3>
                        <p class="text-gray-600">
                            Registro activo por 
                            <span class="bg-blue-100 text-blue-800 text-sm font-medium px-2.5 py-0.5 rounded">5 años</span>
                            desde la fecha de egreso
                        </p>
                    </div>
                </div>
            </div>
        </section>
        <!-- Últimas Noticias -->
        <section class="bg-gray-50 py-8 border-t border-b">
            <div class="px-0">
                <h2 class="font-serif text-2xl font-bold mb-6 text-blue-900">Últimas Noticias</h2>
                <div class="swiper noticias-swiper">
                    <div class="swiper-wrapper">
                        <?php $__currentLoopData = $noticias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $noticia): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="swiper-slide h-full">
                                <div class="bg-white rounded-lg shadow-md flex flex-col overflow-hidden h-full">
                                    <img src="<?php echo e(asset('storage/' . $noticia->imagen_path)); ?>" alt="Miniatura"
                                        class="w-full h-32 object-cover rounded-t-lg border-b border-blue-100 shadow-sm bg-gray-100" style="aspect-ratio: 16/9;">
                                    <div class="p-4 flex-1 flex flex-col">
                                        <h3 class="font-semibold text-blue-800 text-lg mb-1">
                                            <a href="<?php echo e(route('noticias.show', ['id' => $noticia->id])); ?>" class="hover:underline hover:text-blue-600 transition-colors duration-150">
                                                <?php echo e($noticia->titulo); ?>

                                            </a>
                                        </h3>
                                        <div class="text-xs text-gray-500 mt-2"><?php echo e($noticia->area_origen); ?> | <?php echo e(\Carbon\Carbon::parse($noticia->fecha_publicacion)->format('d/m/Y H:i')); ?></div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                    <div class="swiper-pagination"></div>
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-button-next"></div>
                </div>
            </div>
        </section>
        
        <h2 class="font-serif text-2xl font-bold mb-6 text-blue-900">Documentos Normativos</h2>
        <div class="swiper documentos-swiper">
            <div class="swiper-wrapper">
                <?php $__empty_1 = true; $__currentLoopData = $documentosNormativos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $doc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <div class="swiper-slide">
                        <div class="bg-white rounded-lg shadow p-4 flex flex-col items-center">
                            <img src="https://cdn.jsdelivr.net/gh/edent/SuperTinyIcons/images/svg/pdf.svg" alt="PDF" class="w-16 h-16 mb-2">
                            <div class="font-semibold text-center"><?php echo e($doc->titulo); ?></div>
                            <div class="flex gap-2 mt-3">
                                <a href="<?php echo e(asset('storage/' . $doc->path_archivo)); ?>" target="_blank"
                                   class="inline-flex items-center px-4 py-2 bg-blue-700 hover:bg-blue-800 text-white text-sm font-semibold rounded-lg shadow transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-offset-2">
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 12H9m12 0A9 9 0 11 3 12a9 9 0 0118 0z"/>
                                    </svg>
                                    Ver PDF
                                </a>
                                <a href="<?php echo e(asset('storage/' . $doc->path_archivo)); ?>" download
                                   class="inline-flex items-center px-4 py-2 bg-gray-100 hover:bg-gray-200 text-blue-800 text-sm font-semibold rounded-lg shadow transition-colors duration-200 border border-blue-200 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-offset-2">
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/>
                                    </svg>
                                    Descargar
                                </a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <div class="swiper-slide">
                        <div class="bg-white rounded-lg shadow p-4 flex flex-col items-center text-gray-500">No hay documentos normativos.</div>
                    </div>
                <?php endif; ?>
            </div>
            <div class="swiper-pagination"></div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
        </div>
        
        <h2 class="font-serif text-2xl font-bold mb-6 text-blue-900 mt-12">Documentos de Requisitos</h2>
        <div class="swiper documentos-swiper">
            <div class="swiper-wrapper">
                <?php $__empty_1 = true; $__currentLoopData = $documentosRequisitos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $doc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <div class="swiper-slide">
                        <div class="bg-white rounded-lg shadow p-4 flex flex-col items-center">
                            <img src="https://cdn.jsdelivr.net/gh/edent/SuperTinyIcons/images/svg/pdf.svg" alt="PDF" class="w-16 h-16 mb-2">
                            <div class="font-semibold text-center"><?php echo e($doc->titulo); ?></div>
                            <div class="flex gap-2 mt-3">
                                <a href="<?php echo e(asset('storage/' . $doc->path_archivo)); ?>" target="_blank"
                                   class="inline-flex items-center px-4 py-2 bg-blue-700 hover:bg-blue-800 text-white text-sm font-semibold rounded-lg shadow transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-offset-2">
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 12H9m12 0A9 9 0 11 3 12a9 9 0 0118 0z"/>
                                    </svg>
                                    Ver PDF
                                </a>
                                <a href="<?php echo e(asset('storage/' . $doc->path_archivo)); ?>" download
                                   class="inline-flex items-center px-4 py-2 bg-gray-100 hover:bg-gray-200 text-blue-800 text-sm font-semibold rounded-lg shadow transition-colors duration-200 border border-blue-200 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-offset-2">
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/>
                                    </svg>
                                    Descargar
                                </a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <div class="swiper-slide">
                        <div class="bg-white rounded-lg shadow p-4 flex flex-col items-center text-gray-500">No hay documentos de requisitos.</div>
                    </div>
                <?php endif; ?>
            </div>
            <div class="swiper-pagination"></div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
        </div>
    </main>

    <!-- Formulario de Contacto Seguimiento al Egresado -->
    <section class="bg-white rounded-xl shadow-lg p-8 my-12 max-w-2xl mx-auto">
        <?php if(session('success')): ?>
            <div class="mb-6 p-4 rounded-lg bg-green-100 border border-green-300 text-green-800 text-center font-semibold">
                <?php echo e(session('success')); ?>

            </div>
        <?php endif; ?>
        <h2 class="mb-4 text-3xl font-serif font-bold text-center text-blue-900">Contáctanos - Seguimiento al Egresado</h2>
        <p class="mb-8 font-light text-center text-gray-600 sm:text-lg">
            ¿Eres egresado o tienes preguntas sobre certificaciones, inserción laboral o servicios para egresados? Escríbenos y te responderemos a la brevedad.
        </p>
        <form action="<?php echo e(route('contacto.rsu')); ?>" method="post" class="space-y-6">
            <?php echo csrf_field(); ?>
            <div>
                <label for="email" class="block mb-2 text-sm font-medium text-blue-900">Tu correo electrónico</label>
                <input type="email" id="email" name="email" class="shadow-sm bg-blue-50 border border-blue-200 text-blue-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="nombre@ejemplo.com" required>
            </div>
            <div>
                <label for="asunto" class="block mb-2 text-sm font-medium text-blue-900">Asunto</label>
                <input type="text" id="asunto" name="asunto" class="block p-3 w-full text-sm text-blue-900 bg-blue-50 rounded-lg border border-blue-200 shadow-sm focus:ring-blue-500 focus:border-blue-500" placeholder="¿En qué podemos ayudarte?" required>
            </div>
            <div>
                <label for="mensaje" class="block mb-2 text-sm font-medium text-blue-900">Mensaje</label>
                <textarea id="mensaje" name="mensaje" rows="6" class="block p-2.5 w-full text-sm text-blue-900 bg-blue-50 rounded-lg shadow-sm border border-blue-200 focus:ring-blue-500 focus:border-blue-500" placeholder="Escribe tu mensaje aquí..." required></textarea>
            </div>
            <button type="submit" class="py-3 px-6 text-sm font-semibold text-white rounded-lg bg-blue-700 hover:bg-blue-800 shadow transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-offset-2">
                Enviar mensaje
            </button>
        </form>
    </section>

    <?php echo $__env->make('layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
    <?php echo app('Illuminate\Foundation\Vite')(['resources/js/app.js']); ?>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\sisogrsu1\resources\views/seguimiento-egresado.blade.php ENDPATH**/ ?>