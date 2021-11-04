<?php

include_once 'Paciente.inc.php';
include_once 'ValidadorPaciente.inc.php';

class ValidadorRegistro extends ValidadorPaciente{
    
    
    
    public function __construct($nombre, $apellido, $id, $direccion, $telefono, $correo, $descripcion, $conexion){
        $this -> aviso_inicio ="<br> <div class= 'alert alert-danger' role='alert'>";
        $this -> aviso_cierre =" </div>"; 
        
        $this ->nombre = "";
        $this ->apellido = "";
        $this ->id = "";
        $this ->direccion = "";
        $this ->telefono = "";
        $this ->correo = "";
        $this ->descripcion = "";
        
        $this -> error_nombre = $this -> validar_nombre($nombre);
        $this -> error_apellido = $this -> validar_apellido($apellido);
        $this -> error_id = $this -> validar_id($conexion,$id);
        $this -> error_direccion = $this -> validar_direccion($direccion);
        $this -> error_telefono = $this -> validar_telefono($telefono);
        $this -> error_correo = $this -> validar_correo($conexion, $correo);
        $this -> error_descripcion = $this -> validar_descripcion($descripcion);
        
    }
    
    
    
}