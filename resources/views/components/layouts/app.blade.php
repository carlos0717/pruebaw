{{-- resources/views/components/layouts/app.blade.php --}}
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'SISOGRSU' }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    @livewireStyles  
    @stack('styles')
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
                    <span class="text-blue-600 font-semibold">@yield('breadcrumb', 'Dashboard')</span>
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
                    @include('components.user-menu')
                </div>
            </div>
        </div>
    </header>
    <div class="flex flex-1">
        <x-sidebar-menu />
        <main class="flex-1 p-8">
            {{ $slot }}
        </main>
    </div>
    <x-footer />
    @livewireScripts
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('scripts')
</body>
</html>