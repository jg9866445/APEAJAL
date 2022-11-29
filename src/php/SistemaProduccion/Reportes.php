<?php
require_once($_SERVER['DOCUMENT_ROOT']."/src/php/connectividad.php");

class Reportes {

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

    public function RCompraInumos($fi,$ff){
        $sql = "SELECT p.nombre,fc.factura,fc.fecha,c.concepto,i.nombre,i.unidad,dfc.cantidad,dfc.costo,(dfc.cantidad*dfc.costo) as 'importe' from facturaCompra as fc INNER JOIN proveedor as p on p.idProveedor=fc.idProveedor INNER JOIN detalleFacturaCompra as dfc ON dfc.idOrdenCompra=fc.idOrdenCompra INNER JOIN insumo as i On dfc.idInsumo=i.idInsumo INNER JOIN clasificacion as c ON c.idClasificacion=i.idClasificacion WHERE  fc.fecha BETWEEN :fi AND :ff ORDER BY p.idProveedor,fc.factura ;";
        $query = $this->connect->prepare($sql);
        $query->bindParam(':fi', $fi,PDO::PARAM_STR);
        $query->bindParam(':ff', $ff,PDO::PARAM_STR);
        $query -> execute(); 
        $results = $query -> fetchAll(); 
        return $results;
    }

    public function RCompraInumosProveedor($idProveedor,$fi,$ff){
        $sql = "SELECT fc.factura,fc.fecha,c.concepto,i.nombre,i.unidad,dfc.cantidad,dfc.costo,(dfc.cantidad*dfc.costo) as 'importe' from facturaCompra as fc INNER JOIN proveedor as p on p.idProveedor=fc.idProveedor INNER JOIN detalleFacturaCompra as dfc ON dfc.idOrdenCompra=fc.idOrdenCompra INNER JOIN insumo as i On dfc.idInsumo=i.idInsumo INNER JOIN clasificacion as c ON c.idClasificacion=i.idClasificacion WHERE  fc.fecha BETWEEN :fi AND :ff and p.idProveedor = :idProveedor ORDER BY p.idProveedor,fc.factura ;";
        $query = $this->connect->prepare($sql);
        $query->bindParam(':fi', $fi,PDO::PARAM_STR);
        $query->bindParam(':ff', $ff,PDO::PARAM_STR);
        $query->bindParam(':idProveedor', $idProveedor);
        $query -> execute(); 
        $results = $query -> fetchAll(); 
        
        $sql = "SELECT * from  proveedor where idProveedor=:idProveedor";
        $query = $this->connect->prepare($sql);
        $query->bindParam(':idProveedor', $idProveedor);
        $query -> execute(); 
        $results2 = $query -> fetchAll(); 
        $datos=[
            "detalles"=>$results,
            "Proveedor"=>$results2
        ];
        return $datos;
    }

    public function RCompraClasificacion($idClasificacion,$fi,$ff){
        $sql = "SELECT p.nombre,fc.factura,fc.fecha,i.nombre,i.unidad,dfc.cantidad,dfc.costo,(dfc.cantidad*dfc.costo) as 'importe'  from facturaCompra as fc INNER JOIN proveedor as p on p.idProveedor=fc.idProveedor INNER JOIN detalleFacturaCompra as dfc ON dfc.idOrdenCompra=fc.idOrdenCompra INNER JOIN insumo as i On dfc.idInsumo=i.idInsumo INNER JOIN clasificacion as c ON c.idClasificacion=i.idClasificacion WHERE  fc.fecha BETWEEN :fi AND :ff and c.idClasificacion = :idClasificacion ORDER BY c.idClasificacion,fc.factura ;";
        $query = $this->connect->prepare($sql);
        $query->bindParam(':fi', $fi,PDO::PARAM_STR);
        $query->bindParam(':ff', $ff,PDO::PARAM_STR);
        $query->bindParam(':idClasificacion', $idClasificacion);
        $query -> execute(); 
        $results = $query -> fetchAll(); 

        $sql = "SELECT * from  clasificacion where idClasificacion=:idClasificacion";
        $query = $this->connect->prepare($sql);
        $query->bindParam(':idClasificacion', $idClasificacion);
        $query -> execute(); 
        $results2 = $query -> fetchAll(); 
        $datos=[
            "detalles"=>$results,
            "Clasificacion"=>$results2
        ];
        return $datos;
    }
    
