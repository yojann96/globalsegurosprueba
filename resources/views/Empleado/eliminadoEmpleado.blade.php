@extends('index')

@section('ContenidoFormularios')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Empleado eliminado exitosamente</title>
</head>
<body>
    <h2>Empleado eliminado exitosamente</h2>
    <a href="{{route('listarEmpleados')}}">Regresar</a>
</body>
</html>

@stop