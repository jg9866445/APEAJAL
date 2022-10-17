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


//Funciones de get 

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

    public function getAllResponsables() {
        $sql = "SELECT * from proveedor";
        $query = $this->connect->prepare($sql);
        $query -> execute(); 
        $results = $query -> fetchAll(); 
        return $results;
    }

    public function getAllPlanta(){
        $sql = "SELECT pf.idPlanta,e.nombre FROM plantaForestal as pf INNER JOIN especie as e on pf.idEspecie = e.idEspecie";
        $query = $this->connect->prepare($sql);
        $query -> execute(); 
        $results = $query -> fetchAll(); 
        return $results;
    }

    public function getAllComprasInsumos(){
        $sql = "SELECT fc.idOrdenCompra,p.nombre,fc.factura,fc.fecha, fc.total  from  facturaCompra as fc INNER JOIN proveedor as p on fc.idProveedor= p.idProveedor";
        $query = $this->connect->prepare($sql);
        $query -> execute(); 
        $results = $query -> fetchAll(); 
        return $results;
    }

    function getAllOrdenProduccion(){
        $sql = "Select * FROM ordenProduccion";
        $query = $this->connect->prepare($sql);
        $query -> execute(); 
        $results = $query -> fetchAll(); 
        return $results;
    }
    
    //funciones de get individual

    public function getProveedore($idProveedor) {
        $sql = "SELECT * from  proveedor WHERE idProveedor=:idProveedor";
        $query = $this->connect->prepare($sql);
        $query->bindParam(':idProveedor', $idProveedor);
        $query -> execute(); 
        $results = $query -> fetchAll(); 
        return $results;
    }

    public function getInsumo($idInsumo){
        $sql = "SELECT i.nombre,i.existencias,i.unidadMetrica,c.concepto from  insumo as i INNER JOIN clasificacion as c on i.idClasificacion = c.idClasificacion WHERE i.idInsumo=:idInsumo";
        $query = $this->connect->prepare($sql);
        $query->bindParam(':idInsumo', $idInsumo);
        $query -> execute(); 
        $results = $query -> fetchAll(); 
        return $results;
    }

    public function getResponsable($idResponsable) {
        $sql = "SELECT * from  responsable WHERE idResponsable=:idResponsable";
        $query = $this->connect->prepare($sql);
        $query->bindParam(':idResponsable', $idResponsable);
        $query -> execute(); 
        $results = $query -> fetchAll(); 
        return $results;
    }

    public function getPlanta($idPlanta){
        $sql = "SELECT pf.idPlanta,pf.descripcion,pf.existencia,e.nombre FROM plantaForestal as pf INNER JOIN especie as e on pf.idEspecie = e.idEspecie WHERE idPlanta=:idPlanta";
        $query = $this->connect->prepare($sql);
        $query->bindParam(':idPlanta', $idPlanta);
        $query -> execute(); 
        $results = $query -> fetchAll(); 
        return $results;
    }

//INSERT a base de datos

    public function insertCompraInsumos($fechaCompraInsumos,$idProveedor,$factura,$total){
        $sql="INSERT INTO facturaCompra(idProveedor, factura, fecha, total) VALUES ( :idProveedor, :factura, :fecha, :total)";
        $query = $this->connect->prepare($sql);
        $query->bindParam(':idProveedor', $idProveedor);
        $query->bindParam(':factura', $factura);
        $query->bindParam(':fecha', $fechaCompraInsumos);
        $query->bindParam(':total', $total);
        $query->execute();
        $idOrdenCompra=$this->connect->lastInsertId();
        return $idOrdenCompra;
    }
    
    public function insertDetalleCompra($idCompra,$detalles){
        foreach ($detalles as $value) {
            $sql="INSERT INTO detalleFacturaCompra(idOrdenCompra, idInsumo, cantidad, costo) VALUES (:idOrdenCompra, :idInsumo, :cantidad, :costo)";
            $query = $this->connect->prepare($sql);
            $query->bindParam(':idOrdenCompra', $idCompra);
            $query->bindParam(':idInsumo', $value->idInsumo);
            $query->bindParam(':cantidad', $value->Cantidad);
            $query->bindParam(':costo', $value->Costo);
            $query->execute();

            $sql="SELECT existencias FROM insumo WHERE idInsumo= :idInsumo";
            $query = $this->connect->prepare($sql);
            $query->bindParam(':idInsumo', $value->idInsumo );
            $query->execute();

            $request=$query->fetchAll();
            $existencias=$request[0]['existencias']+$value->Cantidad;
            
            $sql="UPDATE insumo SET existencias=:existencias WHERE idInsumo= :idInsumo";
            $query = $this->connect->prepare($sql);
            $query->bindParam(':existencias', $existencias);
            $query->bindParam(':idInsumo', $value->idInsumo);
            $query->execute();
        }        
    }


//FUNCIOANES AUXILARES
    function GuardarArchivo($ubicacion,$nombre,$files){
        $nombre=$nombre.".pdf";
        $carpetaDestino=$ubicacion;
        if(isset($files["file"]))
            {
                if($files["file"]["type"]=="application/pdf")
                {
                    if(!file_exists($carpetaDestino)){
                        mkdir($carpetaDestino, 0777);
                    }
                    $origen=$files["file"]["tmp_name"];
                    $destino=$carpetaDestino.$nombre;
                    if(move_uploaded_file($origen, $destino))
                    {
                    }else{
                            echo("Error : archivos no movido");
                        }
                }else{
                    echo("Error : archivos no es pdf");
                }
            }else{
                echo("Error : archivos no encotrados");
            }
    }


        function getNextIdCompra(){
        $sql = "SELECT AUTO_INCREMENT  FROM information_schema.TABLES WHERE TABLE_SCHEMA = 'recidenciacyj_apeajal' AND TABLE_NAME = 'facturaCompra'";
        $query = $this->connect->prepare($sql);
        $query -> execute(); 
        $results = $query -> fetchAll(); 
        return $results;
    }



//INSUMO SE AUMENTA 
}