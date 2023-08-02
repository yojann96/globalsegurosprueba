<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" type="text/css" href="<?php echo e(asset( 'css/estilo.css' )); ?>">

    <title>Lista empleados</title>
</head>
<body>
    <p>Hola, por fin estas ingresando</p>
    <br>
    Nombre de Empleado <?php echo e($Nombre); ?> trabajo <?php echo e($Dias); ?>

    <br>
    <!-- Condicionales --> 
    <?php if($Nombre=="Yojann"): ?>
    <h1>Hola Joven <?php echo e($Nombre); ?></h1>
    <img src="<?php echo e(asset('fotos/firma.png')); ?>">
    <?php endif; ?>

    <!-- Mandar llamar a otra ruta o sistema --> 
    <a href="<?php echo e(route('Abandonar')); ?>">Salir</a>

</body>
</html><?php /**PATH C:\xampp\htdocs\laravelProyectos\grupoAlianza-Prueba\resources\views/Empleado/index.blade.php ENDPATH**/ ?>