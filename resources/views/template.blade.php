@extends('layouts.app')

@section('content')
    @include('layouts.header-nav')
    <main class="flex-1 w-full">
        <section class="my-8">
            <div class="max-w-3xl mx-auto bg-white rounded-xl shadow-lg overflow-hidden">
                <img src="{{ asset('storage/' . $noticia->imagen_path) }}" alt="Imagen de la noticia" class="w-full h-64 object-cover bg-gray-100 border-b border-blue-100" style="aspect-ratio: 16/9;">
                <div class="p-8">
                    <h1 class="text-3xl md:text-4xl font-serif font-bold text-blue-900 mb-2">{{ $noticia->titulo }}</h1>
                    <div class="flex items-center text-sm text-gray-500 mb-4">
                        <span class="mr-2"><svg class="inline w-4 h-4 text-blue-700" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V4a2 2 0 10-4 0v1.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/></svg></span>
                        <span>{{ $noticia->area_origen }}</span>
                        <span class="mx-2">|</span>
                        <span>{{ \Carbon\Carbon::parse($noticia->fecha_publicacion)->format('d/m/Y H:i') }}</span>
                        <span class="mx-2">|</span>
                        <span>Publicado por: {{ $noticia->user->name ?? 'Usuario' }}</span>
                    </div>
                    <div class="prose max-w-none text-gray-800 text-lg leading-relaxed">
                        {!! $noticia->descripcion !!}
                    </div>
                </div>
            </div>
        </section>
        <div class="max-w-3xl mx-auto mt-8 flex justify-between">
            <a href="{{ url()->previous() }}" class="inline-flex items-center px-4 py-2 bg-blue-700 hover:bg-blue-800 text-white text-sm font-semibold rounded-lg shadow transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-offset-2">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"/></svg>
                Volver
            </a>
        </div>
    </main>
    @include('layouts.footer')
    @push('scripts')
        @vite(['resources/js/app.js'])
    @endpush
@endsection
