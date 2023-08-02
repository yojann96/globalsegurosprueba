

<?php $__env->startSection('ContenidoFormularios'); ?>

<div class="row">
<div class="col-lg-2"></div>
<div class="col-lg-10">

  <form class="form-horizontal" action="<?php echo e(route('vistaDos')); ?>" method="POST" >
    <?php echo e(csrf_field()); ?>

    <fieldset>
      <div class="form-group col-md-6 row">
        <div class="form-group col-md-6">
          <label for="nombres" class="form-label mt-4">Nombres</label>
          <input type="text" class="form-control" id="nombreEmpleado" aria-describedby="nombresHelp" placeholder="Digite nombres">
          <small id="nombresHelp" class="form-text text-muted">Debe digitar nombres.</small>
        </div>
        <div class="form-group col-md-6">
          <label for="apellidos" class="form-label mt-4">Apellidos</label>
          <input type="text" class="form-control" id="apellidoEmpleado" placeholder="Digite apellidos">
        </div>
      </div>

      <div class="form-group col-md-6 row">
        <div class="form-group col-md-6">
          <label for="Identificacion" class="form-label mt-4">Identificación</label>
          <input type="number" class="form-control" id="nroIdentificacionEmpleado" placeholder="Digite identificacion">
        </div>
        <div class="form-group col-md-6">
          <label for="direccion" class="form-label mt-4">Dirección</label>
          <input type="text" class="form-control" id="direccionEmpleado" placeholder="Digite dirección">
        </div>
      </div>

      <div class="form-group col-md-6 row">
        <div class="form-group col-md-6">
          <label for="telefono" class="form-label mt-4">teléfono</label>
          <input type="number" class="form-control" id="nrotelefonoEmpleado" placeholder="Digite teléfono">
        </div>
      </div>

      <br>
      <div class="form-group col-md-6 row">
        <p>Información nacimiento</p>
        <div class="form-group col-md-6">
          <label for="Departamento" class="form-label mt-4">Departamento</label>
          <input type="text" class="form-control" id="departamentoEmpleado" placeholder="Digite departamento">
        </div>
        <div class="form-group col-md-6">
          <label for="ciudad" class="form-label mt-4">Ciudad</label>
          <input type="text" class="form-control" id="ciudadEmpleado" placeholder="Digite ciudad">
        </div>
      </div>

      <!-- 
      <div class="form-group">
        <label for="exampleSelect1" class="form-label mt-4">Example select</label>
        <select class="form-select" id="exampleSelect1">
          <option>1</option>
          <option>2</option>
          <option>3</option>
          <option>4</option>
          <option>5</option>
        </select>
      </div>
      <div class="form-group">
        <label for="exampleSelect1" class="form-label mt-4">Example disabled select</label>
        <select class="form-select" id="exampleDisabledSelect1" disabled="">
          <option>1</option>
          <option>2</option>
          <option>3</option>
          <option>4</option>
          <option>5</option>
        </select>
      </div>
      <div class="form-group">
        <label for="exampleSelect2" class="form-label mt-4">Example multiple select</label>
        <select multiple="" class="form-select" id="exampleSelect2">
          <option>1</option>
          <option>2</option>
          <option>3</option>
          <option>4</option>
          <option>5</option>
        </select>
      </div>
      <div class="form-group">
        <label for="exampleTextarea" class="form-label mt-4">Example textarea</label>
        <textarea class="form-control" id="exampleTextarea" rows="3"></textarea>
      </div>
      <div class="form-group">
        <label for="formFile" class="form-label mt-4">Default file input example</label>
        <input class="form-control" type="file" id="formFile">
      </div>
      <fieldset class="form-group">
        <legend class="mt-4">Radio buttons</legend>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked="">
          <label class="form-check-label" for="optionsRadios1">
            Option one is this and that—be sure to include why it's great
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
          <label class="form-check-label" for="optionsRadios2">
            Option two can be something else and selecting it will deselect option one
          </label>
        </div>
        <div class="form-check disabled">
          <input class="form-check-input" type="radio" name="optionsRadios" id="optionsRadios3" value="option3" disabled="">
          <label class="form-check-label" for="optionsRadios3">
            Option three is disabled
          </label>
        </div>
      -->
      </fieldset>
      
      <br>
      <button type="submit" class="btn btn-primary">Submit</button>
    </fieldset>
  </form>

</div>
<div class="col-lg-2"></div>
</div>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('Empleado/vistaBootstrap', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravelProyectos\grupoAlianza-Prueba\resources\views/Empleado/vistaUno.blade.php ENDPATH**/ ?>