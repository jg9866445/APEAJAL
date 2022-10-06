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

    public function getAllClasificaciones(){
        $sql = "SELECT * FROM clasificacion";
        $query = $this->connect->prepare($sql);
        $query -> execute(); 
        $results = $query -> fetchAll(); 
        return $results;
    }

    public function getAllInsumos() {
        $sql = "SELECT i.idInsumo, c.concepto , i.nombre, i.descripcion,i.unidadMedida,i.existencia,i.maximo,i.minimo,i.costoPromedio FROM insumo as i INNER JOIN clasificacion as c ON i.idClasificacion = c.idClasificacion;";
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

    public function insertInsumos( $idClasificacion, $nombre, $descripcion, $unidadMedida, $existencia, $maximo, $minimo, $costoPromedio) {
        $sql = "INSERT INTO insumo (idClasificacion, nombre, descripcion, unidadMedida, existencia, maximo, minimo, costoPromedio) VALUES (:idClasificacion, :nombre, :descripcion, :unidadMedida, :existencia, :maximo, :minimo, :costoPromedio)";
        $query = $this->connect->prepare($sql);
        $query->bindParam(':idClasificacion', $idClasificacion);
        $query->bindParam(':nombre', $nombre);
        $query->bindParam(':descripcion', $descripcion);
        $query->bindParam(':unidadMedida', $unidadMedida);
        $query->bindParam(':existencia', $existencia);
        $query->bindParam(':maximo', $maximo);
        $query->bindParam(':minimo', $minimo);
        $query->bindParam(':costoPromedio', $costoPromedio);
        $request=$query->execute(); 
        return $request;
        }

    function insertProveedor( $nombre, $contacto, $domicilio, $ciudad, $telefono, $email, $ActaSituacionFiscal){
        $sql = "INSERT INTO proveedor (nombre, contacto, domicilio, ciudad, telefono, email, ActaSituacionFiscal) VALUES ( :nombre, :contacto, :domicilio, :ciudad, :telefono, :email, :ActaSituacionFiscal)";
        $query = $this->connect->prepare    ($sql);
        $query->bindParam(':nombre', $nombre);
        $query->bindParam(':contacto', $contacto);
        $query->bindParam(':domicilio', $domicilio);
        $query->bindParam(':ciudad', $ciudad);
        $query->bindParam(':telefono', $telefono);
        $query->bindParam(':email', $email);
        $query->bindParam(':ActaSituacionFiscal', $ActaSituacionFiscal);
        $request=$query->execute(); 
        return $request;
    }

    function insertResponsable( $nombre, $puesto, $usuario, $password){
        $sql = "INSERT INTO responsable ( nombre, puesto, usuario, password) VALUES ( :nombre, :puesto, :usuario, :password)";
        $query = $this->connect->prepare($sql);
        $query->bindParam(':nombre', $nombre);
        $query->bindParam(':puesto', $puesto);
        $query->bindParam(':usuario', $usuario);
        $query->bindParam(':password', $password);
        $request=$query->execute(); 
        return $request;
    }

    function updateInsumos($idInsumo, $idClasificacion, $nombre, $descripcion, $unidadMedida, $existencia, $maximo, $minimo, $costoPromedio){
        $sql = "UPDATE insumo SET idClasificacion=:idClasificacion, nombre=:nombre, descripcion=:descripcion, unidadMedida=:unidadMedida, existencia=:existencia, maximo=:maximo, minimo=:minimo, costoPromedio=:costoPromedio where idInsumo=:idInsumo";
        $query = $this->connect->prepare($sql);
        $query->bindParam(':idInsumo', $idInsumo);
        $query->bindParam(':idClasificacion', $idClasificacion);
        $query->bindParam(':nombre', $nombre);
        $query->bindParam(':descripcion', $descripcion);
        $query->bindParam(':unidadMedida', $unidadMedida);
        $query->bindParam(':existencia', $existencia);
        $query->bindParam(':maximo', $maximo);
        $query->bindParam(':minimo', $minimo);
        $query->bindParam(':costoPromedio', $costoPromedio);
        $request=$query->execute(); 
        return $request;
    }
    function updateProveedor($idProveedor, $nombre, $contacto, $domicilio, $ciudad, $telefono, $email, $ActaSituacionFiscal){
        $sql = "UPDATE proveedor SET nombre=:nombre,contacto=:contacto,domicilio=:domicilio,ciudad=:ciudad,telefono=:telefono,email=:email,ActaSituacionFiscal=:ActaSituacionFiscal where idProveedor=:idProveedor";
        $query = $this->connect->prepare($sql);
        $query->bindParam(':idProveedor', $idProveedor);
        $query->bindParam(':nombre', $nombre);
        $query->bindParam(':contacto', $contacto);
        $query->bindParam(':domicilio', $domicilio);
        $query->bindParam(':ciudad', $ciudad);
        $query->bindParam(':telefono', $telefono);
        $query->bindParam(':email', $email);
        $query->bindParam(':ActaSituacionFiscal', $ActaSituacionFiscal);
        $request=$query->execute(); 
        return $request;    
    }

    function updateResponsable($idResponsable, $nombre, $puesto, $usuario, $password){
        $sql = "UPDATE responsable SET nombre=:nombre, puesto=:puesto, usuario=:usuario, password=:password where idResponsable=:idResponsable";
        $query = $this->connect->prepare($sql);
        $query->bindParam(':idResponsable', $idResponsable);
        $query->bindParam(':nombre', $nombre);
        $query->bindParam(':puesto', $puesto);
        $query->bindParam(':usuario', $usuario);
        $query->bindParam(':password', $password);
        $request=$query->execute(); 
        return $request;
    }





//INSERT INTO ordenProduccion(idOrden, idResponsable, idPlanta, fechaOrden, fechaAproxTermino, descripcion, cantidadEsperada, cantidadLograda, fechaRealTermino, estado) VALUES ('[value-1]','[value-2]','[value-3]','[value-4]','[value-5]','[value-6]','[value-7]','[value-8]','[value-9]','[value-10]')
//UPDATE ordenProduccion SET idOrden='[value-1]',idResponsable='[value-2]',idPlanta='[value-3]',fechaOrden='[value-4]',fechaAproxTermino='[value-5]',descripcion='[value-6]',cantidadEsperada='[value-7]',cantidadLograda='[value-8]',fechaRealTermino='[value-9]',estado='[value-10]' WHERE 1


}

?>




