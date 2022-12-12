<?php
session_start();

require_once($_SERVER['DOCUMENT_ROOT']."/src/php/connectividad.php");

class Catalago {

    var $db;
    var $connect;


    function __construct()
    {        
        try {
            $this->db = new DB_Connect();

            $this->connect=$this->db->connect();
        } 
        catch (PDOException $e) {
            print "¡Error!: " . $e->getMessage() . "<br/>";
            die();
        }
    }
    
    public function close() 
    {
        unset($this->connect);
    }

    function texto($array,$array2){

        $text=str_replace('=', ':', http_build_query(array_combine( $array,$array2),""," ,"));
        return $text;
    }
    function bitacora($Area, $Tabla, $Actividad, $idUsuario){
        date_default_timezone_set($_SESSION["Zona"]);
        $sql = "INSERT INTO Bitacora(Sistema, Area, Actividad, Tabla, idUsuario, Fecha, Hora) VALUES ( 'Ventas', :Area, :Actividad, :Tabla, :idUsuario, '".date("Y/m/d")."', '".date("H:i:s")."')";
        $query = $this->connect->prepare($sql);
        $query->bindParam(":Area",$Area);
        $query->bindParam(":Actividad",$Actividad);
        $query->bindParam(":Tabla",$Tabla);
        $query->bindParam(":idUsuario",$idUsuario);
        $query->execute(); 
        return 0;
    }


    public function getAllUserforTable(){
        $this->bitacora("Catalago","Usuarios","Consultar general",$_SESSION["id"]);
        $sql = "SELECT * FROM User";
        $query = $this->connect->prepare($sql);
        $query -> execute(); 
        $results = $query -> fetchAll(); 
        return $results;
    }

    public function getMotivoMerma(){
        $this->bitacora("Catalago","MotivoMermas","Consultar general",$_SESSION["id"]);
        $sql = "SELECT * FROM motivoMermaPlantaForestal";
        $query = $this->connect->prepare($sql);
        $query -> execute(); 
        $results = $query -> fetchAll(); 
        return $results;
    }

    public function getEspecies(){
        $this->bitacora("Catalago","Especie","Consultar general",$_SESSION["id"]);
        $sql = "SELECT * FROM especie";
        $query = $this->connect->prepare($sql);
        $query -> execute(); 
        $results = $query -> fetchAll(); 
        return $results;
    }

    public function getPlantasForestal(){
        $this->bitacora("Catalago","Plantas Forestales","Consultar general",$_SESSION["id"]);
        $sql = "SELECT p.idPlanta,e.idEspecie, e.nombre, p.descripcion, p.existencia, p.precio FROM plantaForestal as p INNER JOIN especie as e ON e.idEspecie = p.idEspecie";
        $query = $this->connect->prepare($sql);
        $query -> execute(); 
        $results = $query -> fetchAll(); 
        return $results;
    }

    public function getResponsable(){
        $this->bitacora("Catalago","Responsables","Consultar general",$_SESSION["id"]);
        $sql = "SELECT * FROM responsable";
        $query = $this->connect->prepare($sql);
        $query -> execute(); 
        $results = $query -> fetchAll(); 
        return $results;
    }

    public function getClient(){
        $this->bitacora("Catalago","Clientes","Consultar general",$_SESSION["id"]);
        $sql = "SELECT * FROM clientes";
        $query = $this->connect->prepare($sql);
        $query -> execute(); 
        $results = $query -> fetchAll(); 
        return $results;
    }

    public function getPredios(){
        $this->bitacora("Catalago","Predios","Consultar general",$_SESSION["id"]);
        $sql = "SELECT p.idPredio, c.razonSocial, p.municipio, p.extencion, p.usoPredio, p.longitud, p.latitud FROM predios as p INNER JOIN clientes as c On c.idCliente = p.idCliente";
        $query = $this->connect->prepare($sql);
        $query -> execute(); 
        $results = $query -> fetchAll(); 
        return $results;
    }

