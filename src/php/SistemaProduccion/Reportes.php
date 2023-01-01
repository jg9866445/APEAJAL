<?php
session_start();

require_once($_SERVER['DOCUMENT_ROOT']."/src/php/connectividad.php");

class Reportes {

    var $db;
    var $connect;
    var $connect_externa;


    function __construct()
    {        
        try {
            $this->db = new DB_Connect();

            $this->connect=$this->db->connect();
            $this->connect_externa=$this->db->connect_externa();
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

    function bitacora($Area, $Tabla, $Actividad, $idUsuario){
        date_default_timezone_set($_SESSION["Zona"]);
        $sql = "INSERT INTO Bitacora(Sistema, Area, Actividad, Tabla, idUsuario, Fecha, Hora) VALUES ( 'Produccion', :Area, :Actividad, :Tabla, :idUsuario, '".date("Y/m/d")."', '".date("H:i:s")."')";
        $query = $this->connect->prepare($sql);
        $query->bindParam(":Area",$Area);
        $query->bindParam(":Actividad",$Actividad);
        $query->bindParam(":Tabla",$Tabla);
        $query->bindParam(":idUsuario",$idUsuario);
        $query->execute(); 
        return 0;
    }

    public function getBitacora($fi,$ff){
        $sql = "SELECT * from Bitacora as b INNER JOIN User as u ON u.idUsuario= b.idUsuario  WHERE  b.Fecha BETWEEN :fi AND :ff;";
        $query = $this->connect->prepare($sql);
        $query->bindParam(':fi', $fi,PDO::PARAM_STR);
        $query->bindParam(':ff', $ff,PDO::PARAM_STR);
        $query -> execute(); 
        $results = $query -> fetchAll(); 
        return $results;
    }

    public function RCompraInumos($fi,$ff){
        $this->bitacora("Reportes","Solicitud","Genera reporte con fechas de fecha inicial:".$fi." fecha final:".$ff,$_SESSION["id"]);
        $sql = "SELECT *  from  proveedores ";
        $query = $this->connect_externa->prepare($sql);
        $query -> execute(); 
        $resultsP = $query -> fetchAll(); 
        $results=array();

        $sql = "SELECT fc.idProveedor,'' as nombre,fc.factura,fc.fecha,c.concepto,i.nombre,i.unidad,dfc.cantidad,dfc.costo,(dfc.cantidad*dfc.costo) as 'importe' from facturaCompra as fc INNER JOIN detalleFacturaCompra as dfc ON dfc.idOrdenCompra=fc.idOrdenCompra INNER JOIN insumo as i On dfc.idInsumo=i.idInsumo INNER JOIN clasificacion as c ON c.idClasificacion=i.idClasificacion WHERE  fc.fecha BETWEEN :fi AND :ff ORDER BY fc.idProveedor,fc.factura ;";
        $query = $this->connect->prepare($sql);
        $query->bindParam(':fi', $fi,PDO::PARAM_STR);
        $query->bindParam(':ff', $ff,PDO::PARAM_STR);
        $query -> execute(); 
        $resultsR = $query -> fetchAll();

        $results=array();

        foreach($resultsR as $Reportes){
            foreach( $resultsP as $Proveedores) {
                if ($Reportes["idProveedor"]==$Proveedores["IdProveedor"]){
                    $Reportes["Nombre"]=$Proveedores["Nombre"];
                    $Reportes[1]=$Proveedores["Nombre"];
                    array_push($results,$Reportes);
                }
            }
        }
        return $results;
    }

    public function RCompraInumosProveedor($idProveedor,$fi,$ff){
        $this->bitacora("Reportes","Solicitud","Genera reporte con fechas de fecha inicial:".$fi." fecha final:".$ff,$_SESSION["id"]);
        $sql = "SELECT fc.factura,fc.fecha,c.concepto,i.nombre,i.unidad,dfc.cantidad,dfc.costo,(dfc.cantidad*dfc.costo) as 'importe' from facturaCompra as fc INNER JOIN detalleFacturaCompra as dfc ON dfc.idOrdenCompra=fc.idOrdenCompra INNER JOIN insumo as i On dfc.idInsumo=i.idInsumo INNER JOIN clasificacion as c ON c.idClasificacion=i.idClasificacion WHERE  fc.fecha BETWEEN :fi AND :ff and fc.idProveedor = :idProveedor ORDER BY fc.idProveedor,fc.factura ;";
        $query = $this->connect->prepare($sql);
        $query->bindParam(':fi', $fi,PDO::PARAM_STR);
        $query->bindParam(':ff', $ff,PDO::PARAM_STR);
        $query->bindParam(':idProveedor', $idProveedor);
        $query -> execute(); 
        $results = $query -> fetchAll(); 
        
        $sql = "SELECT * from  proveedores where idProveedor=:idProveedor";
        $query = $this->connect_externa->prepare($sql);
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
        $this->bitacora("Reportes","Solicitud","Genera reporte con fechas de fecha inicial:".$fi." fecha final:".$ff,$_SESSION["id"]);
         $sql = "SELECT *  from  proveedores ";
        $query = $this->connect_externa->prepare($sql);
        $query -> execute(); 
        $resultsP = $query -> fetchAll(); 
        $results=array();

        $sql = "SELECT '' as Nombre,fc.factura,fc.fecha,i.nombre,i.unidad,dfc.cantidad,dfc.costo,(dfc.cantidad*dfc.costo) as 'importe',fc.IdProveedor  from facturaCompra as fc  INNER JOIN detalleFacturaCompra as dfc ON dfc.idOrdenCompra=fc.idOrdenCompra INNER JOIN insumo as i On dfc.idInsumo=i.idInsumo INNER JOIN clasificacion as c ON c.idClasificacion=i.idClasificacion WHERE  fc.fecha BETWEEN :fi AND :ff and c.idClasificacion = :idClasificacion ORDER BY c.idClasificacion,fc.factura ;";
        $query = $this->connect->prepare($sql);
        $query->bindParam(':fi', $fi,PDO::PARAM_STR);
        $query->bindParam(':ff', $ff,PDO::PARAM_STR);
        $query->bindParam(':idClasificacion', $idClasificacion);
        $query -> execute(); 
        $resultsR = $query -> fetchAll();
         
         foreach($resultsR as $Reportes){
            foreach( $resultsP as $Proveedores) {
                if ($Reportes["IdProveedor"]==$Proveedores["IdProveedor"]){
                    $Reportes["Nombre"]=$Proveedores["Nombre"];
                    $Reportes[0]=$Proveedores["Nombre"];
                    array_push($results,$Reportes);
                }
            }
        }



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
        $this->bitacora("Reportes","Solicitud","Genera reporte a la clasificacion".$idClasificacion,$_SESSION["id"]);
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

    public function ROrdenProduccion($fi,$ff){
        $this->bitacora("Reportes","Solicitud","Genera reporte con fechas de fecha inicial:".$fi." fecha final:".$ff,$_SESSION["id"]);
        $sql = "SELECT op.idOrden,r.nombre as responsable,pf.descripcion as plantaForestal,op.fechaOrden,op.fechaAproxTermino,op.descripcion,op.cantidadEsperada,op.cantidadLograda,op.costoProduccion,op.fechaRealTermino,op.estado FROM ordenProduccion as op INNER JOIN responsable as r ON r.idResponsable=op.idResponsable INNER JOIN plantaForestal as pf on pf.idPlanta=op.idPlanta INNER JOIN especie as e on e.idEspecie=pf.idEspecie WHERE  op.fechaOrden BETWEEN :fi AND :ff ORDER BY op.idOrden";
        $query = $this->connect->prepare($sql);
        $query->bindParam(':fi', $fi,PDO::PARAM_STR);
        $query->bindParam(':ff', $ff,PDO::PARAM_STR);
        $query -> execute(); 
        $results = $query -> fetchAll(); 
        return $results;
    }

    public function ROrdenProduccionEstados($estado,$fi,$ff){
        $this->bitacora("Reportes","Solicitud","Genera reporte con estado ".$estado." y fechas de fecha inicial:".$fi." fecha final:".$ff,$_SESSION["id"]);
        $sql = "SELECT op.idOrden,r.nombre as responsable,pf.descripcion as plantaForestal,op.fechaOrden,op.fechaAproxTermino,op.descripcion,op.cantidadEsperada,op.cantidadLograda,op.costoProduccion,op.fechaRealTermino FROM ordenProduccion as op INNER JOIN responsable as r ON r.idResponsable=op.idResponsable INNER JOIN plantaForestal as pf on pf.idPlanta=op.idPlanta  WHERE op.fechaOrden  BETWEEN :fi AND :ff and  op.estado=:estado ORDER BY op.idOrden";
        $query = $this->connect->prepare($sql);
        $query->bindParam(':fi', $fi,PDO::PARAM_STR);
        $query->bindParam(':ff', $ff,PDO::PARAM_STR);
        $query->bindParam(':estado', $estado);
        $query -> execute(); 
        $results = $query -> fetchAll(); 
        return $results;
    }

    public function RValeSalidaOrdenProduccion($idOrdenProduccion,$fi,$ff){
        $this->bitacora("Reportes","Solicitud","Genera reporte con orden de produccion ".$idOrdenProduccion." y fechas de fecha inicial:".$fi." fecha final:".$ff,$_SESSION["id"]);
        $sql = " SELECT  vs.idVale,vs.fecha,r.nombre as responsable,i.nombre,vs.cantidad FROM valeSalida as vs INNER JOIN insumo as i ON i.idInsumo=vs.idInsumo INNER JOIN responsable as r ON r.idResponsable=vs.idResponsable WHERE  vs.fecha BETWEEN :fi AND :ff and vs.idOrden = :idOrdenProduccion;";
        $query = $this->connect->prepare($sql);
        $query->bindParam(':fi', $fi,PDO::PARAM_STR);
        $query->bindParam(':ff', $ff,PDO::PARAM_STR);
        $query->bindParam(':idOrdenProduccion', $idOrdenProduccion);
        $query -> execute(); 
        $results = $query -> fetchAll(); 

        $sql = "SELECT r.nombre as responsable,r.puesto,e.nombre as planta,pf.descripcion,pf.existencia,op.fechaAproxTermino,op.descripcion as descripcionOrden,op.cantidadEsperada from ordenProduccion as op  INNER JOIN responsable as r on r.idResponsable=op.idResponsable INNER JOIN plantaForestal as pf ON op.idPlanta=pf.idPlanta INNER JOIN especie as e on e.idEspecie= pf.idEspecie WHERE op.idOrden=:idOrdenProduccion";
        $query = $this->connect->prepare($sql);
        $query->bindParam(':idOrdenProduccion', $idOrdenProduccion);
        $query -> execute(); 
        $results2 = $query -> fetchAll(); 
        $datos=[
            "detalles"=>$results,
            "Orden"=>$results2
        ];
        return $datos;
    }

    public function RValeSalida($fi,$ff){
        $this->bitacora("Reportes","Solicitud","Genera reporte con fechas de fecha inicial:".$fi." fecha final:".$ff,$_SESSION["id"]);
        $sql = " SELECT vs.idOrden, op.descripcion, vs.idVale,vs.fecha,r.nombre as responsable,i.nombre,vs.cantidad FROM valeSalida as vs INNER JOIN insumo as i ON i.idInsumo=vs.idInsumo INNER JOIN responsable as r ON r.idResponsable=vs.idResponsable INNER JOIN ordenProduccion as op ON op.idOrden=vs.idOrden WHERE  vs.fecha BETWEEN :fi AND :ff";
        $query = $this->connect->prepare($sql);
        $query->bindParam(':fi', $fi,PDO::PARAM_STR);
        $query->bindParam(':ff', $ff,PDO::PARAM_STR);
        $query -> execute(); 
        $results = $query -> fetchAll(); 
        return $results;
    }

    public function RDevolucionOrdenProduccion($idOrdenProduccion,$fi,$ff){
        $this->bitacora("Reportes","Solicitud","Genera reporte con orden de produccion ".$idOrdenProduccion." y fechas de fecha inicial:".$fi." fecha final:".$ff,$_SESSION["id"]);
        $sql = " SELECT dv.idDevolucion,dv.fecha,r.nombre as responsable,i.nombre,dv.cantidad FROM devolucion as dv INNER JOIN valeSalida as vs INNER JOIN responsable as r ON r.idResponsable = vs.idResponsable INNER JOIN insumo as i on vs.idInsumo=i.idInsumo WHERE   dv.fecha BETWEEN :fi AND :ff and vs.idOrden = :idOrdenProduccion;";
        $query = $this->connect->prepare($sql);
        $query->bindParam(':fi', $fi,PDO::PARAM_STR);
        $query->bindParam(':ff', $ff,PDO::PARAM_STR);
        $query->bindParam(':idOrdenProduccion', $idOrdenProduccion);
        $query -> execute(); 
        $results = $query -> fetchAll(); 

        $sql = "SELECT r.nombre as responsable,r.puesto,e.nombre as planta,pf.descripcion,pf.existencia,op.fechaAproxTermino,op.descripcion as descripcionOrden,op.cantidadEsperada from ordenProduccion as op  INNER JOIN responsable as r on r.idResponsable=op.idResponsable INNER JOIN plantaForestal as pf ON op.idPlanta=pf.idPlanta INNER JOIN especie as e on e.idEspecie= pf.idEspecie WHERE op.idOrden=:idOrdenProduccion";
        $query = $this->connect->prepare($sql);
        $query->bindParam(':idOrdenProduccion', $idOrdenProduccion);
        $query -> execute(); 
        $results2 = $query -> fetchAll(); 
        $datos=[
            "detalles"=>$results,
            "Orden"=>$results2
        ];
        return $datos;
    }
    public function RDevolucion($fi,$ff){
        $this->bitacora("Reportes","Solicitud","Genera reporte con fechas de fecha inicial:".$fi." fecha final:".$ff,$_SESSION["id"]);
        $sql="SELECT vs.idOrden,op.descripcion, dv.idDevolucion,dv.fecha,r.nombre as responsable,i.nombre,dv.cantidad FROM devolucion as dv INNER JOIN valeSalida as vs INNER JOIN responsable as r ON r.idResponsable = vs.idResponsable INNER JOIN insumo as i on vs.idInsumo=i.idInsumo INNER JOIN ordenProduccion as op ON op.idOrden=vs.idOrden  WHERE   dv.fecha BETWEEN :fi AND :ff;";
        $query = $this->connect->prepare($sql);
        $query->bindParam(':fi', $fi,PDO::PARAM_STR);
        $query->bindParam(':ff', $ff,PDO::PARAM_STR);
        $query -> execute(); 
        $results = $query -> fetchAll(); 
        return  $results;
    }

    public function RMermas($fi,$ff){
        $this->bitacora("Reportes","Solicitud","Genera reporte con fechas de fecha inicial:".$fi." fecha final:".$ff,$_SESSION["id"]);
        $sql="SELECT mi.fecha,r.nombre,i.nombre,dmi.cantidad,dmi.motivo from mermaInsumo as mi INNER JOIN detalleMermaInsumo as dmi on mi.idMermaInsumos=dmi.idMermaInsumos INNER JOIN responsable as r ON r.idResponsable = mi.idResponsable INNER JOIN insumo as i ON i.idInsumo= dmi.idInsumo WHERE   mi.fecha BETWEEN :fi AND :ff;";
        $query = $this->connect->prepare($sql);
        $query->bindParam(':fi', $fi,PDO::PARAM_STR);
        $query->bindParam(':ff', $ff,PDO::PARAM_STR);
        $query -> execute(); 
        $results = $query -> fetchAll(); 
        return  $results;
    }


}