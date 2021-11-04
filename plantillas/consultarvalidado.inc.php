<div class="panel panel-default">

    <div class="panel-body">
        <div class="form-group">
            <input type="text" class="form-control" name="ncita" placeholder="Escriba el Numero de cita a Consultar">

            <?php
            $validador->mostrar_error_ncita_no_existe();
            ?>
        </div>
        <button type="submit" class="btn btn-default btn-primary" name="consultar" ><i class="fa fa-search" aria-hidden="true"></i> Consultar Cita</button>
        <button type="submit" class="btn btn-default btn-primary" name="eliminar" ><i class="fa fa-user-times" aria-hidden="true"></i> Eliminar Cita </button>
        
    </div>
</div>