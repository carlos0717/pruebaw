
<header class="flex items-center justify-between pb-4 border-b border-gray-200">
    <h1 class="text-2xl font-semibold text-gray-800">Dashboard Principal</h1>
    <div class="flex items-center space-x-4">
        <?php echo $__env->make('components.user-menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
</header><?php /**PATH C:\xampp\htdocs\sisogrsu1\resources\views/components/dashboard-header.blade.php ENDPATH**/ ?>