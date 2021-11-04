<?php
 class Cita{
     
     private $fecha;
     private $ncita;
     private $id_paciente;
     private $valoracion;
     
     public function __construct ($fecha , $ncita, $id_paciente , $valoracion){
         
         $this -> fecha = $fecha;
         $this -> ncita = $ncita;
         $this -> id_paciente = $id_paciente;
         $this -> valoracion = $valoracion;
         
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

     function setFecha($fecha) {
         $this->fecha = $fecha;
     }

     function setNcita($ncita) {
         $this->ncita = $ncita;
     }

     function setId_paciente($id_paciente) {
         $this->id_paciente = $id_paciente;
     }

     function setValoracion($valoracion) {
         $this->valoracion = $valoracion;
     }

     public static function agendarcita($conexion, $cita){
        
        $cita_agendada = false;
        if(isset($conexion)){
            try{
                $sql = "INSERT INTO basedatos.cita(fecha, ncita, id_paciente, valoracion) "
                        . "VALUES (:fecha, :ncita, :id_paciente , :valoracion)";
                
                $fechatemp = $cita -> getFecha();
                $ncitatemp = $cita -> getNcita();
                $id_pacientetemp = $cita -> getId_paciente();
                $valoraciontemp = $cita -> getValoracion();
              
                
               
                
                $sentencia = $conexion -> prepare($sql);
                
                $sentencia -> bindParam (':fecha',$fechatemp , PDO::PARAM_STR);
                $sentencia -> bindParam (':ncita',$ncitatemp , PDO::PARAM_STR);
                $sentencia -> bindParam (':id_paciente',$id_pacientetemp , PDO::PARAM_STR);
                $sentencia -> bindParam (':valoracion',$valoraciontemp , PDO::PARAM_STR);
                
                
                $cita_agendada = $sentencia -> execute();
                
                
            } catch (PDOException $ex) {
                print 'ERRORR: ' . $ex ->getMessage();

            }
        }
        return $cita_agendada;
    }
    
     public static function ncita_existe($conexion, $ncita){
        $ncita_existe = true;
        if(isset($conexion)){
            try{
                $sql = "SELECT * FROM basedatos.cita WHERE ncita = :ncita";
                
                $sentencia = $conexion -> prepare($sql);
                
                $sentencia -> bindParam(':ncita', $ncita, PDO::PARAM_STR);
                $sentencia -> execute();
                $resultado = $sentencia -> fetchAll();
                if(count($resultado)){
                    $ncita_existe = true;
                }else{
                    $ncita_existe = false;
                }
                
            } catch (PDOException $ex) {
                print 'ERROR:' . $ex -> getMessage();
            }
        }
        return $ncita_existe;
    }
    public static function ncita_no_existe($conexion, $ncita){
        $ncita_no_existe = true;
        if(isset($conexion)){
            try{
                $sql = "SELECT * FROM basedatos.cita WHERE ncita = :ncita";
                
                $sentencia = $conexion -> prepare($sql);
                
                $sentencia -> bindParam(':ncita', $ncita, PDO::PARAM_STR);
                $sentencia -> execute();
                $resultado = $sentencia -> fetchAll();
                if(count($resultado)){
                    $ncita_no_existe = true;
                }else{
                    $ncita_no_existe = false;
                }
                
            } catch (PDOException $ex) {
                print 'ERROR:' . $ex -> getMessage();
            }
        }
        return !$ncita_no_existe;
    }
    
    
    public static function paciente_existe($conexion, $id){
        $paciente_existe = true;
        if(isset($conexion)){
            try{
                $sql = "SELECT * FROM basedatos.paciente WHERE id = :id";
                
                $sentencia = $conexion -> prepare($sql);
                
                $sentencia -> bindParam(':id', $id, PDO::PARAM_STR);
                $sentencia -> execute();
                $resultado = $sentencia -> fetchAll();
                if(count($resultado)){
                    $paciente_existe = true;
                }else{
                    $paciente_existe = false;
                }
                
            } catch (PDOException $ex) {
                print 'ERRORRR:' . $ex -> getMessage();
            }
        }
        return !$paciente_existe;
    }
    
    public static function obtener_citas_fecha($conexion) {
        $citas=[];
        if(isset($conexion)){
            try{
                
                $sql = "SELECT * FROM basedatos.cita ORDER BY fecha ASC  ";
                $sentencia = $conexion -> prepare($sql);
                $sentencia -> execute();
                
                $resultado = $sentencia -> fetchAll();
                
                if(count($resultado)){
                    foreach ($resultado as $fila){
                        $citas =new Cita(
                               $fila['fecha'],
                                $fila['ncita'],
                                $fila['id_paciente'],
                                $fila['valoracion']
                                );
                    }
                }
                
            } catch (PDOException $ex) {
                print  "ERROR:". $ex . getMessage();
            }
        }
        
    }
    
    
    public static function mostrar_citas_paciente($conexion, $id_paciente){
        $citas = array();
        if(isset($conexion)){
            try{
                include_once 'Cita.inc.php';
                
                $sql = "SELECT * FROM basedatos.cita WHERE id_paciente = :id_paciente ORDER BY FECHA ASC";
                
                $sentencia = $conexion -> prepare($sql);
                $sentencia -> bindParam (':id_paciente', $id_paciente, PDO::PARAM_STR);
                $sentencia -> execute();
                
                $resultado = $sentencia -> fetchAll();
                
                if(count ($resultado)){
                    foreach ($resultado as $fila){
                        $citas[] = new Cita(
                                $fila['fecha'],
                                $fila['ncita'],
                                $fila['id_paciente'],
                                $fila['valoracion']
                                );
                    }
                }
                
            } catch (PDOException $ex) {
                print "ERROR." .$ex -> getMessage();

            }
        }
        return $citas;
    }
            
    
    public static function obtener_cita_por_ncita($conexion, $ncita) {
        $cita = null;
        if (isset($conexion)) {
            try {
                include_once 'app/Cita.inc.php';
                $sql = "SELECT * FROM basedatos.cita WHERE ncita = :ncita ";
                $sentencia = $conexion->prepare($sql);

                $sentencia->bindParam(':ncita', $ncita, PDO::PARAM_STR);

                $sentencia->execute();
                $resultado = $sentencia->fetch();

                if (!empty($resultado)) {
                    $cita = new Cita(
                            $resultado['fecha'], $resultado['ncita'], 
                            $resultado['id_paciente'], $resultado['valoracion'] 
                            );
                }
            } catch (PDOException $ex) {
                print 'Error: ' . $ex->getMessage();
            }
        }
        return $cita;
    }
    
    
    public static function eliminar_cita($conexion,$ncita) {
        $cita_eliminada = false;
        if (isset($conexion)) {
            
            try {
                include_once 'Cita.inc.php';
                
                $sql = " DELETE FROM basedatos.cita WHERE ncita=:ncita";
               
                $sentencia = $conexion->prepare($sql);

                $sentencia->bindParam(':ncita', $ncita, PDO::PARAM_STR);
               
                $cita_eliminada = $sentencia->execute();
            
            } catch (PDOException $ex) {
                print 'ERROR:' . $ex->getMessage();
            }
        }
        
        return $cita_eliminada;
        
    } 
    
    
    public static function modificar_cita($conexion, $ncita, $fecha, $id_paciente, $valoracion){
        $actualizacion_correcta = false;
        
        if(isset($conexion)){
            try{
                $sql = "UPDATE basedatos.cita SET fecha = :fecha ,"
                        . "ncita = :ncita, id_paciente = :id_paciente, valoracion = :valoracion WHERE ncita = :ncita ";
                
                $sentencia = $conexion -> prepare($sql);
                
                $sentencia -> bindParam(':fecha',$fecha ,PDO::PARAM_STR);
                $sentencia -> bindParam(':ncita',$ncita ,PDO::PARAM_STR);
                $sentencia -> bindParam(':id_paciente',$id_paciente ,PDO::PARAM_STR);
                $sentencia -> bindParam(':valoracion',$valoracion ,PDO::PARAM_STR);
             
                           
                $actualizacion_correcta = $sentencia->execute();
                
            } catch (PDOException $ex) {
                print 'Error'. $ex -> getMessage();
            }
        }
        
        return $actualizacion_correcta;
    }

     
 }