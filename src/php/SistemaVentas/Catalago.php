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
        $sql = "SELECT p.idPlanta, e.nombre, p.descripcion, p.existencia FROM plantaForestal as p INNER JOIN especie as e ON e.idEspecie = p.idEspecie";
        $query = $this->connect->prepare($sql);
        $query -> execute(); 
        $results = $query -> fetchAll(); 
        return $results;
    }

    public function getAllResponsable(){
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
        $sql = "SELECT * FROM predios";
        $query = $this->connect->prepare($sql);
        $query -> execute(); 
        $results = $query -> fetchAll(); 
        return $results;
    }

    function insertPlantaForestal( $idEspecie, $descripcion, $existencia){
        $sql = "INSERT INTO plantaForestal ( idEspecie, descripcion, existencia) VALUES (:idEspecie,:descripcion,:existencia)";
        $query = $this->connect->prepare($sql);
        $query->bindParam(":idEspecie",$idEspecie);
        $query->bindParam(":descripcion",$descripcion);
        $query->bindParam(":existencia",$existencia);
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

    function insertResponsable($idResponsable, $nombre, $puesto, $usuario, $password){
        $sql = "INSERT INTO responsable ( nombre, puesto, usuario, password) VALUES ( :nombre, :puesto, :usuario, :password)";
        $query = $this->connect->prepare($sql);
        $query->bindParam(':nombre', $nombre);
        $query->bindParam(':puesto', $puesto);
        $query->bindParam(':usuario', $usuario);
        $query->bindParam(':password', $password);
        $request=$query->execute(); 
        return $request;
    }

    function insertClientes( $razonSocial, $RFC, $domicilio, $ciudad, $estado, $email, $telefono, $celular, $tipoCliente, $constanciaFiscal, $saldo, $domicilioFiscal, $usuario, $password){
        $sql = "INSERT INTO clientes( razonSocial, RFC, domicilio, ciudad, estado, email, telefono, celular, tipoCliente, constanciaFiscal, saldo, domicilioFiscal, usuario, password) VALUES ( :razonSocial, :RFC, :domicilio, :ciudad, :estado, :email, :telefono, :celular, :tipoCliente, :constanciaFiscal, :saldo, :domicilioFiscal, :usuario, :password)";
        $query = $this->connect->prepare($sql);
        $query->bindParam(":razonSocial",$razonSocial);
        $query->bindParam(":RFC",$RFC);
        $query->bindParam(":domicilio",$domicilio);
        $query->bindParam(":ciudad",$ciudad);
        $query->bindParam(":estado",$estado);
        $query->bindParam(":email",$email);
        $query->bindParam(":telefono",$telefono);
        $query->bindParam(":celular",$celular);
        $query->bindParam(":tipoCliente",$tipoCliente);
        $query->bindParam(":constanciaFiscal",$constanciaFiscal);
        $query->bindParam(":saldo",$saldo);
        $query->bindParam(":domicilioFiscal",$domicilioFiscal);
        $query->bindParam(":usuario",$usuario);
        $query->bindParam(":passwordo",$passwordo);
        $query->execute();  
        return $query->rowCount(); 
    }

    function insertPredios( $idCliente, $municipio, $extencion, $usoPredio, $longitud, $latitud, $RegistroSADER){
        $sql = "INSERT INTO predios( idCliente, municipio, extencion, usoPredio, longitud, latitud, RegistroSADER) VALUES ( :idPredio, :idCliente, :municipio, :extencion, :usoPredio, :longitud, :latitud, :RegistroSADER)";
        $query = $this->connect->prepare($sql);
        $query->bindParam(':idCliente', $idCliente);
        $query->bindParam(':municipio', $municipio);
        $query->bindParam(':extencion', $extencion);
        $query->bindParam(':usoPredio', $usoPredio);
        $query->bindParam(':longitud', $longitud);
        $query->bindParam(':latitud', $latitud);
        $query->bindParam(':RegistroSADER', $RegistroSADER);
        $request=$query->execute(); 
        return $request;
    }

    function updatePlantaForestal($idPlanta, $idEspecie, $descripcion, $existencia){
        $sql = "UPDATE plantaForestal SET idEspecie=:idEspecie,descripcion=:descripcion,existencia=:existencia where idPlanta=:idPlanta";
        $query = $this->connect->prepare($sql);
        $query->bindParam(':$idPlanta', $idPlanta);
        $query->bindParam(':idEspecie', $idEspecie);
        $query->bindParam(':descripcion', $descripcion);
        $query->bindParam(':existencia', $existencia);
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

    function updateResponsable($idResponsable, $nombre, $puesto, $usuario, $password){
        $sql = "UPDATE responsable SET nombre=:nombre, puesto=:puesto, usuario=:usuario, password=:password  where idResponsable=:idResponsable";
        $query = $this->connect->prepare($sql);
        $query->bindParam(':idResponsable', $idResponsable);
        $query->bindParam(':nombre', $nombre);
        $query->bindParam(':puesto', $puesto);
        $query->bindParam(':usuario', $usuario);
        $query->bindParam(':password', $password);
        $request=$query->execute(); 
        return $request;    
    }
    
    function updateClientes($idCliente, $razonSocial, $RFC, $domicilio, $ciudad, $estado, $email, $telefono, $celular, $tipoCliente, $constanciaFiscal, $saldo, $domicilioFiscal, $usuario, $password){
        $sql = "UPDATE clientes SET razonSocial=:razonSocia, RFC=:RFC, domicilio=:domicilio, ciudad=:ciudad, estado=:estado, email=:email, telefono=:telefono, celular=:celular, tipoCliente=:tipoCliente, constanciaFiscal=:constanciaFiscal, saldo=:saldo, domicilioFiscal=:domicilioFiscal, usuario=:usuario, password=:password  where idCliente=:idCliente";
        $query = $this->connect->prepare($sql);
        $query->bindParam(":idCliente",$idCliente);
        $query->bindParam(":razonSocial",$razonSocial);
        $query->bindParam(":RFC",$RFC);
        $query->bindParam(":domicilio",$domicilio);
        $query->bindParam(":ciudad",$ciudad);
        $query->bindParam(":estado",$estado);
        $query->bindParam(":email",$email);
        $query->bindParam(":telefono",$telefono);
        $query->bindParam(":celular",$celular);
        $query->bindParam(":tipoCliente",$tipoCliente);
        $query->bindParam(":constanciaFiscal",$constanciaFiscal);
        $query->bindParam(":saldo",$saldo);
        $query->bindParam(":domicilioFiscal",$domicilioFiscal);
        $query->bindParam(":usuario",$usuario);
        $query->bindParam(":passwordo",$passwordo);
        $request=$query->execute(); 
        return $request;    
    }
    
    function updatePredios($idPredio, $idCliente, $municipio, $extencion, $usoPredio, $longitud, $latitud, $RegistroSADER){
        $sql = "UPDATE predios SET idCliente=:idCliente, municipio=:municipio, extencion=:extencion, usoPredio=:usoPredio, longitud=:longitud, latitud=:latitud, RegistroSADER=:RegistroSADER  where idPredio=:idPredio";
        $query = $this->connect->prepare($sql);
        $query->bindParam(':idPredio', $idPredio);
        $query->bindParam(':idCliente', $idCliente);
        $query->bindParam(':municipio', $municipio);
        $query->bindParam(':extencion', $extencion);
        $query->bindParam(':usoPredio', $usoPredio);
        $query->bindParam(':longitud', $longitud);
        $query->bindParam(':latitud', $latitud);
        $query->bindParam(':RegistroSADER', $RegistroSADER);
        $request=$query->execute(); 
        return $request;    
    }
}


?>