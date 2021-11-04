<?php

include_once 'Cita.inc.php';
include_once 'ValidadorCitaPadre.inc.php';

class ValidadorCita extends ValidadorCitaPadre{
    
  

    
    public function __construct($fecha, $ncita, $id_paciente, $valoracion,  $conexion){
        $this -> aviso_inicio ="<br> <div class= 'alert alert-danger' role='alert'>";
        $this -> aviso_cierre =" </div>"; 
        
        $this ->fecha = "";
        $this ->ncita = "";
        $this ->id_paciente = "";
        $this ->valoracion = "";
    
        
        $this -> error_fecha = $this -> validar_fecha($fecha);
        $this -> error_ncita = $this -> validar_ncita($conexion, $ncita);
        $this -> error_ncita_no_existe = $this -> validar_ncita_no_existe($conexion, $ncita);
        $this -> error_id_paciente = $this -> validar_id_paciente($conexion, $id_paciente);
        $this -> error_valoracion = $this -> validar_valoracion($valoracion);
     
        
    }
    
    
    
}