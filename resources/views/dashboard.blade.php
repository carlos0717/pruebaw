{{-- <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <x-welcome />
            </div>
        </div>
    </div>
</x-app-layout> --}}

{{-- resources/views/dashboard.blade.php --}}
<x-layouts.app>
    <div class="flex">
        {{-- <x-sidebar-menu /> se comento el sidebar-menu --}}
        <main class="flex-1 p-8">
            <x-dashboard-header />
            <div class="grid grid-cols-3 gap-6 mt-8">
                <x-general-report-card />
                <x-visitors-card />
                <x-users-by-age-card 
                    :total="$total" 
                    :aprobados="$aprobados" 
                    :en-curso="$enCurso" 
                    :rechazados="$rechazados" 
                    :finalizados="$finalizados" 
                />
            </div>
            <div class="grid grid-cols-3 gap-6 mt-8">
                <x-official-store-map class="col-span-2" />
                <x-weekly-best-sellers />
            </div>
            <div class="grid grid-cols-2 gap-6 mt-8">
                <x-important-notes />
                <x-recent-activities />
                <x-transactions />
            </div>
        </main>
    </div>
</x-layouts.app>