    function insertPlantaForestal( $idEspecie, $descripcion, $existencia, $precio){
        $this->bitacora("Catalago","Planta forestal","Insertar ".$this->texto(array("idEspecie", "descripcion", "existencia", "precio"),array($idEspecie, $descripcion, $existencia, $precio)),$_SESSION["id"]);
        $sql = "INSERT INTO plantaForestal ( idEspecie, descripcion, existencia, precio) VALUES (:idEspecie,:descripcion,:existencia, :precio)";
        $query = $this->connect->prepare($sql);
        $query->bindParam(":idEspecie",$idEspecie);
        $query->bindParam(":descripcion",$descripcion);
        $query->bindParam(":existencia",$existencia);
        $query->bindParam(":precio",$precio);
        $query->execute();
        return $query->rowCount(); 
    }

    function insertEspecies( $nombre, $descripcion){
        $this->bitacora("Catalago","Especie","Insertar".$this->texto(array("nombre", "descripcion"),array($nombre, $descripcion)),$_SESSION["id"]);
        $sql = "INSERT INTO especie ( nombre, descripcion) VALUES (:nombre,:descripcion)";
        $query = $this->connect->prepare($sql);
        $query->bindParam(":nombre",$nombre);
        $query->bindParam(":descripcion",$descripcion);
        $query->execute();  
        return $query->rowCount(); 
    }

    function insertUsuarios( $Username, $Puesto,$Pass){
        $this->bitacora("Catalago","Usuario","Insertar ".$this->texto(array("Username", "Puesto","Pass"),array($Username, $Puesto,$Pass)),$_SESSION["id"]);
        $sql = "INSERT INTO User ( Username, Puesto,Pass) VALUES (:Username, :Puesto,:Pass)";
        $query = $this->connect->prepare($sql);
        $query->bindParam(":Username",$Username);
        $query->bindParam(":Puesto",$Puesto);
        $query->bindParam(":Pass",$Pass);
        $query->execute();  
        return $query->rowCount(); 
    }
    
    function insertMotivoMerma( $nombre, $descripcion){
        $this->bitacora("Catalago","Motivo Merma","Insertar ".$this->texto(array("nombre", "descripcion"),array($nombre, $descripcion)),$_SESSION["id"]);
        $sql = "INSERT INTO motivoMermaPlantaForestal ( nombre, descripcion) VALUES (:nombre,:descripcion)";
        $query = $this->connect->prepare($sql);
        $query->bindParam(":nombre",$nombre);
        $query->bindParam(":descripcion",$descripcion);
        $query->execute();  
        return $query->rowCount(); 
    }
    

    function insertResponsable($nombre, $puesto){
        $this->bitacora("Catalago","Responsable","Insertar ".$this->texto(array("nombre", "puesto"),array($nombre, $puesto)),$_SESSION["id"]);
        $sql = "INSERT INTO responsable ( nombre, puesto) VALUES ( :nombre, :puesto)";
        $query = $this->connect->prepare($sql);
        $query->bindParam(':nombre', $nombre);
        $query->bindParam(':puesto', $puesto);
        $request=$query->execute(); 
        return $request;
    }

    function insertClientes($razonSocial, $RFC, $CURP, $domicilio, $ciudad, $estado, $email, $telefono, $celular, $tipoCliente){
        $this->bitacora("Catalago","Clientes","Insertar" .$this->texto(array("razonSocial", "RFC", "CURP", "domicilio", "ciudad", "estado", "email", "telefono", "celular", "tipoCliente"),array($razonSocial, $RFC, $CURP, $domicilio, $ciudad, $estado, $email, $telefono, $celular, $tipoCliente)),$_SESSION["id"]);
        $sql = "INSERT INTO clientes(razonSocial, RFC, CURP, domicilio, ciudad, estado, email, telefono, celular, tipoCliente) VALUES ( :razonSocial, :RFC, :CURP, :domicilio, :ciudad, :estado, :email, :telefono, :celular, :tipoCliente)";
        $query = $this->connect->prepare($sql);
        $query->bindParam(":razonSocial",$razonSocial);
        $query->bindParam(":RFC",$RFC);
        $query->bindParam(":CURP",$CURP);
        $query->bindParam(":domicilio",$domicilio);
        $query->bindParam(":ciudad",$ciudad);
        $query->bindParam(":estado",$estado);
        $query->bindParam(":email",$email);
        $query->bindParam(":telefono",$telefono);
        $query->bindParam(":celular",$celular);
        $query->bindParam(":tipoCliente",$tipoCliente);
        $request=$query->execute(); 
        $idCliente=$this->connect->lastInsertId();
        return $idCliente;
    }

