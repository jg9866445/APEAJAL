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

    function getEspecies(){
        $sql = "SELECT * FROM especie";
        $query = $this->connect->prepare($sql);
        $query -> execute(); 
        $results = $query -> fetchAll(); 
        return $results;
    }

    function getPlantasForestal(){
        $sql = "SELECT p.idPlanta, e.nombre, p.descripcion, p.existencia FROM plantaForestal as p INNER JOIN especie as e ON e.idEspecie = p.idEspecie";
        $query = $this->connect->prepare($sql);
        $query -> execute(); 
        $results = $query -> fetchAll(); 
        return $results;
    }

    function getResponsables(){
        $sql = "SELECT * FROM responsable";
        $query = $this->connect->prepare($sql);
        $query -> execute(); 
        $results = $query -> fetchAll(); 
        return $results;
    }

    function getClient(){
        $sql = "SELECT * FROM clientes";
        $query = $this->connect->prepare($sql);
        $query -> execute(); 
        $results = $query -> fetchAll(); 
        return $results;
    }

    function getPredios(){
        $sql = "SELECT * FROM predios";
        $query = $this->connect->prepare($sql);
        $query -> execute(); 
        $results = $query -> fetchAll(); 
        return $results;
    }

    function insertPlantaForestal($idPlanta, $idEspecie, $descripcion, $existencia){
        $sql = "INSERT INTO plantaForestal (idPlanta, idEspecie, descripcion, existencia) VALUES (:idPlanta,:idEspecie,:descripcion,:existencia)";
        $query = $this->connect->prepare($sql);
        $query->bindParam(":idPlanta",$idPlanta);
        $query->bindParam(":idEspecie",$idEspecie);
        $query->bindParam(":descripcion",$descripcion);
        $query->bindParam(":existencia",$existencia);
        $query->execute();  
        return $query->rowCount(); 
    }


//INSERT INTO plantaForestal(idPlanta, idEspecie, descripcion, existencia) VALUES ('[value-1]','[value-2]','[value-3]','[value-4]')
//INSERT INTO especie(idEspecie, nombre, descripcion) VALUES ('[value-1]','[value-2]','[value-3]')
//INSERT INTO responsable(idResponsable, nombre, puesto, usuario, password) VALUES ('[value-1]','[value-2]','[value-3]','[value-4]','[value-5]')
//INSERT INTO clientes(idCliente, razonSocial, RFC, domicilio, ciudad, estado, email, telefono, celular, tipoCliente, constanciaFiscal, saldo, domicilioFiscal, usuario, password) VALUES ('[value-1]','[value-2]','[value-3]','[value-4]','[value-5]','[value-6]','[value-7]','[value-8]','[value-9]','[value-10]','[value-11]','[value-12]','[value-13]','[value-14]','[value-15]')
//INSERT INTO predios(idPredio, idCliente, municipio, extencion, usoPredio, longitud, latitud, RegistroSADER) VALUES ('[value-1]','[value-2]','[value-3]','[value-4]','[value-5]','[value-6]','[value-7]','[value-8]')






//UPDATE plantaForestal SET idPlanta='[value-1]',idEspecie='[value-2]',descripcion='[value-3]',existencia='[value-4]' WHERE 1
//UPDATE especie SET idEspecie='[value-1]',nombre='[value-2]',descripcion='[value-3]' WHERE 1
//UPDATE responsable SET idResponsable='[value-1]',nombre='[value-2]',puesto='[value-3]',usuario='[value-4]',password='[value-5]' WHERE 1
//UPDATE clientes SET idCliente='[value-1]',razonSocial='[value-2]',RFC='[value-3]',domicilio='[value-4]',ciudad='[value-5]',estado='[value-6]',email='[value-7]',telefono='[value-8]',celular='[value-9]',tipoCliente='[value-10]',constanciaFiscal='[value-11]',saldo='[value-12]',domicilioFiscal='[value-13]',usuario='[value-14]',password='[value-15]' WHERE 1
//UPDATE predios SET idPredio='[value-1]',idCliente='[value-2]',municipio='[value-3]',extencion='[value-4]',usoPredio='[value-5]',longitud='[value-6]',latitud='[value-7]',RegistroSADER='[value-8]' WHERE 1



//INSERT INTO solicitudes(idSolicitud, idCliente, fecha, estado) VALUES ('[value-1]','[value-2]','[value-3]','[value-4]')



}


?>