<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Página Principal')</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    {{-- Alpine.js se incluye ahora desde el build de Vite --}}
    @livewireStyles
    @stack('styles')
</head>
<body class="min-h-screen flex flex-col bg-gray-100">
    <div class="flex-1 w-full max-w-screen-xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-col">
        @yield('content')
    </div>
    @livewireScripts
    @stack('scripts')
</body>
</html>
