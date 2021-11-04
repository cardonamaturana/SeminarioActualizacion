<?php



abstract class ValidadorPaciente{
     
    protected $aviso_inicio;
    protected $aviso_cierre;
    
    protected $nombre;
    protected $apellido;
    protected $id;
    protected $direccion;
    protected $telefono;
    protected $correo;
    protected $descripcion;
    
    protected $error_nombre;
    protected $error_apellido;
    protected $error_id;
    protected $error_direccion;
    protected $error_telefono;
    protected $error_correo;
    protected $error_descripcion;
    
    function __construct (){
        
    }
    
    protected function variable_iniciada($variable){
        if(isset($variable) && !empty($variable)){
            return true;
        }else{
            return false;
        }
    }
    
    protected function validar_nombre($nombre){
        if(!$this -> variable_iniciada($nombre)){
            return "Debes escribir un nombre.";
        } else{
            $this -> nombre = $nombre;
        }
        return "";
    }
    
    protected function validar_apellido($apellido){
        if(!$this -> variable_iniciada($apellido)){
            return "Debes escribir un apellido.";
        } else{
            $this -> apellido = $apellido;
        }
        return "";
    }
    
    protected function validar_id($conexion,$id){
        if(!$this -> variable_iniciada($id)){
            return "Debes escribir una Identificacion.";
        } else{
            $this -> id = $id;
        }
        if(Paciente :: id_existe($conexion,$id)){
            return "Este Id ya existe, Porfavor escriba otro.";
            
        }
        return "";
    }
    
    protected function validar_direccion($direccion){
        if(!$this -> variable_iniciada($direccion)){
            return "Debes escribir una direccion.";
        } else{
            $this -> direccion = $direccion;
        }
        
        return "";
    }
    
    protected function validar_telefono($telefono){
        if(!$this -> variable_iniciada($telefono)){
            return "Debes escribir un telefono.";
        } else{
            $this -> telefono = $telefono;
        }
        return "";
    }
    
    protected function validar_correo($conexion, $correo){
        if(!$this -> variable_iniciada($correo)){
            return "Debes escribir un correo electronico.";
        } else{
            $this -> correo = $correo;
        }
        if(Paciente :: correo_existe($conexion,$correo)){
            return "Este correo ya esta en uso, Porfavor escriba otro.";
            
        }
        return "";
    }
    
    protected function validar_descripcion($descripcion){
        if(!$this -> variable_iniciada($descripcion)){
            return "Debes escribir una descripcion del procedimiento que desea el paciente.";
        } else{
            $this -> descripcion = $descripcion;
        }
        return "";
    }
    
    public function getNombre() {
        return $this->nombre;
    }

   public function getApellido() {
        return $this->apellido;
    }

   public function getId() {
        return $this->id;
    }

   public function getDireccion() {
        return $this->direccion;
    }

   public function getTelefono() {
        return $this->telefono;
    }

   public function getCorreo() {
        return $this->correo;
    }

   public function getDescripcion() {
        return $this->descripcion;
    }

   public function getError_nombre() {
        return $this->error_nombre;
    }

   public function getError_apellido() {
        return $this->error_apellido;
    }

   public function getError_id() {
        return $this->error_id;
    }

   public function getError_direccion() {
        return $this->error_direccion;
    }

   public function getError_telefono() {
        return $this->error_telefono;
    }

   public function getError_correo() {
        return $this->error_correo;
    }

   public function getError_descripcion() {
        return $this->error_descripcion;
    }

    public function mostrar_nombre(){
        if($this -> nombre !== ""){
            echo 'value=" '. $this -> nombre .'"';
        }
    }
    
    public function mostrar_error_nombre(){
        if($this -> error_nombre !== "" ){
            echo $this -> aviso_inicio . $this -> error_nombre . $this -> aviso_cierre;
        }
    }

    public function mostrar_apellido(){
        if($this -> apellido !== ""){
            echo 'value=" '. $this -> apellido .'"';
        }
    }
    
    public function mostrar_error_apellido(){
        if($this -> error_apellido !== "" ){
            echo $this -> aviso_inicio . $this -> error_apellido . $this -> aviso_cierre;
        }
    }
    
    public function mostrar_id(){
        if($this -> id !== ""){
            echo 'value=" '. $this -> id .'"';
        }
    }
    
    public function mostrar_error_id(){
        if($this -> error_id !== "" ){
            echo $this -> aviso_inicio . $this -> error_id . $this -> aviso_cierre;
        }
    }
    
    public function mostrar_direccion(){
        if($this -> direccion !== ""){
            echo 'value=" '. $this -> direccion .'"';
        }
    }
    
    public function mostrar_error_direccion(){
        if($this -> error_direccion !== "" ){
            echo $this -> aviso_inicio . $this -> error_direccion . $this -> aviso_cierre;
        }
    }
    
    public function mostrar_telefono(){
        if($this -> telefono !== ""){
            echo 'value=" '. $this -> telefono .'"';
        }
    }
    
    public function mostrar_error_telefono(){
        if($this -> error_telefono !== "" ){
            echo $this -> aviso_inicio . $this -> error_telefono . $this -> aviso_cierre;
        }
    }
    
    public function mostrar_correo(){
        if($this -> correo !== ""){
            echo 'value=" '. $this -> correo .'"';
        }
    }
    
    public function mostrar_error_correo(){
        if($this -> error_correo !== "" ){
            echo $this -> aviso_inicio . $this -> error_correo . $this -> aviso_cierre;
        }
    }
    
    public function mostrar_descripcion(){
        if($this -> descripcion !== ""){
            echo $this -> descripcion;
        }
    }
    
    public function mostrar_error_descripcion(){
        if($this -> error_descripcion !== "" ){
            echo $this -> aviso_inicio . $this -> error_descripcion . $this -> aviso_cierre;
        }
    }
    
    public function registro_valido(){
        if($this -> error_nombre === "" &&
                $this -> error_apellido === "" &&
                $this -> error_id === "" &&
                $this -> error_direccion === "" &&
                $this -> error_telefono === "" && 
                $this -> error_correo === "" && 
                $this -> error_descripcion === "" ){
            return true;
        }else{
            return false;
        }
    }
    
}