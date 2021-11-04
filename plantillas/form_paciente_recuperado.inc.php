
<input type="hidden" id="id-paciente" name="id-paciente" value="<?php echo $id_paciente; ?>"   >
<div class="form-group">
    <label>Nombre </label>
    <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre del Paciente"
           value="<?php echo $paciente_recuperado -> getNombre(); ?>">
    <input type="hidden" id="nombre-original" name="nombre-original" value="<?php echo $paciente_recuperado -> getNombre(); ?>">
</div>
<div class="form-group">
    <label>Apellido </label>
    <input type="text" class="form-control" id="apellido" name="apellido" placeholder="Apellido del Paciente"
           value="<?php echo $paciente_recuperado -> getApellido();  ?>">
    <input type="hidden" id="apellido-original" name="apellido-original" value="<?php echo $paciente_recuperado -> getApellido(); ?>">
</div>

<div class="form-group">
    <label>Direccion </label>
    <input type="text" class="form-control" id="direccion" name="direccion" placeholder="Direccion del Paciente"
           value="<?php echo $paciente_recuperado -> getDireccion();  ?>">
    <input type="hidden" id="direccion-original" name="direccion-original" value="<?php echo $paciente_recuperado -> getDireccion(); ?>">
</div>
<div class="form-group">
    <label>Telefono </label>
    <input type="text" class="form-control" id="telefono" name="telefono" placeholder="Telefono del Paciente"
          value=" <?php echo $paciente_recuperado -> getTelefono();  ?>">
    <input type="hidden" id="telefono-original" name="telefono-original" value="<?php echo $paciente_recuperado -> getTelefono(); ?>">
</div>
<div class="form-group">
    <label>Correo Electronico</label>
    <input type="email" class="form-control" id="correo" name="correo" placeholder="paciente@paciente.com"
           value="<?php echo $paciente_recuperado -> getCorreo();  ?>">
    <input type="hidden" id="correo-original" name="correo-original" value="<?php echo $paciente_recuperado -> getCorreo(); ?>">
</div>
<div class="form-group">
    <label>Descripcion </label>
    <textarea class="form-control" rows="5" id="descripcion" name="descripcion" placeholder="Descripcion del Paciente"><?php echo $paciente_recuperado -> getDescripcion();  ?></textarea>
    <input type="hidden" id="descripcion-original" name="descripcion-original" value="<?php echo $paciente_recuperado -> getDescripcion(); ?>">
</div>
<br> 
<button type="submit" class="btn btn-default btn-primary" name="actualizar_paciente" ><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Actualizar Paciente </button>