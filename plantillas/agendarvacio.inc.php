<div class="form-group">

    <label for="start">Fecha </label>

    <input type="datetime-local" id="start" name="fecha" placeholder="Fecha de la cita">

</div>
<div class="form-group">
    <label>Numero de cita </label>
    <input type="text" class="form-control" name="ncita" placeholder="Numero de cita">
</div>
<div class="form-group">
    <label>Identificacion del Paciente</label>
    <input type="text" class="form-control" name="id_paciente" placeholder="Id del Paciente">
</div>
<div class="form-group">
    <label>Valoracion del Paciente </label>
    <textarea class="form-control" rows="5" name="valoracion" placeholder="Valoracion del Paciente"></textarea>
    
</div>

<br>
<button type="reset" class="btn btn-default btn-primary" >Limpiar </button>
<button type="submit" class="btn btn-default btn-primary" name="enviar2" >Agendar Cita </button>