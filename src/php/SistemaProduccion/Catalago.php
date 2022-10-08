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
    
    function getNextIdProveedor(){
        $sql = "SELECT AUTO_INCREMENT  FROM information_schema.TABLES WHERE TABLE_SCHEMA = 'recidenciacyj_apeajal' AND TABLE_NAME = 'proveedor'";
        $query = $this->connect->prepare($sql);
        $query -> execute(); 
        $results = $query -> fetchAll(); 
        return $results;
    }

    public function getAllClasificaciones(){
        $sql = "SELECT * FROM clasificacion";
        $query = $this->connect->prepare($sql);
        $query -> execute(); 
        $results = $query -> fetchAll(); 
        return $results;
    }

    public function getAllInsumos() {
        $sql = "SELECT i.idInsumo,c.idClasificacion, c.concepto , i.nombre, i.descripcion,i.unidadMetrica,i.existencias,i.maximo,i.minimo,i.costoPromedio FROM insumo as i INNER JOIN clasificacion as c ON i.idClasificacion = c.idClasificacion;";
        $query = $this->connect->prepare($sql);
        $query->execute(); 
        $results = $query -> fetchAll(); 
        return $results;
    }

    public function getAllProveedores(){
        $sql = "SELECT * FROM proveedor";
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

    public function insertClasificacion($concepto, $descripcion){
        $sql="INSERT INTO clasificacion (concepto, descripcion) VALUES (:concepto,:descripcion)";
        $query = $this->connect->prepare($sql);
        $query->bindParam(':concepto', $concepto);
        $query->bindParam(':descripcion', $descripcion);
        $request=$query->execute(); 
        return $request;
    }

    public function insertInsumos( $idClasificacion, $nombre, $descripcion, $unidadMetrica, $existencias, $maximo, $minimo, $costoPromedio) {
        $sql = "INSERT INTO insumo (idClasificacion, nombre, descripcion, unidadMetrica, existencias, maximo, minimo, costoPromedio) VALUES (:idClasificacion, :nombre, :descripcion, :unidadMetrica, :existencias, :maximo, :minimo, :costoPromedio)";
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

    function insertProveedor( $nombre, $contacto, $domicilio, $ciudad, $telefono, $email){
        $sql = "INSERT INTO proveedor (nombre, contacto, domicilio, ciudad, telefono, email) VALUES ( :nombre, :contacto, :domicilio, :ciudad, :telefono, :email)";
        $query = $this->connect->prepare    ($sql);
        $query->bindParam(':nombre', $nombre);
        $query->bindParam(':contacto', $contacto);
        $query->bindParam(':domicilio', $domicilio);
        $query->bindParam(':ciudad', $ciudad);
        $query->bindParam(':telefono', $telefono);
        $query->bindParam(':email', $email);
        $request=$query->execute(); 
        return $request;
    }

    function insertResponsable( $nombre, $puesto){
        $sql = "INSERT INTO responsable ( nombre, puesto) VALUES ( :nombre, :puesto)";
        $query = $this->connect->prepare($sql);
        $query->bindParam(':nombre', $nombre);
        $query->bindParam(':puesto', $puesto);
        $request=$query->execute(); 
        return $request;
    }

    function updateInsumos($idInsumo, $idClasificacion, $nombre, $descripcion, $unidadMetrica, $existencias, $maximo, $minimo, $costoPromedio){
        $sql = "UPDATE insumo SET idClasificacion=:idClasificacion, nombre=:nombre, descripcion=:descripcion, unidadMetrica=:unidadMetrica, existencias=:existencias, maximo=:maximo, minimo=:minimo, costoPromedio=:costoPromedio where idInsumo=:idInsumo";
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
    
    function updateProveedor($idProveedor, $nombre, $contacto, $domicilio, $ciudad, $telefono, $email){
        $sql = "UPDATE proveedor SET nombre=:nombre,contacto=:contacto,domicilio=:domicilio,ciudad=:ciudad,telefono=:telefono,email=:email where idProveedor=:idProveedor";
        $query = $this->connect->prepare($sql);
        $query->bindParam(':idProveedor', $idProveedor);
        $query->bindParam(':nombre', $nombre);
        $query->bindParam(':contacto', $contacto);
        $query->bindParam(':domicilio', $domicilio);
        $query->bindParam(':ciudad', $ciudad);
        $query->bindParam(':telefono', $telefono);
        $query->bindParam(':email', $email);
        $request=$query->execute(); 
        return $request;    
    }

    function updateResponsable($idResponsable, $nombre, $puesto){
        $sql = "UPDATE responsable SET nombre=:nombre, puesto=:puesto where idResponsable=:idResponsable";
        $query = $this->connect->prepare($sql);
        $query->bindParam(':idResponsable', $idResponsable);
        $query->bindParam(':nombre', $nombre);
        $query->bindParam(':puesto', $puesto);
        $request=$query->execute(); 
        return $request;
    }


}

?>




