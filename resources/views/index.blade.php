<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://bootswatch.com/5/lumen/bootstrap.min.css">
    
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

    <!-- 
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js">
    -->

    <title>Estilos con Bootstrap</title>
</head>
<body>    
  <nav class="navbar navbar-expand-lg bg-primary" data-bs-theme="dark">
    <div class="container-fluid">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarColor01">
        <ul class="navbar-nav me-auto">
          <li class="nav-item">
            <a class="nav-link btnMenu" id="EditarEmpleado" href="{{route('listarEmpleados')}}">Listar empleados</a>
          </li>
          <li class="nav-item">
            <a class="nav-link btnMenu" id="asociarRol" href="#">Roles</a>
          </li>
        </ul>
        
      </div>
    </div>
  </nav>

<div id="ContenidoFormularios">
  <!-- Aqui mostraré el diseño de otras Vistas -->
  @yield('ContenidoFormularios')
</div>

</body>
<script>
  $(".btnMenu").on("click", function(){

  });
</script>
</html>

