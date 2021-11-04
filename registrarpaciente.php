<?php
include_once 'app/config.inc.php';
include_once 'app/Conexion.inc.php';
include_once 'app/Paciente.inc.php';
include_once 'app/Paciente.inc.php';
include_once 'app/ValidadorRegistro.inc.php';
include_once 'app/Redireccion.inc.php';

include_once 'app/ControlSesion.inc.php';




if (ControlSesion :: sesion_iniciada()){
    
}else {
    Redireccion::redirigir(RUTA_LOGIN);
}

if (isset($_POST ['enviar'])) {
    Conexion :: abrir_conexion();
    
    $validador = new ValidadorRegistro($_POST['nombre'], $_POST['apellido'], $_POST['id'], $_POST['direccion'], $_POST['telefono'], $_POST['correo'],htmlspecialchars($_POST['descripcion']), Conexion :: obtener_conexion());
        
    if ($validador->registro_valido()) {
        $paciente = new Paciente($validador->getNombre(), $validador->getApellido(), $validador->getId(), $validador->getDireccion(), $validador->getTelefono(), $validador->getCorreo(), $validador->getDescripcion());
        
        $paciente_insertado = Paciente ::guardarpaciente(Conexion :: obtener_conexion(), $paciente);
        
        if($paciente_insertado){
            
            Redireccion::redirigir(RUTA_REGISTRO_CORRECTO . '?nombre=' . $paciente -> getNombre());
            
        }
    }
    Conexion :: cerrar_conexion();
}



$titulo = 'REGISTRAR PACIENTE';

include_once 'plantillas/documento-declaracion.inc.php';
include_once 'plantillas/navbar.inc.php';
?> 

<div class="container">
    <div class=" jumbotron">
        <h1 class="text-center">REGISTRAR PACIENTE</h1>
    </div>
</div>

<div class =" container">
    <div class="row">
        <div class=" col-md-3"></div>
            
        <div class=" col-md-6 text-center">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        Introduce los datos del paciente.
                    </h3>
                </div>
                <div class="panel-body">
                    <form role="form" method="post" action="<?php echo $_SERVER ['PHP_SELF'] ?>">
<?php
if (isset($_POST['enviar'])) {
    include_once 'plantillas/registropacientevalidado.inc.php';
} else {
    include_once 'plantillas/registropacientevacio.inc.php';
}
?>

                    </form>
                </div>
            </div>            
        </div>
        <div class=" col-md-3"></div>
    </div>
</div>


<?php
include_once 'plantillas/documento-cierre.inc.php';
?>