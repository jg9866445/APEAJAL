<?php
require_once($_SERVER['DOCUMENT_ROOT']."/src/php/connectividad.php");

class Movimientos {

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

    public function getSolicitudPlantas()
    {
        $sql = "Select s.idSolicitud,s.fecha,c.razonSocial,c.RFC,c.domicilio,c.estado,c.tipoCliente,p.municipio,p.usoPredio,e.nombre,pf.descripcion,ds.cantidadSolicitada from solicitudes as s INNER JOIN clientes as c on c.idCliente = s.idCliente INNER Join predios as p on p.idCliente=s.idCliente INNER JOIN detalleSolicitud as ds on ds.idSolicitud = s.idSolicitud INNER JOIN plantaForestal as pf on pf.idPlanta = ds.idPlanta INNER JOIN especie as e on e.idEspecie = pf.idEspecie";
        $query = $this->connect->prepare($sql);
        $query -> execute(); 
        $results = $query -> fetchAll(); 
        return $results;
    }

    public function getClientes()
    {
        $sql = "SELECT * FROM clientes";
        $query = $this->connect->prepare($sql);
        $query -> execute(); 
        $results = $query -> fetchAll(); 
        return $results;
    }

    public function getPlantasForestal(){
        $sql = "SELECT * FROM plantaForestal";
        $query = $this->connect->prepare($sql);
        $query -> execute(); 
        $results = $query -> fetchAll(); 
        return $results;
    }

    public function getPredios(){
        $sql = "SELECT p.idPredio, c.razonSocial, p.municipio, p.extencion, p.usoPredio, p.longitud, p.latitud, p.RegistroSADER FROM predios as p INNER JOIN clientes as c On c.idCliente = p.idCliente";
        $query = $this->connect->prepare($sql);
        $query -> execute(); 
        $results = $query -> fetchAll(); 
        return $results;
    }

    public function insertSolicitudPlantas($idSolicitud, $fecha){
        $sql="INSERT INTO solicitudes(idSolicitud, fecha) VALUES ( :idSolicitud, :fecha)";
        $query = $this->connect->prepare($sql);
        $query->bindParam(':idProveedor', $idProveedor);
        $query->bindParam(':factura', $fecha);
        $query->execute();
        $idOrdenCompra=$this->connect->lastInsertId();

        $sql="INSERT INTO detalleFacturaCompra(idOrdenCompra, idInsumo, cantidad, costo) VALUES (:idOrdenCompra, :idInsumo, :cantidad, :costo)";
        $query = $this->connect->prepare($sql);
        $query->bindParam(':idOrdenCompra', $idOrdenCompra);
        $query->bindParam(':idInsumo', $idInsumo);
        $query->bindParam(':cantidad', $cantidad);
        $query->bindParam(':costo', $costo);
        $query->execute();
    }
}