@extends('layouts.app')

@section('content')
@include('layouts.header-nav')
<main class="flex-1 w-full">
    <section class="my-8">
        <div class="flex flex-col lg:flex-row items-center gap-8">
            <div class="lg:w-2/3 mb-3 lg:mb-0">
                <div class="bg-gradient-to-r from-blue-700 to-blue-400 rounded-xl shadow-lg p-8 flex flex-col justify-center h-full">
                    <h1 class="text-3xl md:text-4xl font-serif font-bold text-white mb-2">Proyección Social</h1>
                    <p class="text-lg text-blue-100 mb-4 max-w-2xl">La Dirección de Proyección Social tiene la responsabilidad de coordinar, promover y desarrollar programas de capacitación y apoyo que permitan mejorar el nivel de vida de las comunidades a nivel local, regional, nacional e internacional. Busca integrar a la universidad con su entorno para lograr un desarrollo sostenible.</p>
                </div>
            </div>
            <div class="flex-1 flex justify-center">
                <img src="/images/escudo_unasam.png" alt="Escudo Universidad" class="h-40 w-auto drop-shadow-xl">
            </div>
        </div>
    </section>

    <section class="mb-12">
        <!-- Objetivos -->
        <div class="bg-white rounded-xl shadow-lg p-8 mb-8">
            <h2 class="text-3xl font-serif font-semibold text-blue-900 mb-6">Objetivos</h2>
            <div class="space-y-6">
                <div class="flex gap-4">
                    <div class="bg-blue-100 p-3 rounded-lg shrink-0">
                        <svg class="w-6 h-6 text-blue-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-xl font-semibold text-blue-900 mb-2">Asistencia Social</h3>
                        <p class="text-gray-600">Brindamos apoyo a comunidades de Ancash para mejorar su calidad de vida mediante programas sociales integrales.</p>
                    </div>
                </div>

                <div class="flex gap-4">
                    <div class="bg-blue-100 p-3 rounded-lg shrink-0">
                        <svg class="w-6 h-6 text-blue-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-xl font-semibold text-blue-900 mb-2">Alianzas Estratégicas</h3>
                        <p class="text-gray-600">Trabajamos con organizaciones públicas y privadas para impulsar el bien común mediante proyectos colaborativos.</p>
                    </div>
                </div>

                <div class="flex gap-4">
                    <div class="bg-blue-100 p-3 rounded-lg shrink-0">
                        <svg class="w-6 h-6 text-blue-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-xl font-semibold text-blue-900 mb-2">Integración Universitaria</h3>
                        <p class="text-gray-600">Vinculamos a la comunidad académica con problemáticas sociales a través de actividades formativas prácticas.</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Funciones Principales -->
        <div class="bg-white rounded-xl shadow-lg p-8 mb-8">
            <h2 class="text-3xl font-serif font-semibold text-blue-900 mb-6">Funciones Principales</h2>
            <div class="grid md:grid-cols-2 gap-6">
                <div class="flex gap-4">
                    <div class="bg-blue-100 p-3 rounded-lg shrink-0">
                        <svg class="w-6 h-6 text-blue-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4" />
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-xl font-semibold text-blue-900 mb-2">Políticas y Planificación</h3>
                        <p class="text-gray-600">Implementamos políticas y planes generales de proyección social y extensión universitaria.</p>
                    </div>
                </div>

                <div class="flex gap-4">
                    <div class="bg-blue-100 p-3 rounded-lg shrink-0">
                        <svg class="w-6 h-6 text-blue-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-xl font-semibold text-blue-900 mb-2">Programas de Cooperación</h3>
                        <p class="text-gray-600">Ejecutamos programas de asistencia técnica para organizaciones sociales de la región.</p>
                    </div>
                </div>

                <div class="flex gap-4">
                    <div class="bg-blue-100 p-3 rounded-lg shrink-0">
                        <svg class="w-6 h-6 text-blue-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-xl font-semibold text-blue-900 mb-2">Coordinación Institucional</h3>
                        <p class="text-gray-600">Articulamos acciones con universidades e instituciones nacionales e internacionales.</p>
                    </div>
                </div>

                <div class="flex gap-4">
                    <div class="bg-blue-100 p-3 rounded-lg shrink-0">
                        <svg class="w-6 h-6 text-blue-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-xl font-semibold text-blue-900 mb-2">Gestión Ambiental</h3>
                        <p class="text-gray-600">Promovemos acciones de protección ambiental y desarrollo sostenible en comunidades.</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modalidades -->
        <div class="bg-blue-50 rounded-xl shadow-lg p-8">
            <h2 class="text-3xl font-serif font-semibold text-blue-900 mb-6">Modalidades de Proyección Social</h2>
            <div class="grid md:grid-cols-3 gap-6">
                <div class="bg-white p-4 rounded-lg">
                    <div class="bg-blue-100 w-full p-3 rounded-lg mb-3">
                        <svg class="w-6 h-6 text-blue-700 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-blue-900 mb-2">Participación Ciudadana</h3>
                    <ul class="list-disc pl-5 space-y-2 text-gray-600">
                        <li>Foros comunitarios</li>
                        <li>Mesas de trabajo interinstitucionales</li>
                        <li>Proyectos colaborativos</li>
                    </ul>
                </div>

                <div class="bg-white p-4 rounded-lg">
                    <div class="bg-blue-100 w-full p-3 rounded-lg mb-3">
                        <svg class="w-6 h-6 text-blue-700 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-blue-900 mb-2">Campañas Integrales</h3>
                    <ul class="list-disc pl-5 space-y-2 text-gray-600">
                        <li>Salud preventiva</li>
                        <li>Educación comunitaria</li>
                        <li>Sensibilización social</li>
                    </ul>
                </div>

                <div class="bg-white p-4 rounded-lg">
                    <div class="bg-blue-100 w-full p-3 rounded-lg mb-3">
                        <svg class="w-6 h-6 text-blue-700 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-blue-900 mb-2">Servicios Comunitarios</h3>
                    <ul class="list-disc pl-5 space-y-2 text-gray-600">
                        <li>Asesoría técnica</li>
                        <li>Capacitaciones profesionales</li>
                        <li>Apoyo en gestión ambiental</li>
                    </ul>
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
                    @foreach($noticias as $noticia)
                    <div class="swiper-slide h-full">
                        <div class="bg-white rounded-lg shadow-md flex flex-col overflow-hidden h-full">
                            <img src="{{ asset('storage/' . $noticia->imagen_path) }}" alt="Miniatura"
                                class="w-full h-32 object-cover rounded-t-lg border-b border-blue-100 shadow-sm bg-gray-100" style="aspect-ratio: 16/9;">
                            <div class="p-4 flex-1 flex flex-col">
                                <h3 class="font-semibold text-blue-800 text-lg mb-1">
                                    <a href="{{ route('noticias.show', ['id' => $noticia->id]) }}" class="hover:underline hover:text-blue-600 transition-colors duration-150">
                                        {{ $noticia->titulo }}
                                    </a>
                                </h3>
                                <div class="text-xs text-gray-500 mt-2">{{ $noticia->area_origen }} | {{ \Carbon\Carbon::parse($noticia->fecha_publicacion)->format('d/m/Y H:i') }}</div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="swiper-pagination"></div>
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>
            </div>
        </div>
    </section>
    {{-- Carrusel de Documentos Normativos --}}
    <h2 class="font-serif text-2xl font-bold mb-6 text-blue-900">Documentos Normativos</h2>
    <div class="swiper documentos-swiper">
        <div class="swiper-wrapper">
            @forelse($documentosNormativos as $doc)
            <div class="swiper-slide">
                <div class="bg-white rounded-lg shadow p-4 flex flex-col items-center">
                    <img src="https://cdn.jsdelivr.net/gh/edent/SuperTinyIcons/images/svg/pdf.svg" alt="PDF" class="w-16 h-16 mb-2">
                    <div class="font-semibold text-center">{{ $doc->titulo }}</div>
                    <div class="flex gap-2 mt-3">
                        <a href="{{ asset('storage/' . $doc->path_archivo) }}" target="_blank"
                            class="inline-flex items-center px-4 py-2 bg-blue-700 hover:bg-blue-800 text-white text-sm font-semibold rounded-lg shadow transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-offset-2">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12H9m12 0A9 9 0 11 3 12a9 9 0 0118 0z" />
                            </svg>
                            Ver PDF
                        </a>
                        <a href="{{ asset('storage/' . $doc->path_archivo) }}" download
                            class="inline-flex items-center px-4 py-2 bg-gray-100 hover:bg-gray-200 text-blue-800 text-sm font-semibold rounded-lg shadow transition-colors duration-200 border border-blue-200 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-offset-2">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                            </svg>
                            Descargar
                        </a>
                    </div>
                </div>
            </div>
            @empty
            <div class="swiper-slide">
                <div class="bg-white rounded-lg shadow p-4 flex flex-col items-center text-gray-500">No hay documentos normativos.</div>
            </div>
            @endforelse
        </div>
        <div class="swiper-pagination"></div>
        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>
    </div>
    {{-- Carrusel de Documentos Requisitos --}}
    <h2 class="font-serif text-2xl font-bold mb-6 text-blue-900 mt-12">Documentos de Requisitos</h2>
    <div class="swiper documentos-swiper">
        <div class="swiper-wrapper">
            @forelse($documentosRequisitos as $doc)
            <div class="swiper-slide">
                <div class="bg-white rounded-lg shadow p-4 flex flex-col items-center">
                    <img src="https://cdn.jsdelivr.net/gh/edent/SuperTinyIcons/images/svg/pdf.svg" alt="PDF" class="w-16 h-16 mb-2">
                    <div class="font-semibold text-center">{{ $doc->titulo }}</div>
                    <div class="flex gap-2 mt-3">
                        <a href="{{ asset('storage/' . $doc->path_archivo) }}" target="_blank"
                            class="inline-flex items-center px-4 py-2 bg-blue-700 hover:bg-blue-800 text-white text-sm font-semibold rounded-lg shadow transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-offset-2">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12H9m12 0A9 9 0 11 3 12a9 9 0 0118 0z" />
                            </svg>
                            Ver PDF
                        </a>
                        <a href="{{ asset('storage/' . $doc->path_archivo) }}" download
                            class="inline-flex items-center px-4 py-2 bg-gray-100 hover:bg-gray-200 text-blue-800 text-sm font-semibold rounded-lg shadow transition-colors duration-200 border border-blue-200 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-offset-2">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                            </svg>
                            Descargar
                        </a>
                    </div>
                </div>
            </div>
            @empty
            <div class="swiper-slide">
                <div class="bg-white rounded-lg shadow p-4 flex flex-col items-center text-gray-500">No hay documentos de requisitos.</div>
            </div>
            @endforelse
        </div>
        <div class="swiper-pagination"></div>
        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>
    </div>

    <!-- Formulario de Contacto Proyección Social -->
    <section class="bg-white rounded-xl shadow-lg p-8 my-12 max-w-2xl mx-auto">
        @if(session('success'))
        <div class="mb-6 p-4 rounded-lg bg-green-100 border border-green-300 text-green-800 text-center font-semibold">
            {{ session('success') }}
        </div>
        @endif
        <h2 class="mb-4 text-3xl font-serif font-bold text-center text-blue-900">Contáctanos - Proyección Social</h2>
        <p class="mb-8 font-light text-center text-gray-600 sm:text-lg">
            ¿Tienes consultas, sugerencias o necesitas información sobre los programas y actividades de Proyección Social? Escríbenos y te responderemos a la brevedad.
        </p>
        <form action="{{route('contacto.rsu')}}" method="post" class="space-y-6">
            @csrf
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
</main>


@include('layouts.footer')
@endsection

@push('scripts')
@vite(['resources/js/app.js'])
@endpush