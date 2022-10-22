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
        $sql = "Select vs.idVale,i.nombre as insumo,r.nombre as responsable,vs.fecha,vs.cantidad from valeSalida as vs INNER JOIN insumo as i on i.idInsumo=vs.idInsumo INNER JOIN responsable as r on r.idResponsable = vs.idResponsable;";
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

    public function getAllOrdenProduccion(){
        $sql = "SELECT op.idOrden, r.nombre as responsable,e.nombre as especie,op.fechaOrden,op.descripcion,op.estado FROM ordenProduccion as op INNER JOIN responsable as r on r.idResponsable= op.idResponsable INNER JOIN plantaForestal as pf on pf.idPlanta = op.idPlanta INNER JOIN especie as e on pf.idEspecie = e.idEspecie ";
        $query = $this->connect->prepare($sql);
        $query -> execute(); 
        $results = $query -> fetchAll(); 
        return $results;
    }

    public function getAllDevoluciones() {
        $sql = "SELECT d.idDevolucion,d.fecha, r.nombre as responsable , i.nombre as insumo , c.concepto as clasificacion,vs.cantidad as salida,d.cantidad as devolucion FROM devolucion as d INNER JOIN valeSalida as vs on vs.idVale = d.idVale INNER JOIN responsable as r on r.idResponsable = vs.idResponsable INNER JOIN insumo as i on i.idInsumo = vs.idInsumo  INNER JOIN clasificacion as c on c.idClasificacion = i.idClasificacion";
        $query = $this->connect->prepare($sql);
        $query -> execute(); 
        $results = $query -> fetchAll(); 
        return $results;
    }

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
        $sql = "SELECT r.nombre AS NombreResponsable , r.puesto AS PuestoResponsable, i.idInsumo as idInsumo , i.nombre as NombreInsumo, c.concepto as CategoriaInsumo, i.descripcion as DescripcionInsumo, i.unidad as UnidadInsumos, i.existencias as ExistenciaInsumos , i.costoPromedio as Precio,ro.nombre as NombreResponsableOrden,ro.puesto as PuestoResponsableOrden,e.nombre as NombrePlanta,pf.descripcion as DescripcionPlanta, pf.existencia as ExistenciaPlanta,op.fechaAproxTermino as FechaAproxTermino ,op.descripcion as DecripcionOrden , op.cantidadEsperada as CantidaEspera,vs.cantidad as CantidadRetirada FROM valeSalida as vs INNER JOIN responsable as r ON r.idResponsable=vs.idResponsable INNER JOIN insumo as i ON vs.idInsumo=i.idInsumo INNER JOIN clasificacion as c on i.idClasificacion=c.idClasificacion INNER JOIN ordenProduccion as op ON op.idOrden=vs.idOrden INNER JOIN responsable as ro ON r.idResponsable=op.idResponsable INNER JOIN plantaForestal as pf ON pf.idPlanta = op.idPlanta INNER JOIN especie as e ON e.idEspecie = pf.idEspecie where vs.idVale = :idVale";
        $query = $this->connect->prepare($sql);
        $query->bindParam(':idVale', $idVale);
        $query -> execute(); 
        $results = $query -> fetchAll(); 
        return $results;
    }

    public function getOrdenesProduccion($idOrden){
        $sql = "SELECT r.nombre as responsable,r.puesto,e.nombre as planta,pf.descripcion,pf.existencia,op.fechaAproxTermino,op.descripcion as descripcionOrden,op.cantidadEsperada from ordenProduccion as op  INNER JOIN responsable as r on r.idResponsable=op.idResponsable INNER JOIN plantaForestal as pf ON op.idPlanta=pf.idPlanta INNER JOIN especie as e on e.idEspecie= pf.idEspecie WHERE op.idOrden=:idOrden";
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
        $sql="INSERT INTO ordenProduccion(idResponsable, idPlanta, fechaOrden, fechaAproxTermino, descripcion, cantidadEsperada, estado) VALUES ( :idResponsable, :idPlanta, :fechaOrden, :fechaAproxTermino, :descripcion, :cantidadEsperada, 'Pendiente')";
        $query = $this->connect->prepare($sql);
        $query->bindParam(':idResponsable', $idResponsable);
        $query->bindParam(':idPlanta', $idPlanta);
        $query->bindParam(':fechaOrden', $fechaOrden);
        $query->bindParam(':fechaAproxTermino', $fechaAproxTermino);
        $query->bindParam(':descripcion', $descripcion);
        $query->bindParam(':cantidadEsperada', $cantidadEsperada);
        $query->execute();
        $idOrdenCompra=$this->connect->lastInsertId();
        return $idOrdenCompra;
    }

    public function cancelarOrdenProduccion($idOrdenProduccion){
        $sql="UPDATE ordenProduccion SET estado='Cancelado' WHERE  idOrden=:idOrdenProduccion";
        $query = $this->connect->prepare($sql);
        $query->bindParam(':idOrdenProduccion', $idOrdenProduccion);
        $query->execute();
    }

    public function TerminarOrdenProduccion($idOrdenProduccion,$fechaReal,$CantidadLograda,$CostoProduccion){
        $sql="UPDATE ordenProduccion SET cantidadLograda=:CantidadLograda , fechaRealTermino=:fechaReal , estado='Terminado',CostoProduccion=:CostoProduccion WHERE  idOrden=:idOrdenProduccion";
        $query = $this->connect->prepare($sql);
        $query->bindParam(':idOrdenProduccion', $idOrdenProduccion);
        $query->bindParam(':fechaReal', $fechaReal);
        $query->bindParam(':CantidadLograda', $CantidadLograda);
        $query->bindParam(':CostoProduccion', $CostoProduccion);
        $query->execute();

        $sql="SELECT pf.existencia,pf.idPlanta from ordenProduccion as op INNER JOIN plantaForestal as pf  on op.idPlanta=pf.idPlanta WHERE op.idOrden=:idOrdenProduccion";
        $query = $this->connect->prepare($sql);
        $query->bindParam(':idOrdenProduccion', $idOrdenProduccion );
        $query->execute();

        $request=$query->fetchAll();
        $existencias=$request[0]['existencia']+$CantidadLograda;
        var_dump($request[0]['existencia']);
        $idPlanta=$request[0]['idPlanta'];

        $sql="UPDATE plantaForestal SET existencia=:existencia WHERE idPlanta=:idPlanta";
        $query = $this->connect->prepare($sql);
        $query->bindParam(':existencia', $existencias);
        $query->bindParam(':idPlanta', $idPlanta);
         $query->execute();
    }

    public function InsertValeSalida( $idInsumo,$idOrden, $idResponsable, $fecha, $cantidad){
        $sql="INSERT INTO valeSalida( idInsumo,idOrden, idResponsable, fecha, cantidad) VALUES (:idInsumo, :idOrden,:idResponsable, :fecha, :cantidad)";
        $query = $this->connect->prepare($sql);
        $query->bindParam(':idInsumo', $idInsumo);
        $query->bindParam(':idOrden', $idOrden);
        $query->bindParam(':idResponsable', $idResponsable);
        $query->bindParam(':fecha', $fecha);
        $query->bindParam(':cantidad', $cantidad);
        $query->execute();

        $sql="SELECT existencias FROM insumo WHERE idInsumo= :idInsumo";
        $query = $this->connect->prepare($sql);
        $query->bindParam(':idInsumo', $idInsumo );
        $query->execute();

        $request=$query->fetchAll();
        $existencias=$request[0]['existencias']-$cantidad;
            
        $sql="UPDATE insumo SET existencias=:existencias WHERE idInsumo= :idInsumo";
        $query = $this->connect->prepare($sql);
        $query->bindParam(':existencias', $existencias);
        $query->bindParam(':idInsumo', $idInsumo);
        $query->execute();
    }

    public function insertDevolucion( $idVale, $idInsumo, $fecha, $cantidad){
        $sql="INSERT INTO devolucion( idVale, idInsumo, fecha, cantidad) VALUES ( :idVale, :idInsumo, :fecha, :cantidad)";
        $query = $this->connect->prepare($sql);
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