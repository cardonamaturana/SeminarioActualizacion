<?php
include_once 'Usuario.inc.php';

class ValidadorLogin{
    
    private $usuario;
    private $error;
    
    public function __construct($id, $clave, $conexion){
        $this -> error="";
        
        if(!$this -> variable_iniciada($id)|| !$this -> variable_iniciada($clave)){
            $this -> usuario = null;
            $this -> error = "Debes Introducir tu Id y tu Contraseña";
            
        }else{
            $this -> usuario = Usuario :: obtener_usuario_por_id($conexion, $id, $clave);
            
            if(is_null($this -> usuario) ){
                
                $this -> error = "Datos Incorrectos";
                              
            }
        }
    }
    private function variable_iniciada($variable){
        if(isset($variable) && !empty($variable)){
            return true;
        }else{
            return false;
        }
    }
    
    public function obtener_usuario(){
        return $this -> usuario;
        
    }
    public function obtener_error(){
        return $this -> error;
    }
    public function mostrar_error(){
        if($this -> error !== ''){
            echo "<br><div class= 'alert alert-danger' role='alert'>";
            echo $this -> error;
            echo "</div><br>";
        }
    }
    
}