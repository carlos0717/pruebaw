
<div class="bg-white rounded-lg shadow p-6 col-span-1">
    <div class="flex items-center justify-between mb-4">
        <div class="text-gray-500">Proyectos por Estado</div>
        <span class="bg-green-100 text-green-700 px-2 py-1 rounded text-xs">Estadística</span>
    </div>
    <div class="flex items-center">
        <div class="w-20 h-20 rounded-full bg-green-200 flex items-center justify-center text-2xl font-bold text-green-800">
            <?php echo e($total ?? 0); ?>

        </div>
        <div class="ml-4">
            <div class="flex items-center text-sm">
                <span class="w-2 h-2 bg-green-600 rounded-full mr-2"></span>
                Aprobados: <?php echo e(($total ?? 0) ? round((($aprobados ?? 0)/($total ?? 1))*100, 1) : 0); ?>%
            </div>
            <div class="flex items-center text-sm">
                <span class="w-2 h-2 bg-blue-400 rounded-full mr-2"></span>
                En Curso: <?php echo e(($total ?? 0) ? round((($enCurso ?? 0)/($total ?? 1))*100, 1) : 0); ?>%
            </div>
            <div class="flex items-center text-sm">
                <span class="w-2 h-2 bg-red-400 rounded-full mr-2"></span>
                Rechazados: <?php echo e(($total ?? 0) ? round((($rechazados ?? 0)/($total ?? 1))*100, 1) : 0); ?>%
            </div>
            <div class="flex items-center text-sm">
                <span class="w-2 h-2 bg-gray-400 rounded-full mr-2"></span>
                Finalizados: <?php echo e(($total ?? 0) ? round((($finalizados ?? 0)/($total ?? 1))*100, 1) : 0); ?>%
            </div>
        </div>
    </div>
</div><?php /**PATH C:\xampp\htdocs\sisogrsu1\resources\views/components/users-by-age-card.blade.php ENDPATH**/ ?>