    public function RInusmosClasificacion($idClasificacion){
        $sql = "SELECT * FROM insumo as i WHERE i.idClasificacion = :idClasificacion";
        $query = $this->connect->prepare($sql);
        $query->bindParam(':idClasificacion', $idClasificacion);
        $query -> execute(); 
        $results = $query -> fetchAll(); 

        $sql = "SELECT * from  clasificacion where idClasificacion=:idClasificacion";
        $query = $this->connect->prepare($sql);
        $query->bindParam(':idClasificacion', $idClasificacion);
        $query -> execute(); 
        $results2 = $query -> fetchAll(); 
        $datos=[
            "detalles"=>$results,
            "Clasificacion"=>$results2
        ];
        return $datos;
    }

    public function ROrdenProduccionEstado($estado,$fi,$ff){
        $sql = "SELECT op.idOrden,r.nombre as responsable,pf.descripcion as plantaForestal,e.nombre as especie,op.fechaOrden,op.fechaAproxTermino,op.descripcion,op.cantidadEsperada,op.cantidadLograda,op.costoProduccion,op.fechaRealTermino FROM ordenProduccion as op INNER JOIN responsable as r ON r.idResponsable=op.idResponsable INNER JOIN plantaForestal as pf on pf.idPlanta=op.idPlanta INNER JOIN especie as e on e.idEspecie=pf.idEspecie WHERE  fc.fecha BETWEEN :fi AND :ff and  op.estado=:estado ORDER BY op.idOrden";
        $query = $this->connect->prepare($sql);
        $query->bindParam(':fi', $fi,PDO::PARAM_STR);
        $query->bindParam(':ff', $ff,PDO::PARAM_STR);
        $query->bindParam(':estado', $estado);
        $query -> execute(); 
        $results = $query -> fetchAll(); 
        return $results;
    }
    public function RValeSalida($fi,$ff){

    }
    public function RDevolucionOrdenProduccion($idOrdenProduccion,$fi,$ff){

    }
    public function RDevolucion($ff,$fi){

    }
    public function RMermas($fi,$ff){}

    /*
 Consulta de Compra de insumos por Clasificación                        Pedir fechas y Clasificación       RCompraClasificacion -
            idClasificacion	concepto	descripcion
            
3     Consulta de Insumos divididos por Clasificación                        Clasificación                      RInusmosClasificacion -
            idClasificacion	concepto	descripcion
            nombre	descripcion	unidad	existencias	maximo	minimo	costoPromedio	

4     Consulta por estado de  Órdenes de producción                          Pedir fechas y Estado              ROrdenProduccionEstado -
            Estado metodo _GET
            idOrden	,idResponsable(nombre)	,idPlanta	(Nombre),fechaOrden	,fechaAproxTermino	,descripcion 	,cantidadEsperada	,cantidadLograda	(Solo si estado es = termiando),costoProduccion	(Solo si estado es = termiando),fechaRealTermino	(Solo si estado es = termiando)

5     Consulta de vale de salida por orden de producción                     Pedir fechas y orden de produccion RValeSalidaOrdenProduccion
            (Consutla de vale de salida y sus datos)
            idVale	idResponsable	(nombre) cantidad	 idInsumo	(nombre) Clasificacion	(nombre) fecha	 
6     Consulta de vale de salida                                             Pedir fechas                       RValeSalida
            idVale	idResponsable  idOrden descripcion	(nombre) cantidad	 idInsumo	(nombre) Clasificacion	(nombre) fecha	 

7     Consulta de devolución por orden de producción                         Pedir fechas y orden de produccion RDevolucionOrdenProduccion
            (Consutla de vale de salida y sus datos)
            idInsumo(nombre ) idrespinsable Clasificacion	fecha	cantidad	

8     Consulta de devoluciones                                               Pedir fechas                       RDevolucion
            id Devolucion idresponsable idInsumo(nombre ) Clasificacion	fecha	cantidad	

9     Consulta de mermas                                                      Pedir fechas                       RMermas
            idMermaInsumos	idResponsable(Responsable) fecha   idInsumo	(Nombre)    idClasificacion(nombre)    cantidad   motivo	
*/
}