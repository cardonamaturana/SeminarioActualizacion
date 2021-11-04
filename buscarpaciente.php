<?php
include_once 'app/config.inc.php';
include_once 'app/Conexion.inc.php';
include_once 'app/Paciente.inc.php';
include_once 'app/Cita.inc.php';
include_once 'app/Paciente.inc.php';
include_once 'app/Redireccion.inc.php';
include_once 'app/ControlSesion.inc.php';
include_once 'app/ValidadorCita.inc.php';




if (ControlSesion :: sesion_iniciada()) {
    
} else {
    Redireccion::redirigir(RUTA_LOGIN);
}


if (isset($_POST ['buscar'])) {
    Conexion :: abrir_conexion();

   $validador = new ValidadorCita(
            '', '', $_POST['id_paciente'], '', Conexion :: obtener_conexion());

    $paciente = Paciente :: obtener_paciente_por_id(Conexion::obtener_conexion(), $validador->getId_paciente());
    $citas = Cita :: mostrar_citas_paciente(Conexion:: obtener_conexion(), $validador->getId_paciente());
   
    
}

if (isset($_POST ['eliminar'])) {
    
    Conexion :: abrir_conexion();

    $validador = new ValidadorCita(
            '', '', $_POST['id_paciente'], '', Conexion :: obtener_conexion());
 
   $paciente = Paciente :: obtener_paciente_por_id(Conexion::obtener_conexion(), $validador->getId_paciente());
   
   $paciente_eliminado = Paciente :: eliminar_paciente(Conexion :: obtener_conexion(), $validador->getId_paciente());
        
if($paciente){
    Redireccion::redirigir(RUTA_PACIENTE_ELIMINADO);
    //paciente eliminado con sus citas.
    
}
}


$titulo = 'BUSCAR PACIENTE';

include_once 'plantillas/documento-declaracion.inc.php';
include_once 'plantillas/navbar.inc.php';
?> 

<div class="container">
    <div class=" jumbotron">
        <h1 class="text-center">BUSCAR PACIENTE</h1>
    </div>
</div>

<div class =" container">
    <div class="row">
        <div class="col-md-1"></div>
        <div class=" col-md-10">
            <div class="panel panel-default">
                <div class="panel-heading text-center">
                    <h3 class="panel-title">
                        <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
                        BUSCAR AL PACIENTE POR SU IDENTIFICACION.
                    </h3>
                </div>
                <div class="panel-body text-center">
                    <form role="form" method="post" action="<?php echo $_SERVER ['PHP_SELF'] ?>">

                        <?php
                        if (isset($_POST['buscar'])) {
                            include_once 'plantillas/buscarvalidado.inc.php';
                        } else if (isset($_POST['eliminar'])) {
                            include_once 'plantillas/buscarvalidado.inc.php';
                        }
                        else {
                            include_once 'plantillas/buscarvacio.inc.php';
                        }
                         
                        ?>    

                    </form>
                    
                </div>
                <?php
                if (isset($_POST ['buscar'])) {
                    if ($paciente) {
                        ?>

                        <div class="row">
                            <div class="col-md-2"></div>
                            <div class="col-md-4">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <label>Nombre y Apellido:</label>
                                        <?php 
                                        echo $paciente->getNombre() . ' ' . $paciente->getApellido();
                                        ?>
                                    </div>
                                    <div class="panel-body">
                                        <p>
                                            <strong>
                                                <label>Identificacion:</label>
                                                <?php
                                                echo $paciente->getId();
                                                ?>
                                            </strong>
                                        </p>
                                        <p>
                                            <strong>
                                                <label>Direccion:</label>
                                                <?php
                                                echo $paciente->getDireccion();
                                                ?>
                                            </strong>
                                        </p>
                                        <p>
                                            <strong>
                                                <label>Telefono:</label>
                                                <?php
                                                echo $paciente->getTelefono();
                                                ?>
                                            </strong>
                                        </p>
                                        <p>
                                            <strong>
                                                <label>Correo:</label>
                                                <?php
                                                echo $paciente->getCorreo();
                                                ?>
                                            </strong>
                                        </p>
                                        <p>
                                            <strong>
                                                <label>Descripcion:</label>
                                                <?php
                                                echo nl2br($paciente->getDescripcion());
                                                ?>
                                            </strong>
                                        </p>
                                        <td>
                                            <form method="post" action="<?php echo RUTA_ACTUALIZAR_PACIENTE  ?>">
                                                <input type="hidden" name="id_editar"
                                                       value="<?php echo $paciente -> getId();  ?>">
                                                <button type="submit" class="btn btn-default btn-primary" 
                                                        name="actualizar"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Actualizar Paciente</button>
                                                    
                                              
                                            </form>
                                            
                                            
                                        </td>
                                          


                                    </div>
                                </div>
                            </div>
                            <?php
                        if (count($citas) > 0) {
                            include_once 'plantillas/citas_paciente.inc.php';
                        } else {
                            echo '<p>Todavia no hay citas!! </p>';
                        }
                        ?>

                        </div>
                        <br>
                       
                        <br>
                       



        <?php
    }
}
?>
            </div>            
        </div>
    </div>
</div>

<?php
include_once 'plantillas/documento-cierre.inc.php';
?>