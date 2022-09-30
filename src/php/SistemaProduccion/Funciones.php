<?php
require_once($_SERVER['DOCUMENT_ROOT']."/src/php/connectividad.php");

class Funciones {

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

    public function getAllClasificaciones(){
        $sql = "SELECT * FROM clasificacion";
        $query = $this->connect->prepare($sql);
        $query -> execute(); 
        $results = $query -> fetchAll(); 
        return $results;
    }

    public function insertClasificacion($concepto, $descripcion){
        $sql="INSERT INTO clasificacion (concepto, descripcion) VALUES (:concepto,:descripcion)";
        $query = $this->connect->prepare($sql);
        $query->bindParam(':concepto', $concepto);
        $query->bindParam(':descripcion', $descripcion);
        $request=$query->execute(); 
        
        return $request;

    }

    public function getAllInsumos() {
        $sql = "SELECT i.idInsumo, c.concepto , i.nombre, i.descripcion,i.unidadMedida,i.existencia,i.maximo,i.minimo,i.costoPromedio FROM insumo as i INNER JOIN clasificacion as c ON i.idClasificacion = c.idClasificacion;";
        $query = $this->connect->prepare($sql);
        $query->execute(); 
        $results = $query -> fetchAll(); 
        return $results;
        }


//



}

?>




