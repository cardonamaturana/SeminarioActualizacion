<div class="form-group">
    <label>Nombre </label>
    <input type="text" class="form-control" name="nombre" placeholder="Nombre del Paciente" <?php $validador -> mostrar_nombre() ?> > 
    <?php
    $validador -> mostrar_error_nombre();
    ?>
</div>
<div class="form-group">
    <label>Apellido </label>
    <input type="text" class="form-control" name="apellido" placeholder="Apellido del Paciente" <?php $validador -> mostrar_apellido() ?> >
    <?php
    $validador -> mostrar_error_apellido();
    ?>
</div>
<div class="form-group">
    <label>Identificacion </label>
    <input type="text" class="form-control" name="id" placeholder="Id del Paciente" <?php $validador -> mostrar_id() ?> >
    <?php
    $validador -> mostrar_error_id();
    ?>
</div>
<div class="form-group">
    <label>Direccion </label>
    <input type="text" class="form-control" name="direccion" placeholder="Direccion del Paciente" <?php $validador -> mostrar_direccion() ?> >
    <?php
    $validador -> mostrar_error_direccion();
    ?>
</div>
<div class="form-group">
    <label>Telefono </label>
    <input type="int" class="form-control" name="telefono" placeholder="Telefono del Paciente" <?php $validador -> mostrar_telefono() ?> >
    <?php
    $validador -> mostrar_error_telefono();
    ?>
</div>
<div class="form-group">
    <label>Correo Electronico</label>
    <input type="email" class="form-control" name="correo" placeholder="paciente@paciente.com" <?php $validador -> mostrar_correo() ?> >
    <?php
    $validador -> mostrar_error_correo();
    ?>
</div>
<div class="form-group">
    <label>Descripcion </label>
    <textarea class="form-control" rows="5" id="descripcion" name="descripcion" placeholder="Descripcion del Paciente"><?php $validador -> mostrar_descripcion() ?></textarea>
    <?php
    $validador -> mostrar_error_descripcion();
    ?>
</div>
<br>
<button type="reset" class="btn btn-default btn-primary" >Limpiar </button>
<button type="submit" class="btn btn-default btn-primary" name="enviar" >Registrar Paciente </button>