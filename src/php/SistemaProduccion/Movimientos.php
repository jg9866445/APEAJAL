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

    public function getAllComprasInsumos(){
        $sql = "SELECT fc.idOrdenCompra,fc.factura,fc.fecha,p.nombre as 'proveedores',i.nombre as 'insumos',dfc.cantidad,dfc.costo,fc.total from  facturaCompras as fc INNER JOIN proveedor as p on fc.idProveedor= p.idProveedor INNER JOIN detalleFacturaCompra as dfc on fc.idOrdenCompra = dfc.idOrdenCompra INNER JOIN insumo as i on i.idInsumo = dfc.idInsumo";
        $query = $this->connect->prepare($sql);
        $query -> execute(); 
        $results = $query -> fetchAll(); 
        return $results;
    }

    public function getAllProveedores() {
        $sql = "SELECT * from proveedor";
        $query = $this->connect->prepare($sql);
        $query -> execute(); 
        $results = $query -> fetchAll(); 
        return $results;
    }

    public function getAllInsumos(){
        $sql = "SELECT * from  insumo";
        $query = $this->connect->prepare($sql);
        $query -> execute(); 
        $results = $query -> fetchAll(); 
        return $results;
    }
    
    public function getProveedores($idProveedor) {
        $sql = "SELECT * from  proveedor WHERE idProveedor=:idProveedor";
        $query = $this->connect->prepare($sql);
        $query->bindParam(':idProveedor', $idProveedor);
        $query -> execute(); 
        $results = $query -> fetchAll(); 
        return $results;
    }

    public function getInsumos($idInsumo){
        $sql = "SELECT * FROM insumo WHERE idInsumo=:idInsumo";
        $query = $this->connect->prepare($sql);
        $query->bindParam(':idInsumo', $idInsumo);
        $query -> execute(); 
        $results = $query -> fetchAll(); 
        return $results;
    }

    public function getAllResponsables(){
        $sql = "SELECT * FROM responsable";
        $query = $this->connect->prepare($sql);
        $query -> execute(); 
        $results = $query -> fetchAll(); 
        return $results;
    }

    public function getAllPlantasForestales(){
        $sql = "Select pf.idPlanta,e.nombre from plantaForestal as pf INNER JOIN especie as e = e.idEspecie = pf.idEspecie";
        $query = $this->connect->prepare($sql);
        $query -> execute(); 
        $results = $query -> fetchAll(); 
        return $results;
    }


    function getAllOrdenProduccion(){
        $sql = "Select op.idOrden,r.nombre as 'Responsable',r.puesto,e.nombre as 'Planta',pf.descripcion,op.fechaOrden,op.fechaAproxTermino,op.descripcion as 'detalleOrden',op.cantidadEsperada,op.cantidadLograda,op.fechaRealTermino,op.estado from ordenProduccion as op INNER JOIN responsable as r on op.idResponsable = r.idResponsable INNER JOIN plantaForestal as pf on pf.idPlanta = op.idPlanta INNER JOIN especie as e ON e.idEspecie = pf.idEspecie;";
        $query = $this->connect->prepare($sql);
        $query -> execute(); 
        $results = $query -> fetchAll(); 
        return $results;
    }


    public function insertCompraInsumos($fechaCompraInsumos,$idProveedor,$idInsumo,$cantidad,$costo,$factura,$total){
        $sql="INSERT INTO facturaCompras(idProveedor, factura, fecha, total) VALUES ( :idProveedor, :factura, :fecha, :total)";
        $query = $this->connect->prepare($sql);
        $query->bindParam(':idProveedor', $idProveedor);
        $query->bindParam(':factura', $factura);
        $query->bindParam(':fecha', $fechaCompraInsumos);
        $query->bindParam(':total', $total);
        $query->execute();
        $idOrdenCompra=$this->connect->lastInsertId();

        $sql="INSERT INTO detalleFacturaCompra(idOrdenCompra, idInsumo, cantidad, costo) VALUES (:idOrdenCompra, :idInsumo, :cantidad, :costo)";
        $query = $this->connect->prepare($sql);
        $query->bindParam(':idOrdenCompra', $idOrdenCompra);
        $query->bindParam(':idInsumo', $idInsumo);
        $query->bindParam(':cantidad', $cantidad);
        $query->bindParam(':costo', $costo);
        $query->execute();

        $sql="SELECT existencias FROM insumo WHERE idInsumo= :idInsumo";
        $query = $this->connect->prepare($sql);
        $query->bindParam(':idInsumo', $idInsumo);
        $query->execute();

        $request=$query->fetchAll();
        $existencias=$request[0]['existencias']+$cantidad;

        $sql="UPDATE insumo SET existencias=:existencias WHERE idInsumo= :idInsumo";
        $query = $this->connect->prepare($sql);
        $query->bindParam(':existencias', $existencias);
        $query->bindParam(':idInsumo', $idInsumo);
        $query->execute();

        return $request;
    }



//INSUMO SE AUMENTA 
}