<?php

include_once 'app/config.inc.php';
include_once 'app/Conexion.inc.php';
include_once 'app/Paciente.inc.php';
include_once 'app/ValidadorLogin.inc.php';
include_once 'app/Usuario.inc.php';
include_once 'app/Usuario.inc.php';
include_once 'app/Redireccion.inc.php';
include_once 'app/ControlSesion.inc.php';

if(ControlSesion :: sesion_iniciada()){
    //Redireccion::redirigir(RUTA_INICIO);
}

if(isset($_POST['login'])){
    Conexion :: abrir_conexion();
    
    $validador = new ValidadorLogin($_POST['id'],$_POST['clave'], Conexion::obtener_conexion());
    
    if($validador -> obtener_error() === ''
            && !is_null($validador -> obtener_usuario())){
       
        //Iniciar Sesion
        ControlSesion :: iniciar_sesion(
                $validador -> obtener_usuario() -> getId(),
                $validador -> obtener_usuario() -> getTipo());
        //redirigir a index
        Redireccion::redirigir(RUTA_INICIO);
       // echo 'Inicio de sesion ok';
    }else{
        echo 'Inicio de sesion fallo';
    }
    Conexion :: cerrar_conexion();
}
$titulo = 'Login Sigeodont';

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
            <a class="navbar-brand" href="<?php echo SERVIDOR;?>">SIGEODONT</a>

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
    <div class="row">
        <div class ="col-md-3">
            
        </div>
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading text-center">
                    <h4>Iniciar Sesion</h4>
                </div>
                <div class =" panel-body">
                    <form role="form" method="post" action ="<?php echo $_SERVER['PHP_SELF'] ?>">
                        <h2> Introduce tus datos </h2>
                        <br>
                        <label for="id" class="sr-only">Id </label>
                        <input type="text" name="id" id="id" class="form-control" placeholder="Id" 
                               <?php
                               if(isset($_POST['login']) && isset($_POST['id']) && !empty($_POST['id']) ){
                                   echo 'value"' . $_POST['id'] . '"';
                               }
                               ?>
                               required autofocus>
                        <br>
                        <label for="clave" class="sr-only">Contraseña </label>
                        <input type="password" name="clave" id="clave" class="form-control" placeholder="Clave" required>
                        <br>
                        <?php
                        if(isset($_POST['login'])){
                            $validador -> mostrar_error();
                        }
                        ?>
                        <button type="submit" name="login" class="btn btn-lg btn-primary btn-block">
                            Ingresar
                        </button>
                        
                    </form>
                    <br>
                    <br>
                    <div class="text-center">
                        <a href="<?php echo SERVIDOR ?>" > Volver</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>