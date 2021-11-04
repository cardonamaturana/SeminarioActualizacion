<?php
include_once 'app/config.inc.php';
include_once 'app/Conexion.inc.php';
include_once 'app/Paciente.inc.php';
include_once 'app/Paciente.inc.php';
include_once 'app/ValidadorRegistro.inc.php';
include_once 'app/Redireccion.inc.php';
include_once 'app/ValidadorPacienteActualizado.inc.php';

include_once 'app/ControlSesion.inc.php';

Conexion :: abrir_conexion();

if(isset($_POST['actualizar_paciente'])){
    $validador = new ValidadorPacienteActualizado($_POST['nombre'],$_POST['nombre-original'],
            $_POST['apellido'],$_POST['apellido-original'], '', '',
            $_POST['direccion'],$_POST['direccion-original'],$_POST['telefono'],$_POST['telefono-original'],
            $_POST['correo'],$_POST['correo-original'],htmlspecialchars($_POST['descripcion']),
            $_POST['descripcion-original'], Conexion ::obtener_conexion());
    
    //editar cambios en la base de datos.
    if(!$validador -> hay_cambios()){
        Redireccion :: redirigir(RUTA_INICIO);
    }else{
        if($validador -> registro_valido()){
            $cambio_efectuado = Paciente :: actualizar_paciente(Conexion::obtener_conexion(),
                    $_POST['id-paciente'], $validador -> getNombre(), $validador -> getApellido(),
                    $validador -> getDireccion(), $validador -> getTelefono(), $validador -> getCorreo(),
                    $validador -> getDescripcion());
            if($cambio_efectuado){
               
               Redireccion :: redirigir(RUTA_BUSCAR_PACIENTE);
            }
        }
    }
    
}

$titulo = "Actualizar Paciente";

include_once 'plantillas/documento-declaracion.inc.php';
include_once 'plantillas/navbar.inc.php';
?> 

<div class="container">
    <div class=" jumbotron">
        <h1 class="text-center">ACTUALIZAR PACIENTE</h1>
    </div>
</div>


<div class =" container">
    <div class="row">
        <div class=" col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        Actualiza los datos del paciente.
                    </h3>
                </div>
                <div class="panel-body">

            <form role="form" method="post" action="<?php echo RUTA_ACTUALIZAR_PACIENTE ?>">
                <?php
                if(isset($_POST['actualizar'])){
                    $id_paciente = $_POST['id_editar'];
                    
                    
                    
                    $paciente_recuperado = Paciente :: obtener_paciente_por_id(
                            Conexion :: obtener_conexion(),$id_paciente);
                    
            include_once 'plantillas/form_paciente_recuperado.inc.php';
                    
                    Conexion::cerrar_conexion();
                    
                } else if(isset($_POST['actualizar_paciente'])){
                    $id_paciente = $_POST['id-paciente'];
                    
                    $paciente_recuperado = Paciente :: obtener_paciente_por_id(
                            Conexion :: obtener_conexion(),$id_paciente);
                    
                    include_once 'plantillas/form_paciente_recuperado_validado.inc.php';
                  
                }
                ?>
            </form>

  </div>
            </div>  
        </div>
    </div>
</div>






<?php
include_once 'plantillas/documento-cierre.inc.php';
?>