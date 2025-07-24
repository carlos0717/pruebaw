@extends('layouts.app')

@section('content')
    <main class="h-screen w-full bg-cover bg-center bg-gray-100" style="background-image: url('{{ asset('images/unasam_central.webp') }}');">
        <a href="/" style="position: absolute; top: 16px; left: 16px; z-index: 1000; text-decoration: none; font-weight: bold; color: #3490dc; font-size: 18px;">&larr; Volver a inicio</a>
        <div class="absolute inset-0 flex flex-col items-center justify-center">
            <h2 class="mt-12 text-4xl font-serif font-bold text-white mb-8 text-center drop-shadow ">Registro de Usuario</h2>
            <form method="POST" action="{{ route('register') }}" class="w-full max-w-lg bg-white bg-opacity-90 rounded-2xl shadow-2xl p-10 space-y-8 mx-auto" id="registerForm">
                @csrf
                <div>
                    <label for="name" class="block text-blue-900 font-semibold mb-1">Nombre completo</label>
                    <input id="name" class="block w-full px-4 py-3 border border-blue-200 rounded focus:ring-2 focus:ring-blue-400 focus:outline-none text-lg" type="text" name="name" value="{{ old('name') }}" required autofocus autocomplete="name">
                </div>
                <div>
                    <label for="email" class="block text-blue-900 font-semibold mb-1">Correo electrónico</label>
                    <input id="email" class="block w-full px-4 py-3 border border-blue-200 rounded focus:ring-2 focus:ring-blue-400 focus:outline-none text-lg" type="email" name="email" value="{{ old('email') }}" required autocomplete="username">
                </div>
                <div>
                    <label for="password" class="block text-blue-900 font-semibold mb-1">Contraseña</label>
                    <div class="relative">
                        <input id="password" class="block w-full px-4 py-3 border border-blue-200 rounded focus:ring-2 focus:ring-blue-400 focus:outline-none pr-10 text-lg" type="password" name="password" required autocomplete="new-password">
                        <button type="button" onclick="togglePasswordRegister()" class="absolute right-3 top-3 text-blue-700 hover:text-blue-900" tabindex="-1">
                            <svg id="eyeIconRegister" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-.38 1.262-1.01 2.422-1.858 3.418m-2.681 2.681C17.422 19.01 15.761 19 12 19c-4.478 0-8.268-2.943-9.542-7a10.05 10.05 0 013.292-4.418" /></svg>
                        </button>
                    </div>
                </div>
                <div>
                    <label for="password_confirmation" class="block text-blue-900 font-semibold mb-1">Confirmar contraseña</label>
                    <input id="password_confirmation" class="block w-full px-4 py-3 border border-blue-200 rounded focus:ring-2 focus:ring-blue-400 focus:outline-none text-lg" type="password" name="password_confirmation" required autocomplete="new-password">
                </div>
                <button type="submit" class="w-full bg-blue-900 text-white py-3 rounded font-bold text-lg hover:bg-blue-800 transition">Registrarse</button>
                <div class="text-center mt-6">
                    <span class="text-blue-900">¿Ya tienes cuenta?</span>
                    <a href="{{ route('login') }}" class="text-blue-700 font-semibold hover:underline">Inicia sesión</a>
                </div>
            </form>
        </div>
    </main>
    <script>
    function togglePasswordRegister() {
        const pwd = document.getElementById('password');
        const icon = document.getElementById('eyeIconRegister');
        if (pwd.type === 'password') {
            pwd.type = 'text';
            icon.innerHTML = `<path stroke-linecap=\"round\" stroke-linejoin=\"round\" stroke-width=\"2\" d=\"M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.542-7a10.05 10.05 0 013.292-4.418\" /><path stroke-linecap=\"round\" stroke-linejoin=\"round\" stroke-width=\"2\" d=\"M15 12a3 3 0 11-6 0 3 3 0 016 0z\" /><path stroke-linecap=\"round\" stroke-linejoin=\"round\" stroke-width=\"2\" d=\"M3 3l18 18\" />`;
        } else {
            pwd.type = 'password';
            icon.innerHTML = `<path stroke-linecap=\"round\" stroke-linejoin=\"round\" stroke-width=\"2\" d=\"M15 12a3 3 0 11-6 0 3 3 0 016 0z\" /><path stroke-linecap=\"round\" stroke-linejoin=\"round\" stroke-width=\"2\" d=\"M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-.38 1.262-1.01 2.422-1.858 3.418m-2.681 2.681C17.422 19.01 15.761 19 12 19c-4.478 0-8.268-2.943-9.542-7a10.05 10.05 0 013.292-4.418\" />`;
        }
    }
    </script>
@endsection