    function insertPredios( $idCliente, $municipio, $extencion, $usoPredio, $longitud, $latitud){
        $this->bitacora("Catalago","Predios","Insertar".$this->texto(array("idCliente", "municipio", "extencion", "usoPredio", "longitud", "latitud"),array($idCliente, $municipio, $extencion, $usoPredio, $longitud, $latitud)),$_SESSION["id"]);
        $sql = "INSERT INTO predios( idCliente, municipio, extencion, usoPredio, longitud, latitud) VALUES ( :idCliente, :municipio, :extencion, :usoPredio, :longitud, :latitud)";
        $query = $this->connect->prepare($sql);
        $query->bindParam(':idCliente', $idCliente);
        $query->bindParam(':municipio', $municipio);
        $query->bindParam(':extencion', $extencion);
        $query->bindParam(':usoPredio', $usoPredio);
        $query->bindParam(':longitud', $longitud);
        $query->bindParam(':latitud', $latitud);
        $request=$query->execute(); 
        return $request;
    }

    function updatePlantaForestal($idPlanta, $idEspecie, $descripcion, $existencia, $precio){
        $this->bitacora("Catalago","Plantas Forestal","Actualizar ".$this->texto(array("idPlanta", "idEspecie", "descripcion", "existencia", "precio"),array($idPlanta, $idEspecie, $descripcion, $existencia, $precio)),$_SESSION["id"]);
        $sql = "UPDATE plantaForestal SET idEspecie=:idEspecie,descripcion=:descripcion,existencia=:existencia, precio=:precio where idPlanta=:idPlanta";
        $query = $this->connect->prepare($sql);
        $query->bindParam(':idPlanta', $idPlanta);
        $query->bindParam(':idEspecie', $idEspecie);
        $query->bindParam(':descripcion', $descripcion);
        $query->bindParam(':existencia', $existencia);
        $query->bindParam(':precio', $precio);
        $request=$query->execute(); 
        return $request;    
    }

    function updateEspecies($idEspecie, $nombre, $descripcion){
        $this->bitacora("Catalago","Especie","Actualizar ".$this->texto(array("idEspecie", "nombre", "descripcion"),array($idEspecie, $nombre, $descripcion)),$_SESSION["id"]);
        $sql = "UPDATE especie SET nombre=:nombre,descripcion=:descripcion where idEspecie=:idEspecie";
        $query = $this->connect->prepare($sql);
        $query->bindParam(':idEspecie', $idEspecie);
        $query->bindParam(':nombre', $nombre);
        $query->bindParam(':descripcion', $descripcion);
        $request=$query->execute(); 
        return $request;    
    }

    function updateUsuarios($idUsuario, $Username, $Puesto,$Pass){
        $this->bitacora("Catalago","Usuario","Actualizar ".$this->texto(array("idUsuario", "Username", "Puesto","Pass"),array($idUsuario, $Username, $Puesto,$Pass)),$_SESSION["id"]);
        $sql = "UPDATE User SET Username = :Username, Puesto = :Puesto, Pass = :Pass where idUsuario = :idUsuario ";
        $query = $this->connect->prepare($sql);
        $query->bindParam(':Username', $Username);
        $query->bindParam(':Puesto', $Puesto);
        $query->bindParam(':Pass', $Pass);
        $query->bindParam(':idUsuario', $idUsuario );

        $request=$query->execute(); 
        return $request;    
    }
    
