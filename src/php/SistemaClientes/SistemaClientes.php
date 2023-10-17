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

    public function ISlogin($dato){
        $sql = "SELECT IF(COUNT(*)>0,TRUE,FALSE) AS ISlogin from clientes AS C WHERE C.RFC = :RFC OR C.CURP = :CURP;";
        $query = $this->connect->prepare($sql);
        $query->bindParam(':RFC', $dato);
        $query->bindParam(':CURP', $dato);
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
        $query->bindParam(":domicilio", ucwords($domicilio));
        $query->bindParam(":ciudad", ucwords($ciudad));
        $query->bindParam(":estado", ucwords($estado));
        $query->bindParam(":email",$email);
        $query->bindParam(":telefono",$telefono);
        $query->bindParam(":celular",$celular);
        $query->bindParam(":tipoCliente",$tipoCliente);
        $request=$query->execute(); 
        $idCliente=$this->connect->lastInsertId();
        return $idCliente;
    }

    public function insertPredios( $idCliente, $municipio, $extencion, $usoPredio, $longitud, $latitud){
        $sql = "INSERT INTO predios( idCliente, municipio, extencion, usoPredio, longitud, latitud) VALUES ( :idCliente, :municipio, :extencion, :usoPredio, :longitud, :latitud)";
        $query = $this->connect->prepare($sql);
        $query->bindParam(':idCliente', $idCliente);
        $query->bindParam(':municipio',  ucwords($municipio));
        $query->bindParam(':extencion',  ucwords($extencion));
        $query->bindParam(':usoPredio',  ucwords($usoPredio));
        $query->bindParam(':longitud', $longitud);
        $query->bindParam(':latitud', $latitud);
        $request=$query->execute(); 
        return $request;
    }

    public function insertSolicitud($idCliente,$fecha,$total,$idResponsable){
        $sql="INSERT INTO solicitudes(idCliente, fecha, estado, idResponsable, total) VALUES ( :idCliente, :fecha, 'Pendiente', :idResponsable,:total)";
        $query = $this->connect->prepare($sql);
        $query->bindParam(':idCliente', $idCliente);
        $query->bindParam(':fecha', $fecha);
        $query->bindParam(':total', $total);
        $query->bindParam(':idResponsable', $idResponsable);
        $query->execute();
        $idOrdenCompra=$this->connect->lastInsertId();
        return $idOrdenCompra;
    }
    
    public function insertDetallesSolicitud($idSolicitud,$detalles){
        foreach ($detalles as $value) {
            $sql="INSERT INTO detalleSolicitud(idSolicitud, idPredio, idPlanta, cantidadSolicitada, precio) VALUES (:idSolicitud, :idPredio, :idPlanta, :cantidadSolicitada,:precio)";
            $query = $this->connect->prepare($sql);
            $query->bindParam(':idSolicitud', $idSolicitud);
            $query->bindParam(':idPredio', $value->predio);
            $query->bindParam(':idPlanta', $value->planta);
            $query->bindParam(':cantidadSolicitada', $value->Cantidad);
            $query->bindParam(':precio', $value->precio);
            $query->execute();
        }        
    }

    public function getAllPrediosforTabla($dato){
        $sql = "SELECT * from predios as p inner join clientes as c on p.idCliente = c.idCliente WHERE c.RFC = :RFC OR c.CURP = :CURP";
        $query = $this->connect->prepare($sql);
        $query->bindParam(":RFC",$dato);
        $query->bindParam(":CURP",$dato);

        $query -> execute(); 
        $results = $query -> fetchAll(); 
        return $results;
    }

    public function getAllPrediosforSelect($idCliente){
        $sql = "SELECT * FROM predios as p WHERE p.idCliente=:idCliente;";
        $query = $this->connect->prepare($sql);
        $query->bindParam(':idCliente', $idCliente);
        $query -> execute(); 
        $results = $query -> fetchAll(); 
        return $results;
    }
    
    public function getAllPredio($idPredio){
        $sql = "SELECT * FROM predios as p INNER JOIN clientes as c ON c.idCliente=p.idCliente WHERE p.idPredio = :idPredio";
        $query = $this->connect->prepare($sql);
        $query->bindParam(':idPredio', $idPredio);
        $query -> execute(); 
        $results = $query -> fetchAll(); 
        return $results;
    }
    
    public function getAllSolicitudPlantasforTabla($dato){
        $sql = "Select s.idSolicitud,s.fecha, r.nombre, c.razonSocial,c.RFC,c.CURP,c.tipoCliente,s.estado from solicitudes as s INNER JOIN clientes as c on c.idCliente = s.idCliente INNER JOIN responsable as r on r.idResponsable = s.idResponsable WHERE c.RFC = :RFC OR c.CURP = :CURP;";
        $query = $this->connect->prepare($sql);
        $query->bindParam(":RFC",$dato);
        $query->bindParam(":CURP",$dato);
        $query -> execute(); 
        $results = $query -> fetchAll(); 
        return $results;
    }

    public function getAllPlantasfolestalesSelect(){
        $sql = "SELECT pf.idPlanta,e.nombre FROM plantaForestal as pf INNER JOIN especie as e ON e.idEspecie = pf.idEspecie";
        $query = $this->connect->prepare($sql);
        $query -> execute(); 
        $results = $query -> fetchAll(); 
        return $results;
    }

    
    public function getPlantasForestal($idPlanta){
        $sql = "SELECT e.nombre,p.*  from  plantaForestal as p INNER JOIN especie as e on p.idEspecie = e.idEspecie where p.idPlanta = :idPlanta";
        $query = $this->connect->prepare($sql);
        $query->bindParam(':idPlanta', $idPlanta);
        $query -> execute(); 
        $results = $query -> fetchAll(); 
        return $results;
    }

        
    public function getClientes($dato){
        $sql = "SELECT * FROM clientes where RFC = :RFC OR CURP = :CURP;";
        $query = $this->connect->prepare($sql);
        $query->bindParam(':RFC', $dato);
        $query->bindParam(':CURP', $dato);
        $query -> execute(); 
        $results = $query -> fetchAll(); 
        return $results;
    }
   
    public function getSolicitudPlantas($idSolicitud){
        $sql = "SELECT c.idCliente, c.razonSocial, c.domicilio,c.celular, c.RFC,c.CURP, c.telefono,c.tipoCliente, s.fecha, s.estado,s.total, r.nombre, r.puesto  from  solicitudes as s INNER JOIN clientes as c on s.idCliente = c.idCliente INNER JOIN responsable as r on s.idResponsable = r.idResponsable where s.idSolicitud = :idSolicitud";
        $query = $this->connect->prepare($sql);
        $query->bindParam(':idSolicitud', $idSolicitud);
        $query -> execute(); 
        $results = $query -> fetchAll(); 
        return $results;
    }    

    public function getDetallesSolicitudPlantas($idSolicitud){
        $sql = "Select p.idPredio, p.municipio, p.extencion, p.latitud, p.longitud, pf.idPlanta, e.nombre,pf.descripcion, ds.precio, ds.cantidadSolicitada FROM detalleSolicitud as ds INNER JOIN predios as p ON ds.idPredio = p.idPredio INNER JOIN plantaForestal as pf ON ds.idPlanta = pf.idPlanta INNER JOIN especie AS e ON pf.idEspecie = e.idEspecie WHERE idSolicitud= :idSolicitud";
        $query = $this->connect->prepare($sql);
        $query->bindParam(':idSolicitud', $idSolicitud);
        $query -> execute(); 
        $results = $query -> fetchAll(); 
        return $results;
    }
    
}