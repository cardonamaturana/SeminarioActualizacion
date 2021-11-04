<?php

include_once 'Cita.inc.php';
include_once 'ValidadorCitaPadre.inc.php';

class ValidadorCitaModificada extends ValidadorCitaPadre {
    
    
    private $cambios_realizados;
   
    
    private $fecha_original;
    private $ncita_original;
    private $id_paciente_original;
    private $valoracion_original;
    
    public function __construct($fecha, $fecha_original, $ncita, $ncita_original, $id_paciente, $id_paciente_original, $valoracion, $valoracion_original, $conexion) {

        $this->fecha = $this->devolver_variable_si_iniciada($fecha);
        $this->ncita = $this->devolver_variable_si_iniciada($ncita);
        $this->id_paciente = $this->devolver_variable_si_iniciada($id_paciente);
        $this->valoracion = $this->devolver_variable_si_iniciada($valoracion);
    
        
        $this->fecha_original = $this->devolver_variable_si_iniciada($fecha_original);
        $this->ncita_original = $this->devolver_variable_si_iniciada($ncita_original);
        $this->id_paciente_original = $this->devolver_variable_si_iniciada($id_paciente_original);
        $this->valoracion_original = $this->devolver_variable_si_iniciada($valoracion_original);
        
      
        if ($this->fecha == $this->fecha_original &&
                $this->ncita == $this->ncita_original &&
                $this->id_paciente == $this->id_paciente_original &&
                $this->valoracion == $this->valoracion_original 
        ) {
            $this->cambios_realizados = false;
        } else {
            $this->cambios_realizados = true;
        }

        if ($this->cambios_realizados) {
            

            $this->aviso_inicio = "<br> <div class= 'alert alert-danger' role='alert'>";
            $this->aviso_cierre = " </div>";
            
            if($this -> fecha !== $this -> fecha_original){
                $this -> error_fecha = $this -> validar_fecha($this -> fecha);
            }else {
                $this -> error_fecha = "";
            }
            
            if($this -> ncita !== $this -> ncita_original){
                $this -> error_ncita = $this -> validar_ncita($conexion, $this -> ncita);
            }else {
                $this -> error_ncita = "";
            }
            
            if($this -> id_paciente !== $this -> id_paciente_original){
                $this -> error_id_paciente = $this -> validar_id_paciente($conexion, $this -> id_paciente);
            }else {
                $this -> error_id_paciente = "";
            }
            
            if($this -> valoracion !== $this -> valoracion_original){
                $this -> error_valoracion = $this -> validar_valoracion($this -> valoracion);
            }else {
                $this -> error_valoracion = "";
            }
            
         
        } else {
            echo 'NO hay cambios.';
            //redirigir
        }
    }
 
    
    private function devolver_variable_si_iniciada($variable) {
        if ($this->variable_iniciada($variable)) {
            return $variable;
        } else {
            return "";
        }
    }

    
    public function hay_cambios(){
        return $this -> cambios_realizados;
    }
    
    
    public function getFecha_original() {
        return $this->fecha_original;
    }

    public function getNcita_original() {
        return $this->ncita_original;
    }

    public function getId_paciente_original() {
        return $this->id_paciente_original;
    }

    public function getValoracion_original() {
        return $this->valoracion_original;
    }


    
    
    
}