    function updateResponsable($idResponsable, $nombre, $puesto){
        $this->bitacora("Catalago","Responable","Actualizar ".$this->texto(array("idResponsable", "nombre", "puesto"),array($idResponsable, $nombre, $puesto)),$_SESSION["id"]);
        $sql = "UPDATE responsable SET nombre=:nombre, puesto=:puesto  where idResponsable=:idResponsable";
        $query = $this->connect->prepare($sql);
        $query->bindParam(':idResponsable', $idResponsable);
        $query->bindParam(':nombre', $nombre);
        $query->bindParam(':puesto', $puesto);
        $request=$query->execute(); 
        return $request;    
    }
    
    function updateClientes($idCliente, $razonSocial, $RFC, $CURP, $domicilio, $ciudad, $estado, $email, $telefono, $celular, $tipoCliente){
        $this->bitacora("Catalago","Cliente","Actualizar ".$this->texto(array("idCliente", "razonSocial", "RFC", "CURP", "domicilio", "ciudad", "estado", "email", "telefono", "celular", "tipoCliente"),array($idCliente, $razonSocial, $RFC, $CURP, $domicilio, $ciudad, $estado, $email, $telefono, $celular, $tipoCliente)),$_SESSION["id"]);
        $sql = "UPDATE clientes SET razonSocial=:razonSocial, RFC=:RFC, CURP=:CURP, domicilio=:domicilio, ciudad=:ciudad, estado=:estado, email=:email, telefono=:telefono, celular=:celular, tipoCliente=:tipoCliente where idCliente=:idCliente";
        $query = $this->connect->prepare($sql);
        $query->bindParam(":idCliente",$idCliente);
        $query->bindParam(":razonSocial",$razonSocial);
        $query->bindParam(":RFC",$RFC);
        $query->bindParam(":CURP",$CURP);
        $query->bindParam(":domicilio",$domicilio);
        $query->bindParam(":ciudad",$ciudad);
        $query->bindParam(":estado",$estado);
        $query->bindParam(":email",$email);
        $query->bindParam(":telefono",$telefono);
        $query->bindParam(":celular",$celular);
        $query->bindParam(":tipoCliente",$tipoCliente);
        $request=$query->execute(); 
        return $request;    
    }
    
    function updatePredios($idPredio, $idCliente, $municipio, $extencion, $usoPredio, $longitud, $latitud){
        $this->bitacora("Catalago","Predios","Predios ".$this->texto(array("idPredio", "idCliente", "municipio", "extencion", "usoPredio", "longitud", "latitud"),array($idPredio, $idCliente, $municipio, $extencion, $usoPredio, $longitud, $latitud)),$_SESSION["id"]);
        $sql = "UPDATE predios SET idCliente=:idCliente, municipio=:municipio, extencion=:extencion, usoPredio=:usoPredio, longitud=:longitud, latitud=:latitud  where idPredio=:idPredio";
        $query = $this->connect->prepare($sql);
        $query->bindParam(':idPredio', $idPredio);
        $query->bindParam(':idCliente', $idCliente);
        $query->bindParam(':municipio', $municipio);
        $query->bindParam(':extencion', $extencion);
        $query->bindParam(':usoPredio', $usoPredio);
        $query->bindParam(':longitud', $longitud);
        $query->bindParam(':latitud', $latitud);
        $request=$query->execute(); 
        return $request;    
    }

    function getNextIdCliente(){
        $this->bitacora("Catalago","Cliente","Consultar proximo id",$_SESSION["id"]);
        $sql = "SELECT AUTO_INCREMENT  FROM information_schema.TABLES WHERE TABLE_SCHEMA = 'recidenciacyj_apeajal' AND TABLE_NAME = 'clientes'";
        $query = $this->connect->prepare($sql);
        $query -> execute(); 
        $results = $query -> fetchAll(); 
        return $results;
    }
}


?>