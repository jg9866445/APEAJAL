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
        $sql = "SELECT * from  proveedor";
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


}