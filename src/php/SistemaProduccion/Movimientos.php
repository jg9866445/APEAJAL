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

    //funciones para llenar select
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
        $sql = "SELECT * from responsable";
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

    public function getAllSalidas(){
        $sql = "SELECT * from valeSalida";
        $query = $this->connect->prepare($sql);
        $query -> execute(); 
        $results = $query -> fetchAll(); 
        return $results;
    }

    //Tablas de inicios

    public function getAllComprasInsumos(){
        $sql = "SELECT fc.idOrdenCompra,p.nombre,fc.factura,fc.fecha, fc.total  from  facturaCompra as fc INNER JOIN proveedor as p on fc.idProveedor= p.idProveedor";
        $query = $this->connect->prepare($sql);
        $query -> execute(); 
        $results = $query -> fetchAll(); 
        return $results;
    }

    public function getAllOrdenProduccion(){
        $sql = "SELECT * FROM ordenProduccion WHERE estado <> 'Terminado' AND  estado <> 'Cancelado'";
        $query = $this->connect->prepare($sql);
        $query -> execute(); 
        $results = $query -> fetchAll(); 
        return $results;
    }
    
    public function getAllValeSalida(){
        $sql = "SELECT vs.fecha, r.nombre as responsable ,i.nombre as insumo,c.concepto as clasificacion, vs.cantidad from valeSalida as vs INNER JOIN responsable as r on r.idResponsable = vs.idResponsable INNER JOIN insumo as i  on i.idInsumo =vs.idInsumo INNER join clasificacion as c ON c.idClasificacion = i.idClasificacion";
        $query = $this->connect->prepare($sql);
        $query -> execute(); 
        $results = $query -> fetchAll(); 
        return $results;
    }

    public function getAllDevoluciones() {
        $sql = "SELECT d.fecha, r.nombre as responsable , i.nombre as insumo , c.concepto as clasificacion,vs.cantidad as salida,d.cantidad as devolucion FROM devolucion as d INNER JOIN valeSalida as vs on vs.idVale = d.idVale INNER JOIN responsable as r on r.idResponsable = vs.idResponsable INNER JOIN insumo as i on i.idInsumo = vs.idInsumo  INNER JOIN clasificacion as c on c.idClasificacion = i.idClasificacion";
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
        $sql = "SELECT i.nombre,i.existencias,i.unidad,c.concepto,i.maximo,i.minimo,i.costoPromedio      from  insumo as i INNER JOIN clasificacion as c on i.idClasificacion = c.idClasificacion WHERE i.idInsumo=:idInsumo";
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

    public function getValeSalida($idVale){
        $sql = "SELECT vs.fecha, r.nombre as responsable,r.puesto,i.nombre as insumo, i.descripcion,i.unidadMetrica,i.existencias,vs.cantidad FROM valeSalida AS vs INNER JOIN responsable as r on r.idResponsable = vs.idResponsable INNER JOIN insumo as i on i.idInsumo = vs.idInsumo INNER JOIN clasificacion as c on i.idClasificacion = c.idClasificacion WHERE vs.idVale = :idVale";
        $query = $this->connect->prepare($sql);
        $query->bindParam(':idVale', $idVale);
        $query -> execute(); 
        $results = $query -> fetchAll(); 
        return $results;
    }

    public function getOrdenProduccion($idOrden){
        $sql = "Select r.nombre as responsable,r.puesto,e.nombre as planta,pf.descripcion,pf.existencia,op.fechaAproxTermino,op.descripcion as descripcionOrden,op.cantidadEsperada from ordenProduccion as op  INNER JOIN responsable as r on r.idResponsable=op.idResponsable INNER JOIN plantaForestal as pf ON op.idPlanta=pf.idPlanta INNER JOIN especie as e on e.idEspecie= pf.idEspecie WHERE op.idOrden=:idOrden";
        $query = $this->connect->prepare($sql);
        $query->bindParam(':idOrden', $idOrden);
        $query -> execute(); 
        $results = $query -> fetchAll(); 
        return $results;
    }



    

    //INSERT AQUI SE INSERTA TODO
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
    //TODO:Dejate de mamdas cabron y haslo normal cuando pase todo esto
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
    
    public function insertOrdenProduccion( $idResponsable, $idPlanta, $fechaOrden, $fechaAproxTermino, $descripcion, $cantidadEsperada){
        $sql="INSERT INTO ordenProduccion(idResponsable, idPlanta, fechaOrden, fechaAproxTermino, descripcion, cantidadEsperada, estado) VALUES ( :idResponsable, :idPlanta, :fechaOrden, :fechaAproxTermino, :descripcion, :cantidadEsperada)";
        $query = $this->connect->prepare($sql);
        $query->bindParam(':idResponsable', $idResponsable);
        $query->bindParam(':idPlanta', $idPlanta);
        $query->bindParam(':fechaOrden', $fechaOrden);
        $query->bindParam(':fechaAproxTermino', $fechaAproxTermino);
        $query->bindParam(':descripcion', $descripcion);
        $query->bindParam(':cantidadEsperada', $cantidadEsperada);
        $query->bindParam(':estado', "Pendiente");
        $query->execute();
        $idOrdenCompra=$this->connect->lastInsertId();
        return $idOrdenCompra;
    }

    public function cancelarOrdenProduccion($idOrdenProduccion){
        $sql="UPDATE ordenProduccion SET estado=:estado WHERE  idOrden=:idOrdenProduccion";
        $query = $this->connect->prepare($sql);
        $query->bindParam(':idResponsable', $idOrdenProduccion);
        $query->bindParam(':estado', "Cancelado");
        $query->execute();
    }

    public function TerminarOrdenProduccion($idOrdenProduccion,$fechaReal,$CantidadLograda,$CostoProduccion){
        $sql="UPDATE ordenProduccion SET cantidadLograda=:CantidadLograda,fechaRealTermino=:fechaReal,estado=:estado WHERE  idOrden=:idOrdenProduccion";
        $query = $this->connect->prepare($sql);
        $query->bindParam(':idOrdenProduccion', $idOrdenProduccion);
        $query->bindParam(':fechaReal', $fechaReal);
        $query->bindParam(':CantidadLograda', $CantidadLograda);
        $query->bindParam(':estado', "Terminado");

        $query->execute();

        $sql="SELECT pf.existencia from ordenProduccion as op INNER JOIN plantaForestal as pf  on op.idPlanta=pf.idPlanta WHERE op.idOrden=:idOrden";
        $query = $this->connect->prepare($sql);
        $query->bindParam(':idOrdenProduccion', $idOrdenProduccion );
        $query->execute();

        $request=$query->fetchAll();
        $existencias=$request[0]['existencias']+$CantidadLograda;
            
        $sql="UPDATE plantaForestal SET existencia WHERE idOrden=:idOrden";
        $query = $this->connect->prepare($sql);
        $query->bindParam(':existencias', $existencias);
        $query->bindParam(':idOrden', $idOrdenProduccion);
         $query->execute();
    }



    public function InsertValeSalida($idVale, $idInsumo, $idResponsable, $fecha, $cantidad){
        $sql="INSERT INTO valeSalida(idVale, idInsumo, idResponsable, fecha, cantidad) VALUES (idVale, idInsumo, idResponsable, fecha, cantidad)";
        $query = $this->connect->prepare($sql);
        $query->bindParam(':idVale', $idVale);
        $query->bindParam(':idInsumo', $idInsumo);
        $query->bindParam(':idResponsable', $idResponsable);
        $query->bindParam(':fecha', $fecha);
        $query->bindParam(':cantidad', $cantidad);
        $query->execute();
    }

    public function insertDevolucion($idDevolucion, $idVale, $idInsumo, $fecha, $cantidad){
        $sql="INSERT INTO devolucion(idDevolucion, idVale, idInsumo, fecha, cantidad) VALUES (idDevolucion, idVale, idInsumo, fecha, cantidad)";
        $query = $this->connect->prepare($sql);
        $query->bindParam(':idDevolucion', $idDevolucion);
        $query->bindParam(':idVale', $idVale);
        $query->bindParam(':idInsumo', $idInsumo);
        $query->bindParam(':fecha', $fecha);
        $query->bindParam(':cantidad', $cantidad);
        $query->execute();
    }

    //NEXT IDS
    function getNextIdCompra(){
        $sql = "SELECT AUTO_INCREMENT  FROM information_schema.TABLES WHERE TABLE_SCHEMA = 'recidenciacyj_apeajal' AND TABLE_NAME = 'facturaCompra'";
        $query = $this->connect->prepare($sql);
        $query -> execute(); 
        $results = $query -> fetchAll(); 
        return $results;
    }

    function getNextidSalida(){
        $sql = "SELECT AUTO_INCREMENT  FROM information_schema.TABLES WHERE TABLE_SCHEMA = 'recidenciacyj_apeajal' AND TABLE_NAME = 'valeSalida'";
        $query = $this->connect->prepare($sql);
        $query -> execute(); 
        $results = $query -> fetchAll(); 
        return $results;
    }

    function getNextidOrdenProduccion(){
        $sql = "SELECT AUTO_INCREMENT  FROM information_schema.TABLES WHERE TABLE_SCHEMA = 'recidenciacyj_apeajal' AND TABLE_NAME = 'ordenProduccion'";
        $query = $this->connect->prepare($sql);
        $query -> execute(); 
        $results = $query -> fetchAll(); 
        return $results;
    }

    function getNextidDevolucion(){
        $sql = "SELECT AUTO_INCREMENT  FROM information_schema.TABLES WHERE TABLE_SCHEMA = 'recidenciacyj_apeajal' AND TABLE_NAME = 'devolucion'";
        $query = $this->connect->prepare($sql);
        $query -> execute(); 
        $results = $query -> fetchAll(); 
        return $results;
    }

}