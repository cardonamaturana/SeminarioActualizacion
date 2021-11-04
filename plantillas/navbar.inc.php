<?php

include_once 'app/ControlSesion.inc.php';
include_once 'app/config.inc.php';
include_once 'app/Conexion.inc.php';
include_once 'app/Paciente.inc.php';

Conexion :: abrir_conexion();


?>
<nav class="navbar navbar-default navbar-static-top">
    <div class="container">
        <div class="navbar-header">
        
            <a class="navbar-brand" href="<?php echo RUTA_INICIO ?>">SIGEODONT</a>

        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li><a href="<?php echo RUTA_REGISTRO ?>">Registrar Paciente </a> </li>
                <li><a href="<?php echo RUTA_BUSCAR_PACIENTE ?>">Buscar Paciente </a> </li>
                
                
                <li><a href="">Agendar Cita </a> </li>
                <li><a href="">Validar Cita </a> </li>
                
            </ul>
            <ul class="nav navbar-nav navbar-right">
                
                <?php
                if(ControlSesion::sesion_iniciada()){
                ?>
                <li>
                    <a href="#">
                        <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                        <?php echo '' . $_SESSION['tipo_usuario'];  ?>
                    </a>
                </li>
                <?php  if( 'administrador' === $_SESSION['tipo_usuario'])  {?>
                <li> 
                    <a href="<?php echo RUTA_ENVIAR_PUBLICIDAD ?>">
                       <i class="fa fa-envelope" aria-hidden="true"></i> Envio de Publicidad 
                    </a>
     
                        <?php 
                                                   
                        }
                        ?>
                        
                        <?php  if( 'asistente' === $_SESSION['tipo_usuario'])  {?>
                
                        <li><a href="<?php echo RUTA_INICIO ?>"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> Inicio </a> </li>
                        
                        <?php 
                                                   
                        }
                        ?>
                        
                    
                </li>
                <li>
                    <a href="<?php echo RUTA_LOGOUT ?>">
                        <span class="glyphicon glyphicon-log-out" aria-hidden="true"></span> Cerrar Sesion
                    </a>
                </li>
                
                <?php                                  
                }else{
                 ?>
                    
                
                    
                    
                  <?php
                }
                ?>
                
              

            </ul>
        </div>

    </div>
</nav>

