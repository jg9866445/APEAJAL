<?php
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

    public function getEspecies(){
        $sql = "SELECT * FROM especie";
        $query = $this->connect->prepare($sql);
        $query -> execute(); 
        $results = $query -> fetchAll(); 
        return $results;
    }

    public function getPlantasForestal(){
        $sql = "SELECT p.idPlanta,e.idEspecie, e.nombre, p.descripcion, p.existencia, p.precio FROM plantaForestal as p INNER JOIN especie as e ON e.idEspecie = p.idEspecie";
        $query = $this->connect->prepare($sql);
        $query -> execute(); 
        $results = $query -> fetchAll(); 
        return $results;
    }

    public function getResponsable(){
        $sql = "SELECT * FROM responsable";
        $query = $this->connect->prepare($sql);
        $query -> execute(); 
        $results = $query -> fetchAll(); 
        return $results;
    }

    public function getClient(){
        $sql = "SELECT * FROM clientes";
        $query = $this->connect->prepare($sql);
        $query -> execute(); 
        $results = $query -> fetchAll(); 
        return $results;
    }

    public function getPredios(){
        $sql = "SELECT p.idPredio, c.razonSocial, p.municipio, p.extencion, p.usoPredio, p.longitud, p.latitud FROM predios as p INNER JOIN clientes as c On c.idCliente = p.idCliente";
        $query = $this->connect->prepare($sql);
        $query -> execute(); 
        $results = $query -> fetchAll(); 
        return $results;
    }

    function insertPlantaForestal( $idEspecie, $descripcion, $existencia, $precio){
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
        $sql = "INSERT INTO especie ( nombre, descripcion) VALUES (:nombre,:descripcion)";
        $query = $this->connect->prepare($sql);
        $query->bindParam(":nombre",$nombre);
        $query->bindParam(":descripcion",$descripcion);
        $query->execute();  
        return $query->rowCount(); 
    }

    function insertResponsable($nombre, $puesto){
        $sql = "INSERT INTO responsable ( nombre, puesto) VALUES ( :nombre, :puesto)";
        $query = $this->connect->prepare($sql);
        $query->bindParam(':nombre', $nombre);
        $query->bindParam(':puesto', $puesto);
        $request=$query->execute(); 
        return $request;
    }

    function insertClientes($razonSocial, $RFC, $CURP, $domicilio, $ciudad, $estado, $email, $telefono, $celular, $tipoCliente){
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
        return $request;
    }

    function insertPredios( $idCliente, $municipio, $extencion, $usoPredio, $longitud, $latitud){
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
        $sql = "UPDATE especie SET nombre=:nombre,descripcion=:descripcion where idEspecie=:idEspecie";
        $query = $this->connect->prepare($sql);
        $query->bindParam(':$idEspecie', $idEspecie);
        $query->bindParam(':nombre', $nombre);
        $query->bindParam(':descripcion', $descripcion);
        $request=$query->execute(); 
        return $request;    
    }

    function updateResponsable($idResponsable, $nombre, $puesto){
        $sql = "UPDATE responsable SET nombre=:nombre, puesto=:puesto  where idResponsable=:idResponsable";
        $query = $this->connect->prepare($sql);
        $query->bindParam(':idResponsable', $idResponsable);
        $query->bindParam(':nombre', $nombre);
        $query->bindParam(':puesto', $puesto);
        $request=$query->execute(); 
        return $request;    
    }
    
    function updateClientes($idCliente, $razonSocial, $RFC, $CURP, $domicilio, $ciudad, $estado, $email, $telefono, $celular, $tipoCliente){
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
        $sql = "SELECT AUTO_INCREMENT  FROM information_schema.TABLES WHERE TABLE_SCHEMA = 'recidenciacyj_apeajal' AND TABLE_NAME = 'clientes'";
        $query = $this->connect->prepare($sql);
        $query -> execute(); 
        $results = $query -> fetchAll(); 
        return $results;
    }
}


?>