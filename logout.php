<?php

include_once 'app/config.inc.php';
include_once 'app/Conexion.inc.php';
include_once 'app/Paciente.inc.php';
include_once 'app/ValidadorLogin.inc.php';
include_once 'app/Usuario.inc.php';
include_once 'app/Usuario.inc.php';
include_once 'app/Redireccion.inc.php';
include_once 'app/ControlSesion.inc.php';



    Conexion :: abrir_conexion();
    
    ControlSesion :: cerrar_sesion();
    
   
    Conexion :: cerrar_conexion();

$titulo = 'Cerrar Sesion';
if(ControlSesion :: sesion_iniciada()){
    echo 'no';
}else{
    Redireccion::redirigir(RUTA_LOGIN);
}


?>
