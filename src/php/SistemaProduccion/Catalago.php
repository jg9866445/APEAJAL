<?php
require_once($_SERVER['DOCUMENT_ROOT']."/src/php/connectividad.php");
session_start();

class Catalago {

    var $db;
    var $connect;
    var $connect_externa;

    function __construct(){        
        try {
            $this->db = new DB_Connect();

            $this->connect=$this->db->connect();
            $this->connect_externa=$this->db->connect_externa();
        } 
        catch (PDOException $e) {
            print "¡Error!: " . $e->getMessage() . "<br/>";
            die();
        }
    }
    
    public function close() {
        unset($this->connect);
    }
    
    function texto($array,$array2){

        $text=str_replace('=', ':', http_build_query(array_combine( $array,$array2),""," ,"));
        return $text;
    }

    function bitacora($Area, $Tabla, $Actividad, $idUsuario){
        date_default_timezone_set($_SESSION["Zona"]);
        $sql = "INSERT INTO Bitacora(Sistema, Area, Actividad, Tabla, idUsuario, Fecha, Hora) VALUES ( 'Produccion', :Area, :Actividad, :Tabla, :idUsuario, '".date("Y/m/d")."', '".date("H:i:s")."')";
        $query = $this->connect->prepare($sql);
        $query->bindParam(":Area",$Area);
        $query->bindParam(":Actividad",$Actividad);
        $query->bindParam(":Tabla",$Tabla);
        $query->bindParam(":idUsuario",$idUsuario);
        $query->execute(); 
        return 0;
    }


    //Funciones para Calsificacion 
    public function getAllClasificacionesForTable(){
        $this->bitacora("Catalago","Clasificacion","Obtener todos los regristros",$_SESSION["id"]);
        $sql = "SELECT idClasificacion,concepto,descripcion FROM clasificacion";
        $query = $this->connect->prepare($sql);
        $query -> execute(); 
        $results = $query -> fetchAll(); 
        return $results;
    }
    


    public function getAllClasificacionesForSelect(){
        $this->bitacora("Catalago","Clasificacion","Obtener todos los regristros",$_SESSION["id"]);
        $sql = "SELECT idClasificacion,concepto FROM clasificacion";
        $query = $this->connect->prepare($sql);
        $query -> execute(); 
        $results = $query -> fetchAll(); 
        return $results;
    }

    public function insertClasificacion($concepto, $descripcion){
        $this->bitacora("Catalago","Clasifiacion","Insertar".$this->texto(array("concepto", "descripcion"),array($concepto, $descripcion)),$_SESSION["id"]);
        $sql="INSERT INTO clasificacion (concepto, descripcion) VALUES (:concepto,:descripcion)";
        $query = $this->connect->prepare($sql);
        $query->bindParam(':concepto', $concepto);
        $query->bindParam(':descripcion', $descripcion);
        $request=$query->execute(); 
        return $request;
    }
    //Fin de funciones para clasificacion

    //funciones para insumos
    public function getAllInsumosForTable() {
        $this->bitacora("Catalago","Insusmo","Obtener todos los insumos",$_SESSION["id"]);
        $sql = "SELECT i.idInsumo,c.idClasificacion, c.concepto , i.nombre, i.descripcion,i.unidad,i.existencias,i.maximo,i.minimo,i.costoPromedio FROM insumo as i INNER JOIN clasificacion as c ON i.idClasificacion = c.idClasificacion;";
        $query = $this->connect->prepare($sql);
        $query->execute(); 
        $results = $query -> fetchAll(); 
        return $results;
    }

    public function insertInsumos( $idClasificacion, $nombre, $descripcion, $unidadMetrica, $existencias, $maximo, $minimo, $costoPromedio) {
        $this->bitacora("Catalago","Insumos","Insertar ".$this->texto(array("idClasificacion", "nombre", "descripcion", "unidadMetrica", "existencias", "maximo", "minimo", "costoPromedio"),array($idClasificacion, $nombre, $descripcion, $unidadMetrica, $existencias, $maximo, $minimo, $costoPromedio)),$_SESSION["id"]);
        $sql = "INSERT INTO insumo (idClasificacion, nombre, descripcion, unidad, existencias, maximo, minimo, costoPromedio) VALUES (:idClasificacion, :nombre, :descripcion, :unidadMetrica, :existencias, :maximo, :minimo, :costoPromedio)";
        $query = $this->connect->prepare($sql);
        $query->bindParam(':idClasificacion', $idClasificacion);
        $query->bindParam(':nombre', $nombre);
        $query->bindParam(':descripcion', $descripcion);
        $query->bindParam(':unidadMetrica', $unidadMetrica);
        $query->bindParam(':existencias', $existencias);
        $query->bindParam(':maximo', $maximo);
        $query->bindParam(':minimo', $minimo);
        $query->bindParam(':costoPromedio', $costoPromedio);
        $request=$query->execute(); 
        return $request;
    }
    
