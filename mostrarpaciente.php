<?php
include_once 'app/config.inc.php';
include_once 'app/Conexion.inc.php';
include_once 'app/Paciente.inc.php';
include_once 'app/Redireccion.inc.php';

$titulo = 'Busqueda del paciente';
include_once 'app/ControlSesion.inc.php';




if (ControlSesion :: sesion_iniciada()){
    
}else {
    Redireccion::redirigir(RUTA_LOGIN);
}

include_once 'plantillas/documento-declaracion.inc.php';
include_once 'plantillas/navbar.inc.php';


?>


<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <?php
                echo $paciente->getNombre();
                ?>
            </div>
            <div class="panel-body">
                <p>
                    <strong>
                        <?php
                        echo $paciente->getId();
                        ?>
                    </strong>
                </p>
                <p>
                    <strong>
                        <?php
                        echo $paciente->getDireccion();
                        ?>
                    </strong>
                </p>
                <p>
                    <strong>
                        <?php
                        echo $paciente->getTelefono();
                        ?>
                    </strong>
                </p>
                <p>
                    <strong>
                        <?php
                        echo $paciente->getCorreo();
                        ?>
                    </strong>
                </p>
                <p>
                    <strong>
                        <?php
                        echo nl2br($paciente->getDescripcion());
                        ?>
                    </strong>
                </p>


            </div>
        </div>
    </div>


</div>