<?php

include_once 'Paciente.inc.php';
include_once 'ValidadorPaciente.inc.php';

class ValidadorPacienteActualizado extends ValidadorPaciente {

    private $cambios_realizados;
   
    
    private $nombre_original;
    private $apellido_original;
    private $id_original;
    private $direccion_original;
    private $telefono_original;
    private $correo_original;
    private $descripcion_original;

    public function __construct($nombre, $nombre_original, $apellido, $apellido_original, $id, $id_original, $direccion, $direccion_original, $telefono, $telefono_original, $correo, $correo_original, $descripcion, $descripcion_original, $conexion) {

        $this->nombre = $this->devolver_variable_si_iniciada($nombre);
        $this->apellido = $this->devolver_variable_si_iniciada($apellido);
        $this->id = $this->devolver_variable_si_iniciada($id);
        $this->direccion = $this->devolver_variable_si_iniciada($direccion);
        $this->telefono = $this->devolver_variable_si_iniciada($telefono);
        $this->correo = $this->devolver_variable_si_iniciada($correo);
        $this->descripcion = $this->devolver_variable_si_iniciada($descripcion);

        $this->nombre_original = $this->devolver_variable_si_iniciada($nombre_original);
        $this->apellido_original = $this->devolver_variable_si_iniciada($apellido_original);
        $this->id_original = $this->devolver_variable_si_iniciada($id_original);
        $this->direccion_original = $this->devolver_variable_si_iniciada($direccion_original);
        $this->telefono_original = $this->devolver_variable_si_iniciada($telefono_original);
        $this->correo_original = $this->devolver_variable_si_iniciada($correo_original);
        $this->descripcion_original = $this->devolver_variable_si_iniciada($descripcion_original);

        if ($this->nombre == $this->nombre_original &&
                $this->apellido == $this->apellido_original &&
                $this->id == $this->id_original &&
                $this->direccion == $this->direccion_original &&
                $this->telefono == $this->telefono_original &&
                $this->correo == $this->correo_original &&
                $this->descripcion == $this->descripcion_original
        ) {
            $this->cambios_realizados = false;
        } else {
            $this->cambios_realizados = true;
        }

        if ($this->cambios_realizados) {
            

            $this->aviso_inicio = "<br> <div class= 'alert alert-danger' role='alert'>";
            $this->aviso_cierre = " </div>";
            
            if($this -> nombre !== $this -> nombre_original){
                $this -> error_nombre = $this -> validar_nombre($this -> nombre);
            }else {
                $this -> error_nombre = "";
            }
            
            if($this -> apellido !== $this -> apellido_original){
                $this -> error_apellido = $this -> validar_apellido($this -> apellido);
            }else {
                $this -> error_apellido = "";
            }
            
            if($this -> id !== $this -> id_original){
                $this -> error_id = $this -> validar_id($conexion, $this -> id);
            }else {
                $this -> error_id = "";
            }
            
            if($this -> direccion !== $this -> direccion_original){
                $this -> error_direccion = $this -> validar_direccion($this -> direccion);
            }else {
                $this -> error_direccion = "";
            }
            
            if($this -> telefono !== $this -> telefono_original){
                $this -> error_telefono = $this -> validar_telefono($this -> telefono);
            }else {
                $this -> error_telefono = "";
            }
            
            if($this -> correo !== $this -> correo_original){
                $this -> error_correo = $this -> validar_correo($conexion ,$this -> correo);
            }else {
                $this -> error_correo = "";
            }
            
            if($this -> descripcion !== $this -> descripcion_original){
                $this -> error_descripcion = $this -> validar_descripcion($this -> descripcion);
            }else {
                $this -> error_descripcion = "";
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
    
    
    public function getNombre_original() {
        return $this->nombre_original;
    }

    public function getApellido_original() {
        return $this->apellido_original;
    }

    public function getId_original() {
        return $this->id_original;
    }

    public function getDireccion_original() {
        return $this->direccion_original;
    }

    public function getTelefono_original() {
        return $this->telefono_original;
    }

    public function getCorreo_original() {
        return $this->correo_original;
    }

    public function getDescripcion_original() {
        return $this->descripcion_original;
    }


    
    
}
