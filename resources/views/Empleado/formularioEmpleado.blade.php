@extends('index')


@section('ContenidoFormularios')

<div class="row">
<div class="col-lg-2"></div>
<div class="col-lg-10">

  <form action="{{route('guardarEmpleado')}}" method="POST" >
    {{csrf_field()}}
      <div class="form-group col-md-6 row">
        <div class="form-group col-md-6">
          <label for="nombres" class="form-label mt-4">Nombres</label>
          <!-- Poner el error si el campo está vacío--> 
          @if($errors->first('nombreEmpleado'))
            <p class="text-danger">{{$errors->first('nombreEmpleado')}}</nombreEmpleado>
          @endif
          <input type="text" class="form-control" name="nombreEmpleado" id="nombreEmpleado" value="{{old('nombreEmpleado')}}" aria-describedby="nombresHelp" placeholder="Digite nombres">
          <small id="nombresHelp" class="form-text text-muted">Debe digitar nombres.</small>
        </div>
        <div class="form-group col-md-6">
          <label for="apellidos" class="form-label mt-4">Apellidos</label>
          @if($errors->first('apellidoEmpleado'))
            <p class="text-danger">{{$errors->first('apellidoEmpleado')}}</apellidoEmpleado>
          @endif
          <input type="text" class="form-control" name="apellidoEmpleado" id="apellidoEmpleado" value="{{old('apellidoEmpleado')}}" placeholder="Digite apellidos">
        </div>
      </div>

      <div class="form-group col-md-6 row">
        <div class="form-group col-md-6">
          <label for="Identificacion" class="form-label mt-4">Identificación</label>
          @if($errors->first('nroIdentificacionEmpleado'))
            <p class="text-danger">{{$errors->first('nroIdentificacionEmpleado')}}</nroIdentificacionEmpleado>
          @endif
          <input type="number" class="form-control" name="nroIdentificacionEmpleado" id="nroIdentificacionEmpleado" value="{{old('nroIdentificacionEmpleado')}}" placeholder="Digite identificacion">
        </div>
        <div class="form-group col-md-6">
          <label for="direccion" class="form-label mt-4">Dirección</label>
          @if($errors->first('direccionEmpleado'))
            <p class="text-danger">{{$errors->first('direccionEmpleado')}}</direccionEmpleado>
          @endif
          <input type="text" class="form-control" name="direccionEmpleado" id="direccionEmpleado" value="{{old('direccionEmpleado')}}" placeholder="Digite dirección">
        </div>
      </div>

      <div class="form-group col-md-6 row">
        <div class="form-group col-md-6">
          <label for="telefono" class="form-label mt-4">teléfono</label>
          @if($errors->first('nrotelefonoEmpleado'))
            <p class="text-danger">{{$errors->first('nrotelefonoEmpleado')}}</nrotelefonoEmpleado>
          @endif
          <input type="number" class="form-control" name="nrotelefonoEmpleado" id="nrotelefonoEmpleado" value="{{old('nrotelefonoEmpleado')}}" placeholder="Digite teléfono">
        </div>
      </div>

      <br>
      <div class="form-group col-md-6 row">
        <p>Información nacimiento</p>
        <div class="form-group col-md-6">
          <label for="Departamento" class="form-label mt-4">Departamento</label>
          @if($errors->first('idDepartamentoEmpleado'))
            <p class="text-danger">{{$errors->first('idDepartamentoEmpleado')}}</idDepartamentoEmpleado>
          @endif
          <select class="form-select" name="idDepartamentoEmpleado" id="idDepartamentoEmpleado">
            <option value="">Seleccione...</option>
            @foreach($departamentos as $departamento)
              <option value="{{$departamento->idDpartamentoEmpleado}}" >{{$departamento->departamentoEmpleado}}</option>
            @endforeach
          </select>
        </div>
        <div class="form-group col-md-6">
          <label for="ciudad" class="form-label mt-4">Ciudad</label>
          @if($errors->first('idCiudadEmpleado'))
            <p class="text-danger">{{$errors->first('idCiudadEmpleado')}}</idCiudadEmpleado>
          @endif
          <select class="form-select" name="idCiudadEmpleado" id="idCiudadEmpleado">
            <option value="">Seleccione...</option>
          </select>
            </div>
      </div>

      <br><br>
      <button type="submit" class="btn btn-primary">Guardar</button>
    </fieldset>
  </form>

</div>
<div class="col-lg-2"></div>
</div>

<script type="text/javascript">


  $("#idDepartamentoEmpleado").on("change", function(){
    var optionsRta = "";
    $.ajax({
        headers: {'X-CSRF-Token': $('input[name="_token"]').val()},
        url: 'listarCiudadesxDepto',
        type: "POST",
        data : { idDepto: $("#idDepartamentoEmpleado option:selected").val() },     
        cache: false,                
        beforeSend: function () {
            
        },        
        success: function (data) {
          //console.log(data);
          optionsRta += "<option selected='true'>Seleccione...</option>";
          $(data).each(function(index, Ciudad){
              //console.log(Ciudad);
              //alert(Ciudad['idCiudadEmpleado']+"----"+Ciudad['ciudadEmpleado']);
              optionsRta += "<option value="+Ciudad['idCiudadEmpleado']+" >"+Ciudad['ciudadEmpleado']+"</option>";
          })
        },
        error : function(xhr, status) {
          alert('Disculpe, existió un problema');
        }, 
        complete : function(xhr, status) {
          //alert('Petición realizada');
          $("#idCiudadEmpleado").html(optionsRta);
        },
        async:false    
    }); 
  });
</script>


@stop

