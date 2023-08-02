

<?php $__env->startSection('ContenidoFormularios'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Empleado creado exitosamente</title>
</head>
<body>
    <h2>Empleado creado exitosamente</h2>
    <a href="<?php echo e(route('listarEmpleados')); ?>">Regresar</a>
</body>
</html>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravelProyectos\grupoAlianza-Prueba\resources\views/Empleado/creadoEmpleado.blade.php ENDPATH**/ ?>