    function updateInsumos($idInsumo, $idClasificacion, $nombre, $descripcion, $unidadMetrica, $existencias, $maximo, $minimo, $costoPromedio){
        $this->bitacora("Catalago","Update Insumo","Se actualizo insumos".$this->texto(array("idInsumo", "idClasificacion", "nombre", "descripcion", "unidadMetrica", "existencias", "maximo", "minimo", "costoPromedio"),array($idInsumo, $idClasificacion, $nombre, $descripcion, $unidadMetrica, $existencias, $maximo, $minimo, $costoPromedio)),$_SESSION["id"]);
        $sql = "UPDATE insumo SET idClasificacion=:idClasificacion, nombre=:nombre, descripcion=:descripcion, unidad=:unidadMetrica, existencias=:existencias, maximo=:maximo, minimo=:minimo, costoPromedio=:costoPromedio where idInsumo=:idInsumo";
        $query = $this->connect->prepare($sql);
        $query->bindParam(':idInsumo', $idInsumo);
        $query->bindParam(':idClasificacion', $idClasificacion);
        $query->bindParam(':nombre', $nombre);
        $query->bindParam(':descripcion', $descripcion);
        $query->bindParam(':unidadMetrica', $unidadMetrica);
        $query->bindParam(':existencias', $existencias);
        $query->bindParam(':maximo', $maximo);
        $query->bindParam(':minimo', $minimo);
        $query->bindParam(':costoPromedio', $costoPromedio);
        $request=$query->execute(); 
        return $request;
    }
    //Fin de funciones para insumos

    //funciones para insumos
    public function getAllProveedoresForTable(){
        $this->bitacora("Catalago","Proveedores","Obtiene todos los regristros",$_SESSION["id"]);
        $sql = "SELECT * FROM proveedores";
        $query = $this->connect_externa->prepare($sql);
        $query -> execute(); 
        $results = $query -> fetchAll(); 
        return $results;
    }

    //Fin de funciones para insumos

    //funciones para insumos
    public function getAllResponsableForTable(){
        $this->bitacora("Catalago","Responsables","Obtiene todos los regristros",$_SESSION["id"]);
        $sql = "SELECT * FROM responsable as r WHERE r.idResponsable <> 1";
        $query = $this->connect->prepare($sql);
        $query -> execute(); 
        $results = $query -> fetchAll(); 
        return $results;
    }

    function insertResponsable( $nombre, $puesto){
        $this->bitacora("Catalago","Responsable","Inserta Responsables".$this->texto(array("nombre", "puesto"),array($nombre, $puesto)),$_SESSION["id"]);
        $sql = "INSERT INTO responsable ( nombre, puesto) VALUES ( :nombre, :puesto)";
        $query = $this->connect->prepare($sql);
        $query->bindParam(':nombre', $nombre);
        $query->bindParam(':puesto', $puesto);
        $request=$query->execute(); 
        return $request;
    }

    function updateResponsable($idResponsable, $nombre, $puesto){
        $this->bitacora("Catalago","responsables","Actualiza responsable".$this->texto(array("idResponsable","nombre", "puesto"),array($idResponsable,$nombre, $puesto)),$_SESSION["id"]);
        $sql = "UPDATE responsable SET nombre=:nombre, puesto=:puesto where idResponsable=:idResponsable";
        $query = $this->connect->prepare($sql);
        $query->bindParam(':idResponsable', $idResponsable);
        $query->bindParam(':nombre', $nombre);
        $query->bindParam(':puesto', $puesto);
        $request=$query->execute(); 
        return $request;
    }

    //Fin de funciones para insumos


    
    public function getMotivoMerma(){
        $this->bitacora("Catalago","Motivo merma","Ingresa Motivo Merma",$_SESSION["id"]);
        $sql = "SELECT * FROM motivoMermaInsumo";
        $query = $this->connect->prepare($sql);
        $query -> execute(); 
        $results = $query -> fetchAll(); 
        return $results;
    }


    function insertMotivoMerma( $nombre, $descripcion){
        $this->bitacora("Catalago","Motivo Merma","Insertar".$this->texto(array("nombre", "descripcion"),array($nombre, $descripcion)),$_SESSION["id"]);
        $sql = "INSERT INTO motivoMermaInsumo ( nombre, descripcion) VALUES (:nombre,:descripcion)";
        $query = $this->connect->prepare($sql);
        $query->bindParam(":nombre",$nombre);
        $query->bindParam(":descripcion",$descripcion);
        $query->execute();  
        return $query->rowCount(); 
    }
    

    public function getAllUserforTable(){
        $this->bitacora("Catalago","Usuarios","Obtener Todos los regristros",$_SESSION["id"]);
        $sql = "SELECT * FROM User";
        $query = $this->connect->prepare($sql);
        $query -> execute(); 
        $results = $query -> fetchAll(); 
        return $results;
    }

    
    function insertUsuarios( $Username, $Puesto,$Pass){
        $this->bitacora("Catalago","usuarios","Inserta usuarios".$this->texto(array("Username", "Puesto","Pass"),array($Username, $Puesto,$Pass)),$_SESSION["id"]);
        $sql = "INSERT INTO User ( Username, Puesto,Pass) VALUES (:Username, :Puesto,:Pass)";
        $query = $this->connect->prepare($sql);
        $query->bindParam(":Username",$Username);
        $query->bindParam(":Puesto",$Puesto);
        $query->bindParam(":Pass",$Pass);
        $query->execute();  
        return $query->rowCount(); 
    }

    function updateUsuarios($idUsuario, $Username, $Puesto,$Pass){
        $this->bitacora("Catalago","Usuarios","Actualizar".$this->texto(array("idUsuario", "Username", "Puesto","Pass"),array($idUsuario, $Username, $Puesto,$Pass)),$_SESSION["id"]);
        $sql = "UPDATE User SET Username = :Username, Puesto = :Puesto, Pass = :Pass where idUsuario = :idUsuario ";
        $query = $this->connect->prepare($sql);
        $query->bindParam(':Username', $Username);
        $query->bindParam(':Puesto', $Puesto);
        $query->bindParam(':Pass', $Pass);
        $query->bindParam(':idUsuario', $idUsuario );

        $request=$query->execute(); 
        return $request;    
    }
}

?>




