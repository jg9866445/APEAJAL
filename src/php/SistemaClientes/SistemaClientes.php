<?php
require_once($_SERVER['DOCUMENT_ROOT']."/src/php/connectividad.php");

class SistemaClientes {

    var $db;
    var $connect;

    function __construct(){        
        try {
            $this->db = new DB_Connect();

            $this->connect=$this->db->connect();
        } 
        catch (PDOException $e) {
            print "¡Error!: " . $e->getMessage() . "<br/>";
            die();
        }
    }
    
    public function close() {
        unset($this->connect);
    }

    public function ISlogin($CURP,$RFC){
        $sql = "SELECT IF(COUNT(*)>0,TRUE,FALSE) AS ISlogin from clientes AS C WHERE C.RFC = :RFC OR C.CURP = :CURP;";
        $query = $this->connect->prepare($sql);
        $query->bindParam(':RFC', $CURP);
        $query->bindParam(':CURP', $RFC);
        $query -> execute(); 
        $results = $query -> fetchAll(); 
        return $results;
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
        $idCliente=$this->connect->lastInsertId();
        return $idCliente;
    }
}