{{-- resources/views/components/dashboard-header.blade.php --}}
<header class="flex items-center justify-between pb-4 border-b border-gray-200">
    <h1 class="text-2xl font-semibold text-gray-800">Dashboard Principal</h1>
    <div class="flex items-center space-x-4">
        @include('components.user-menu')
    </div>
</header>