@extends('index')


@section('ContenidoFormularios')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar Empleados</title>
</head>

<body>

<br>

<button class="btn btn-sm btn-danger">
<a class="nav-link active btnMenu" id="CreaEmpleado" href="{{route('formularioEmpleado')}}">Crear empleado</a>
</button>

<br>
{{csrf_field()}}
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nombre</th>
      <th scope="col">Apellido</th>
      <th scope="col">Identificación</th>
      <th scope="col">Dirección</th>
      <th scope="col">Teléfono</th>
      <th scope="col">Departamento</th>
      <th scope="col">Ciudad</th>
      <th scope="col">Acciones</th>
    </tr>
  </thead>
    <tbody>
        @foreach($empleados as $empleado)
            <tr>
                <th>{{$empleado->IdEmpleado}}</th>
                <th>{{$empleado->nombreEmpleado}}</th>
                <th>{{$empleado->apellidoEmpleado}}</th>
                <th>{{$empleado->nroIdentificacionEmpleado}}</th>
                <th>{{$empleado->direccionEmpleado}}</th>
                <th>{{$empleado->nrotelefonoEmpleado}}</th>
                <th>{{$empleado->departamentoEmpleado}}</th>
                <th>{{$empleado->ciudadEmpleado}}</th>
                <th>
                    <button class="btn btn-sm btn-info" id="EditarEmpleado"">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                        </svg>
                    </button>

                    <a href="{{route('eliminarEmpleado',['IdEmpleado' => $empleado->IdEmpleado] ) }}">
                        <button class="btn btn-sm btn-danger" name="idEmpleadoEliminar" id="idEmpleadoEliminar" value="{{$empleado->IdEmpleado}}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eraser" viewBox="0 0 16 16">
                                <path d="M8.086 2.207a2 2 0 0 1 2.828 0l3.879 3.879a2 2 0 0 1 0 2.828l-5.5 5.5A2 2 0 0 1 7.879 15H5.12a2 2 0 0 1-1.414-.586l-2.5-2.5a2 2 0 0 1 0-2.828l6.879-6.879zm2.121.707a1 1 0 0 0-1.414 0L4.16 7.547l5.293 5.293 4.633-4.633a1 1 0 0 0 0-1.414l-3.879-3.879zM8.746 13.547 3.453 8.254 1.914 9.793a1 1 0 0 0 0 1.414l2.5 2.5a1 1 0 0 0 .707.293H7.88a1 1 0 0 0 .707-.293l.16-.16z"/>
                            </svg>
                        </button>
                        <a href="{{route('listarEmpleados')}}"></a>
                    </a>

                    
                </th>
            </tr>
        @endforeach
    </tbody>
</table>
</body>
</html>

@stop