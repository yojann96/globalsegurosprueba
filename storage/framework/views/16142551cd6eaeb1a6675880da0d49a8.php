


<?php $__env->startSection('ContenidoFormularios'); ?>

<div class="row">
<div class="col-lg-2"></div>
<div class="col-lg-10">

  <form action="<?php echo e(route('actualizaEmpleado')); ?>" method="POST" >
    <?php echo e(csrf_field()); ?>

    
      <div class="form-group col-md-6 row">
        <div class="form-group col-md-6">
          <label for="nombres" class="form-label mt-4">Nombres</label>
          <!-- Poner el error si el campo está vacío--> 
          <?php if($errors->first('nombreEmpleado')): ?>
            <p class="text-danger"><?php echo e($errors->first('nombreEmpleado')); ?></nombreEmpleado>
          <?php endif; ?>
          <input type="text" class="form-control" name="nombreEmpleado" id="nombreEmpleado" value="<?php echo e($infoEmpleado->nombreEmpleado); ?>" aria-describedby="nombresHelp" placeholder="Digite nombres">
          <small id="nombresHelp" class="form-text text-muted">Debe digitar nombres.</small>
        </div>
        <div class="form-group col-md-6">
          <label for="apellidos" class="form-label mt-4">Apellidos</label>
          <?php if($errors->first('apellidoEmpleado')): ?>
            <p class="text-danger"><?php echo e($errors->first('apellidoEmpleado')); ?></apellidoEmpleado>
          <?php endif; ?>
          <input type="text" class="form-control" name="apellidoEmpleado" id="apellidoEmpleado" value="<?php echo e($infoEmpleado->apellidoEmpleado); ?>" placeholder="Digite apellidos">
        </div>
      </div>

      <div class="form-group col-md-6 row">
        <div class="form-group col-md-6">
          <label for="Identificacion" class="form-label mt-4">Identificación</label>
          <?php if($errors->first('nroIdentificacionEmpleado')): ?>
            <p class="text-danger"><?php echo e($errors->first('nroIdentificacionEmpleado')); ?></nroIdentificacionEmpleado>
          <?php endif; ?>
          <input type="number" class="form-control" name="nroIdentificacionEmpleado" id="nroIdentificacionEmpleado" value="<?php echo e($infoEmpleado->nroIdentificacionEmpleado); ?>" placeholder="Digite identificacion">
        </div>
        <div class="form-group col-md-6">
          <label for="direccion" class="form-label mt-4">Dirección</label>
          <?php if($errors->first('direccionEmpleado')): ?>
            <p class="text-danger"><?php echo e($errors->first('direccionEmpleado')); ?></direccionEmpleado>
          <?php endif; ?>
          <input type="text" class="form-control" name="direccionEmpleado" id="direccionEmpleado" value="<?php echo e($infoEmpleado->direccionEmpleado); ?>" placeholder="Digite dirección">
        </div>
      </div>

      <div class="form-group col-md-6 row">
        <div class="form-group col-md-6">
          <label for="telefono" class="form-label mt-4">teléfono</label>
          <?php if($errors->first('nrotelefonoEmpleado')): ?>
            <p class="text-danger"><?php echo e($errors->first('nrotelefonoEmpleado')); ?></nrotelefonoEmpleado>
          <?php endif; ?>
          <input type="number" class="form-control" name="nrotelefonoEmpleado" id="nrotelefonoEmpleado" value="<?php echo e($infoEmpleado->nrotelefonoEmpleado); ?>" placeholder="Digite teléfono">
        </div>
      </div>

      <br>
      <div class="form-group col-md-6 row">
        <p>Información nacimiento</p>
        <div class="form-group col-md-6">
          <label for="Departamento" class="form-label mt-4">Departamento</label>
          <?php if($errors->first('idDepartamentoEmpleado')): ?>
            <p class="text-danger"><?php echo e($errors->first('idDepartamentoEmpleado')); ?></idDepartamentoEmpleado>
          <?php endif; ?>
          <select class="form-select" name="idDepartamentoEmpleado" id="idDepartamentoEmpleado">
            <option value="">Seleccione...</option>
            <option value="<?php echo e($infoEmpleado->idDpartamentoEmpleado); ?>" selected><?php echo e($infoEmpleado->departamentoEmpleado); ?></option>
            <?php $__currentLoopData = $Deptos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $departamento): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <option value="<?php echo e($departamento->idDpartamentoEmpleado); ?>" ><?php echo e($departamento->departamentoEmpleado); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </select>
        </div>
        <div class="form-group col-md-6">
          <label for="ciudad" class="form-label mt-4">Ciudad</label>
          <?php if($errors->first('idCiudadEmpleado')): ?>
            <p class="text-danger"><?php echo e($errors->first('idCiudadEmpleado')); ?></idCiudadEmpleado>
          <?php endif; ?>
          <select class="form-select" name="idCiudadEmpleado" id="idCiudadEmpleado">
            <option value="">Seleccione...</option>
            <option value="<?php echo e($infoEmpleado->idCiudadEmpleado); ?>" selected><?php echo e($infoEmpleado->ciudadEmpleado); ?></option>
            <?php $__currentLoopData = $Ciudades; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Ciudad): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <option value="<?php echo e($Ciudad->idCiudadEmpleado); ?>" ><?php echo e($Ciudad->ciudadEmpleado); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </select>
            </div>
      </div>

      <br><br>
      <input type="hidden" class="form-control" id="idEmpleado" name="idEmpleado" value="<?php echo e($infoEmpleado->IdEmpleado); ?>" >
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
          console.log(data);
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


<?php $__env->stopSection(); ?>


<?php echo $__env->make('index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravelProyectos\grupoAlianza-Prueba\resources\views/Empleado/modificarEmpleado.blade.php ENDPATH**/ ?>