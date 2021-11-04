<?php
include_once 'app/config.inc.php';
include_once 'app/Conexion.inc.php';
include_once 'app/Paciente.inc.php';
include_once 'app/Redireccion.inc.php';
include_once 'app/ControlSesion.inc.php';


if(ControlSesion :: sesion_iniciada()){
    Redireccion::redirigir(RUTA_INICIO);
} 

$titulo = 'SIGEODONnT';

include_once 'plantillas/documento-declaracion.inc.php';
?> 


<nav class="navbar navbar-default navbar-static-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar" >
                <span class="sr-only">Este boton cambia la barra de navegaciòn

                </span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>

            </button>
            <a class="navbar-brand" href="#">SIGEODONT</a>

        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">

            </ul>
            <ul class="nav navbar-nav navbar-right">

                <li><a href="<?php echo RUTA_LOGIN ?>"><span class="glyphicon glyphicon-log-in" aria-hidden="true"></span> Iniciar Sesion </a> </li>

            </ul>
        </div>

    </div>
</nav>



<div class="container">
    <div class="jumbotron text-center">
        <h1> SISTEMA DE GESTION ODONTOLOGICA (SIGEODONT)</h1>
    </div>
</div>


  

    <script arc="js/jquery.min.js"></script>
    <script arc="js/bootstrap.min.js"></script>




</html>


<?php
include_once 'plantillas/documento-cierre.inc.php';
?>