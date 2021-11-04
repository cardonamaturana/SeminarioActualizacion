<?php

include_once 'app/Conexion.inc.php';
include_once 'app/Paciente.inc.php';
include_once 'app/ControlSesion.inc.php';
include_once 'app/Redireccion.inc.php';
include_once 'app/config.inc.php';

$titulo = 'SIGEODONT';
if (ControlSesion :: sesion_iniciada()){
    
}else {
    Conexion::cerrar_conexion;
    Redireccion::redirigir(RUTA_LOGIN);
}
    
include_once 'plantillas/documento-declaracion.inc.php';
include_once 'plantillas/navbar.inc.php';


?> 


<div class="container">
    <div class="jumbotron text-center">
        <h1> SISTEMA DE GESTION ODONTOLOGICA (SIGEODONT)</h1>
        <p>
           
        </p>
    </div>

</div>


   


    <?php
    include_once 'plantillas/documento-cierre.inc.php';
    ?>
