<div class="panel panel-default">

    <div class="panel-body">
        <div class="form-group">
            <input type="text" class="form-control" name="id_paciente" placeholder="Escriba la Id del paciente a Buscar">
            
            <?php
            $validador->mostrar_error_id_paciente();
            
            ?>
        </div>
        <button type="submit" class="btn btn-default btn-primary" name="buscar" ><i class="fa fa-search" aria-hidden="true"></i> Buscar Paciente</button>
        <button type="submit" class="btn btn-default btn-primary" name="eliminar" ><i class="fa fa-user-times" aria-hidden="true"></i> Eliminar Paciente </button>
        
    </div>
</div>