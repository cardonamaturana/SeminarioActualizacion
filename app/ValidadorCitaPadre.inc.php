<?php

abstract class ValidadorCitaPadre{
    
    
    protected $aviso_inicio;
    protected $aviso_cierre;
    
    protected $fecha;
    protected $ncita;
    protected $id_paciente;
    protected $valoracion;
   
    
   protected $error_fecha;
    protected $error_ncita;
    protected $error_ncita_no_existe;
   protected $error_id_paciente;
    protected $error_valoracion;
    
    function __construct(){
        
    }
    
    protected function variable_iniciada($variable){
        if(isset($variable) && !empty($variable)){
            return true;
        }else{
            return false;
        }
    }
    
    protected function validar_fecha($fecha){
        if(!$this -> variable_iniciada($fecha)){
            return "Debes poner una fecha.";
        } else{
            $this -> fecha = $fecha;
        }
        return "";
    }
    
    protected function validar_ncita($conexion, $ncita){
        
        if(!$this -> variable_iniciada($ncita)){
            return "Debes escribir un numero de cita.";
        } else{
            $this -> ncita = $ncita;
        }
        if(Cita :: ncita_existe($conexion,$ncita)){
            return "Este Numero de cita ya existe, Porfavor escriba otro.";
            
        }
        return "";
    }
   protected function validar_ncita_no_existe($conexion, $ncita){
        
        if(!$this -> variable_iniciada($ncita)){
            return "Debes escribir un numero de cita.";
        } else{
            $this -> ncita = $ncita;
        }
        if(Cita :: ncita_no_existe($conexion,$ncita)){
            return "Este Numero de cita No existe, Porfavor verifique!.";
            
        }
        return "";
    }
    
    
    protected function validar_id_paciente($conexion, $id_paciente){
        if(!$this -> variable_iniciada($id_paciente)){
            return "Debes escribir una Identificacion.";
        } else{
            $this -> id_paciente = $id_paciente;
        }
        if(Cita :: paciente_existe($conexion,$id_paciente)){
            return "Este Numero de id no existe.Es posible que no este registrado el paciente, Porfavor verifique.";
            
        }
        
        return "";
    }
    
    protected function validar_valoracion($valoracion){
        if(!$this -> variable_iniciada($valoracion)){
            return "Debes escribir una valoracion.";
        } else{
            $this -> valoracion = $valoracion;
        }
        
        return "";
    }
    function getAviso_inicio() {
        return $this->aviso_inicio;
    }

    function getAviso_cierre() {
        return $this->aviso_cierre;
    }

    function getFecha() {
        return $this->fecha;
    }

    function getNcita() {
        return $this->ncita;
    }

    function getId_paciente() {
        return $this->id_paciente;
    }

    function getValoracion() {
        return $this->valoracion;
    }

    function getError_fecha() {
        return $this->error_fecha;
    }

    function getError_ncita() {
        return $this->error_ncita;
    }
    
    function getError_ncita_no_existe() {
        return $this->error_ncita_no_existe;
    }

    function getError_id_paciente() {
        return $this->error_id_paciente;
    }

    function getError_valoracion() {
        return $this->error_valoracion;
    }
    
    public function mostrar_fecha(){
        if($this -> fecha !== ""){
            echo 'value=" '. $this -> fecha .'"';
        }
    }
    
    public function mostrar_error_fecha(){
        if($this -> error_fecha !== "" ){
            echo $this -> aviso_inicio . $this -> error_fecha . $this -> aviso_cierre;
        }
    }

    public function mostrar_ncita(){
        if($this -> ncita !== ""){
            echo 'value=" '. $this -> ncita .'"';
        }
    }
    
    public function mostrar_error_ncita(){
        if($this -> error_ncita !== "" ){
            echo $this -> aviso_inicio . $this -> error_ncita . $this -> aviso_cierre;
        }
    }
    
      
    public function mostrar_error_ncita_no_existe(){
        if($this -> error_ncita_no_existe !== "" ){
            echo $this -> aviso_inicio . $this -> error_ncita_no_existe . $this -> aviso_cierre;
        }
    }
    
    public function mostrar_id_paciente(){
        if($this -> id_paciente !== ""){
            echo 'value=" '. $this -> id_paciente .'"';
        }
    }
    
    public function mostrar_error_id_paciente(){
        if($this -> error_id_paciente !== "" ){
            echo $this -> aviso_inicio . $this -> error_id_paciente . $this -> aviso_cierre;
        }
    }
    
    public function mostrar_valoracion(){
        if($this -> valoracion !== ""){
            echo 'value=" '. $this -> valoracion .'"';
        }
    }
    
    public function mostrar_error_valoracion(){
        if($this -> error_valoracion !== "" ){
            echo $this -> aviso_inicio . $this -> error_valoracion . $this -> aviso_cierre;
        }
    }
    
    
    
    
    
    public function agendar_valido(){
        if($this -> error_fecha === "" &&
                $this -> error_ncita === "" &&
                $this -> error_id_paciente === "" &&
                $this -> error_valoracion === ""){
            return true;
        }else{
            return false;
        }
    }
    
    
    
    
    
}