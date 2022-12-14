<?php
session_start();

require_once($_SERVER['DOCUMENT_ROOT']."/src/php/connectividad.php");

class Movimientos {

    var $db;
    var $connect;
    var $connect_externa;

    function __construct(){        
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
    
    public function close() {
        unset($this->connect);
    }
    function texto($array,$array2){

        $text=str_replace('=', ':', http_build_query(array_combine( $array,$array2),""," ,"));
        return $text;
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


    //Next id 
    function getNextIdCompra(){
        $this->bitacora("Movimientos","Compra de inusmo","Obtener siguiente id",$_SESSION["id"]);
        $sql = "SELECT AUTO_INCREMENT  FROM information_schema.TABLES WHERE TABLE_SCHEMA = 'id19983557_apeajal' AND TABLE_NAME = 'facturaCompra'";
        $query = $this->connect->prepare($sql);
        $query -> execute(); 
        $results = $query -> fetchAll(); 
        return $results;
    }

    function getNextidSalida(){
        $this->bitacora("Movimientos","Vales de salida","Obtener siguiente id",$_SESSION["id"]);
        $sql = "SELECT AUTO_INCREMENT  FROM information_schema.TABLES WHERE TABLE_SCHEMA = 'id19983557_apeajal' AND TABLE_NAME = 'valeSalida'";
        $query = $this->connect->prepare($sql);
        $query -> execute(); 
        $results = $query -> fetchAll(); 
        return $results;
    }

    function getNextidOrdenProduccion(){
        $this->bitacora("Movimientos","Ordenes de produccion","Obtener siguiente id",$_SESSION["id"]);
        $sql = "SELECT AUTO_INCREMENT  FROM information_schema.TABLES WHERE TABLE_SCHEMA = 'id19983557_apeajal' AND TABLE_NAME = 'ordenProduccion'";
        $query = $this->connect->prepare($sql);
        $query -> execute(); 
        $results = $query -> fetchAll(); 
        return $results;
    }

    function getNextidDevolucion(){
        $this->bitacora("Movimientos","Devoluciones","Obtener siguiente id",$_SESSION["id"]);
        $sql = "SELECT AUTO_INCREMENT  FROM information_schema.TABLES WHERE TABLE_SCHEMA = 'id19983557_apeajal' AND TABLE_NAME = 'devolucion'";
        $query = $this->connect->prepare($sql);
        $query -> execute(); 
        $results = $query -> fetchAll(); 
        return $results;
    }
    
    function getNextIdMerma(){
        $this->bitacora("Movimientos","Mermas","Obtener siguiente id",$_SESSION["id"]);
        $sql = "SELECT AUTO_INCREMENT  FROM information_schema.TABLES WHERE TABLE_SCHEMA = 'id19983557_apeajal' AND TABLE_NAME = 'mermaInsumo'";
        $query = $this->connect->prepare($sql);
        $query -> execute(); 
        $results = $query -> fetchAll(); 
        return $results;
    }
    

    //get for table
    public function getTableAllCompras(){
        $this->bitacora("Movimientos","Compras","Consulta general",$_SESSION["id"]);
        $sql = "SELECT *  from  proveedores ";
        $query = $this->connect_externa->prepare($sql);
        $query -> execute(); 
        $resultsP = $query -> fetchAll(); 
        $sql = "SELECT fc.idOrdenCompra,fc.idProveedor,'' as nombre,fc.factura,fc.fecha, fc.total  from  facturaCompra as fc";
        $query = $this->connect->prepare($sql);
        $query -> execute(); 
        $resultsC = $query -> fetchAll(); 
        $results=array();
        foreach($resultsC as $compras){
            foreach( $resultsP as $Proveedores) {
                if ($compras["idProveedor"]==$Proveedores["IdProveedor"]){
                    $compras["nombre"]=$Proveedores["Nombre"];
                    $compras[2]=$Proveedores["Nombre"];
                    array_push($results,$compras);
                }
            }
        }
        return $results;
    }

    public function getTableAllValesSalidas(){
        $this->bitacora("Movimientos","Vales de salida","Consulta general",$_SESSION["id"]);
        $sql = "SELECT vs.idVale,vs.fecha, r.nombre as responsable,i.nombre as insumo,i.unidad,vs.cantidad FROM valeSalida as vs INNER JOIN responsable as r on r.idResponsable=vs.idResponsable INNER JOIN insumo as i on i.idInsumo = vs.idInsumo;";
        $query = $this->connect->prepare($sql);
        $query -> execute(); 
        $results = $query -> fetchAll(); 
        return $results;
    }

    public function getTableAllOrdenProduccion(){
        $this->bitacora("Movimientos","Ordenes de produccion","Consulta general",$_SESSION["id"]);
        $sql = "SELECT op.idOrden,r.nombre as responsable,e.nombre as especie,op.descripcion,op.estado FROM ordenProduccion AS op INNER JOIN responsable as r ON op.idResponsable= r.idResponsable INNER JOIN plantaForestal as pf ON op.idPlanta=pf.idPlanta INNER JOIN especie as e ON pf.idEspecie=e.idEspecie";
        $query = $this->connect->prepare($sql);
        $query -> execute(); 
        $results = $query -> fetchAll(); 
        return $results;
    }

    public function getTableAllDevoluciones(){
        $this->bitacora("Movimientos","Devoluciones","Consulta general",$_SESSION["id"]);
        $sql = "Select d.idDevolucion,d.fecha, r.nombre as 'Responsable' ,i.nombre as 'insumo',i.unidad,c.concepto as 'clasifiacion',vs.cantidad as 'Salida', d.cantidad as 'devuelta' FROM devolucion as d INNER JOIN valeSalida as vs on vs.idVale=d.idVale INNER JOIN responsable as r ON vs.idResponsable= r.idResponsable INNER JOIN insumo as i ON i.idInsumo=vs.idInsumo INNER JOIN clasificacion as c ON c.idClasificacion=i.idClasificacion; ";
        $query = $this->connect->prepare($sql);
        $query -> execute(); 
        $results = $query -> fetchAll(); 
        return $results;
    }

    public function getTableAllMermas(){
        $this->bitacora("Movimientos","Mermas","Consulta general",$_SESSION["id"]);
        $sql = "SELECT m.idMermaInsumos,r.nombre,m.fecha  from  mermaInsumo as m INNER JOIN responsable as r on r.idResponsable=m.idResponsable ";
        $query = $this->connect->prepare($sql);
        $query -> execute(); 
        $results = $query -> fetchAll(); 
        return $results;
    }
    

    //get for selected 
    public function getAllProveedoresSelect() {
        $this->bitacora("Movimientos","Proveedores","Obtiene todos los regristos",$_SESSION["id"]);
        $sql = "SELECT * from proveedores";
        $query = $this->connect_externa->prepare($sql);
        $query -> execute(); 
        $results = $query -> fetchAll(); 
        return $results;
    }

    public function getAllInsumosSelect($idClasificacion){
        $this->bitacora("Movimientos","Insumos","Obtiene todos los regristos",$_SESSION["id"]);
        $sql = "SELECT * from  insumo where idClasificacion=:idClasificacion";
        $query = $this->connect->prepare($sql);
        $query->bindParam(':idClasificacion', $idClasificacion);
        $query -> execute(); 
        $results = $query -> fetchAll(); 
        return $results;
    }

    public function getAllClasificacionSelect(){
        $this->bitacora("Movimientos","Clasificacion","Obtiene todos los regristos",$_SESSION["id"]);
        $sql = "SELECT * from clasificacion";
        $query = $this->connect->prepare($sql);
        $query -> execute(); 
        $results = $query -> fetchAll(); 
        return $results;
    }

    public function getAllOrdenProduccionSelect(){
        $this->bitacora("Movimientos","Orden de produccion","Obtiene todos los regristos",$_SESSION["id"]);
        $sql = "SELECT * from ordenProduccion where ordenProduccion.estado = 'Pendiente'";
        $query = $this->connect->prepare($sql);
        $query -> execute(); 
        $results = $query -> fetchAll(); 
        return $results;
    }
    
    public function getAllResponsableSelect(){
        $this->bitacora("Movimientos","Responsable","Obtiene todos los regristos",$_SESSION["id"]);
        $sql = "SELECT * from responsable as r WHERE r.idResponsable <> 1";
        $query = $this->connect->prepare($sql);
        $query -> execute(); 
        $results = $query -> fetchAll(); 
        return $results;
    }

    public function getAllPlantasfolestalesSelect(){
        $this->bitacora("Movimientos","Plantas forestales","Obtiene todos los regristos",$_SESSION["id"]);
        $sql = "SELECT pf.idPlanta,e.nombre FROM plantaForestal as pf INNER JOIN especie as e ON e.idEspecie = pf.idEspecie";
        $query = $this->connect->prepare($sql);
        $query -> execute(); 
        $results = $query -> fetchAll(); 
        return $results;
    }

    public function getAllValesSalidaSelect(){
        $this->bitacora("Movimientos","Vales de salida","Obtiene todos los regristos",$_SESSION["id"]);
        $sql = "SELECT * FROM valeSalida";
        $query = $this->connect->prepare($sql);
        $query -> execute(); 
        $results = $query -> fetchAll(); 
        return $results;
    }
    
    public function getAllMotivoMermasSelect(){
        $this->bitacora("Movimientos","Mermas","Obtener todos los regristros",$_SESSION["id"]);
        $sql = "Select * from motivoMermaInsumo";
        $query = $this->connect->prepare($sql);
        $query -> execute(); 
        $results = $query -> fetchAll(); 
        return $results;
    }
    
    //get individual
    public function getCompra($idCompra){
        $this->bitacora("Movimientos","Ventas","Obtener regristro ".$this->texto(array("idCompra"),array($idCompra)),$_SESSION["id"]);
        $sql = "SELECT p.nombre as NombreProveedor, p.domicilio as DomicilioProveedor,p.contacto as ContactoProveedor, p.email as EmailProveedor, fc.factura as Factura,fc.total,fc.fecha FROM facturaCompra as fc INNER JOIN proveedor as p on p.idProveedor=fc.idProveedor WHERE fc.idOrdenCompra =  :idCompra;";
        $query = $this->connect->prepare($sql);
        $query->bindParam(':idCompra', $idCompra);
        $query -> execute(); 
        $results = $query -> fetchAll(); 
        return $results;
    }

    public function getDetallesCompras($idCompra){
        $this->bitacora("Movimientos","Ventas","Obtener regristro ".$this->texto(array("idCompra"),array($idCompra)),$_SESSION["id"]);
        $sql = "SELECT i.idInsumo as Insumo,i.nombre as Nombre,c.concepto as Clasificación,i.existencias as Existencias,i.unidad as Unidad,dfc.costo as Costo,dfc.cantidad as Cantidad FROM detalleFacturaCompra as dfc INNER JOIN insumo as i on dfc.idInsumo=i.idInsumo INNER JOIN clasificacion as c ON c.idClasificacion = i.idClasificacion where dfc.idOrdenCompra = :idCompra";
        $query = $this->connect->prepare($sql);
        $query->bindParam(':idCompra', $idCompra);
        $query -> execute(); 
        $results = $query -> fetchAll(); 
        return $results;
    }

    public function getProveedore($idProveedor) {
        $this->bitacora("Movimientos","Ventas","Obtener regristro ".$this->texto(array("idProveedor"),array($idProveedor)),$_SESSION["id"]);
        $sql = "SELECT * from  proveedores WHERE idProveedor=:idProveedor";
        $query = $this->connect_externa->prepare($sql);
        $query->bindParam(':idProveedor', $idProveedor);
        $query -> execute(); 
        $results = $query -> fetchAll(); 
        return $results;
    }

    public function getClasifiacion($idClasificacion){
        $this->bitacora("Movimientos","Ventas","Obtener regristro ".$this->texto(array("idClasificacion"),array($idClasificacion)),$_SESSION["id"]);
        $sql = "SELECT * from clasificacion where idClasificacion=:idClasificacion";
        $query = $this->connect->prepare($sql);
        $query->bindParam(':idClasificacion', $idClasificacion);
        $query -> execute(); 
        $results = $query -> fetchAll(); 
        return $results;
    }

    public function getInsumos($idInsumo){
        $this->bitacora("Movimientos","Ventas","Obtener regristro ".$this->texto(array("idInsumo"),array($idInsumo)),$_SESSION["id"]);
        $sql = "SELECT i.nombre,i.existencias,i.unidad,c.concepto,i.maximo,i.minimo,i.costoPromedio from insumo as i INNER JOIN clasificacion as c on i.idClasificacion = c.idClasificacion WHERE i.idInsumo=:idInsumo";
        $query = $this->connect->prepare($sql);
        $query->bindParam(':idInsumo', $idInsumo);
        $query -> execute(); 
        $results = $query -> fetchAll(); 
        return $results;
    }

    public function getValeSalida($idVale){
        $this->bitacora("Movimientos","Ventas","Obtener regristro ".$this->texto(array("idVale"),array($idVale)),$_SESSION["id"]);
        $sql = 'SELECT op.fechaOrden AS "FechaOrdenProduccion", op.descripcion AS "DescripcionOrdenProduccion",op.cantidadEsperada AS "CantidadOrdenProduccion",r.nombre AS "NombreResponsable", r.puesto AS "PuestoResponsable",e.nombre AS "NombrePlanta", pf.descripcion AS "DescripcionPlanta",pf.existencia AS "ExistenciasPlanta", i.nombre AS "NombreInsumos",i.descripcion AS "DescripcionInsumos", i.existencias AS "ExistenciasInsumos",vs.cantidad AS "CantidadInsumos" ,i.unidad as "UnidadInsumos" FROM valeSalida AS vs INNER JOIN ordenProduccion AS op ON op.idOrden=vs.idOrden INNER JOIN responsable AS r ON r.idResponsable = vs.idResponsable INNER JOIN plantaForestal AS pf ON pf.idPlanta= op.idPlanta INNER JOIN especie AS e ON e.idEspecie=op.idPlanta INNER JOIN insumo AS i ON i.idInsumo = vs.idInsumo  WHERE vs.idVale=:idVale';
        $query = $this->connect->prepare($sql);
        $query->bindParam(':idVale', $idVale);
        $query -> execute(); 
        $results = $query -> fetchAll(); 
        return $results;
    }

    public function getOrdenProduccion($idOrden){
        $this->bitacora("Movimientos","Ventas","Obtener regristro ".$this->texto(array("idOrden"),array($idOrden)),$_SESSION["id"]);
        $sql = "SELECT r.nombre as responsable,r.puesto,e.nombre as planta,pf.descripcion,pf.existencia,op.fechaAproxTermino,op.descripcion as descripcionOrden,op.cantidadEsperada from ordenProduccion as op  INNER JOIN responsable as r on r.idResponsable=op.idResponsable INNER JOIN plantaForestal as pf ON op.idPlanta=pf.idPlanta INNER JOIN especie as e on e.idEspecie= pf.idEspecie WHERE op.idOrden=:idOrden";
        $query = $this->connect->prepare($sql);
        $query->bindParam(':idOrden', $idOrden);
        $query -> execute(); 
        $results = $query -> fetchAll(); 
        return $results;
    }

    public function getResponsable($idResponsable) {
        $this->bitacora("Movimientos","Ventas","Obtener regristro ".$this->texto(array("idResponsable"),array($idResponsable)),$_SESSION["id"]);
        $sql = "SELECT * from  responsable WHERE idResponsable=:idResponsable";
        $query = $this->connect->prepare($sql);
        $query->bindParam(':idResponsable', $idResponsable);
        $query -> execute(); 
        $results = $query -> fetchAll(); 
        return $results;
    }

    public function getPlanta($idPlanta){
        $this->bitacora("Movimientos","Ventas","Obtener regristro ".$this->texto(array("idPlanta"),array($idPlanta)),$_SESSION["id"]);
        $sql = "SELECT pf.idPlanta,pf.descripcion,pf.existencia,e.nombre FROM plantaForestal as pf INNER JOIN especie as e on pf.idEspecie = e.idEspecie WHERE idPlanta=:idPlanta";
        $query = $this->connect->prepare($sql);
        $query->bindParam(':idPlanta', $idPlanta);
        $query -> execute(); 
        $results = $query -> fetchAll(); 
        return $results;
    }

    public function getDevolucionInsumo($idDevolucion){
        $this->bitacora("Movimientos","Ventas","Obtener regristro ".$this->texto(array("idDevolucion"),array($idDevolucion)),$_SESSION["id"]);
        $sql = 'SELECT op.fechaOrden AS "FechaOrdenProduccion",op.descripcion AS "DescripcionOrdenProduccion",op.cantidadEsperada AS "CantidadOrdenProduccion",r.nombre AS "NombreResponsable",r.puesto AS "PuestoResponsable",e.nombre AS "NombrePlanta", pf.descripcion AS "DescripcionPlanta",pf.existencia AS "ExistenciasPlanta",i.nombre AS "NombreInsumos",i.descripcion AS "DescripcionInsumos",i.existencias AS "ExistenciasInsumos",vs.cantidad AS "CantidadInsumosSalida",i.unidad,d.cantidad AS "CantidadInsumosDevolucion" FROM devolucion AS d INNER JOIN valeSalida as vs ON vs.idVale=d.idVale INNER JOIN ordenProduccion AS op ON op.idOrden=vs.idOrden INNER JOIN responsable AS r ON r.idResponsable = vs.idResponsable INNER JOIN plantaForestal AS pf ON pf.idPlanta= op.idPlanta INNER JOIN especie AS e ON e.idEspecie=op.idPlanta INNER JOIN insumo AS i ON i.idInsumo = vs.idInsumo  WHERE d.idDevolucion=:idDevolucion';
        $query = $this->connect->prepare($sql);
        $query->bindParam(':idDevolucion', $idDevolucion);
        $query -> execute(); 
        $results = $query -> fetchAll(); 
        return $results;
    }

    public function getValeSalidaAdd($idVale){
        $this->bitacora("Movimientos","Ventas","Obtener regristro ".$this->texto(array("idVale"),array($idVale)),$_SESSION["id"]);
        $sql = "SELECT r.nombre AS NombreResponsable , r.puesto AS PuestoResponsable, i.idInsumo as idInsumo , i.nombre as NombreInsumo, c.concepto as CategoriaInsumo, i.descripcion as DescripcionInsumo, i.unidad as UnidadInsumos, i.existencias as ExistenciaInsumos , i.costoPromedio as Precio,ro.nombre as NombreResponsableOrden,ro.puesto as PuestoResponsableOrden,e.nombre as NombrePlanta,pf.descripcion as DescripcionPlanta, pf.existencia as ExistenciaPlanta,op.fechaAproxTermino as FechaAproxTermino ,op.descripcion as DecripcionOrden , op.cantidadEsperada as CantidaEspera,vs.cantidad as CantidadRetirada FROM valeSalida as vs INNER JOIN responsable as r ON r.idResponsable=vs.idResponsable INNER JOIN insumo as i ON vs.idInsumo=i.idInsumo INNER JOIN clasificacion as c on i.idClasificacion=c.idClasificacion INNER JOIN ordenProduccion as op ON op.idOrden=vs.idOrden INNER JOIN responsable as ro ON ro.idResponsable=op.idResponsable INNER JOIN plantaForestal as pf ON pf.idPlanta = op.idPlanta INNER JOIN especie as e ON e.idEspecie = pf.idEspecie where vs.idVale = :idVale";
        $query = $this->connect->prepare($sql);
        $query->bindParam(':idVale', $idVale);
        $query -> execute(); 
        $results = $query -> fetchAll(); 
        return $results;
    }


    public function getMermaInsumo($idMermaInsumos){
        $this->bitacora("Movimientos","Ventas","Obtener regristro ".$this->texto(array("idMermaInsumos"),array($idMermaInsumos)),$_SESSION["id"]);
        $sql = "SELECT r.nombre AS NombreResponsable , r.puesto AS PuestoResponsable, m.idMermaInsumos ,m.fecha FROM mermaInsumo as m  INNER JOIN responsable as r ON r.idResponsable=m.idResponsable WHERE m.idMermaInsumos =  :idMermaInsumos;";
        $query = $this->connect->prepare($sql);
        $query->bindParam(':idMermaInsumos', $idMermaInsumos);
        $query -> execute(); 
        $results = $query -> fetchAll(); 
        return $results;
    }

    public function getDetalleMermaInsumo($idMermaInsumos){
        $this->bitacora("Movimientos","Ventas","Obtener regristro ".$this->texto(array("idMermaInsumos"),array($idMermaInsumos)),$_SESSION["id"]);
        $sql = "SELECT dmi.idMermaInsumos,i.idInsumo,i.nombre as insumo,mmr.idMotivoMerma,mmr.nombre,dmi.cantidad,dmi.motivo FROM detalleMermaInsumo as dmi INNER JOIN insumo as i on dmi.idInsumo=i.idInsumo INNER JOIN motivoMermaInsumo as mmr ON mmr.idMotivoMerma=dmi.idMotivoMerma where dmi.idMermaInsumos = :idMermaInsumos";
        $query = $this->connect->prepare($sql);
        $query->bindParam(':idMermaInsumos', $idMermaInsumos);
        $query -> execute(); 
        $results = $query -> fetchAll(); 
        return $results;
    }

    public function getMotivoMermaInsumo($idMotivoMerma){
        $this->bitacora("Movimientos","Motivo Mermas","Obtener regristro ".$this->texto(array("idMotivoMerma"),array($idMotivoMerma)),$_SESSION["id"]);
        $sql = "Select * from motivoMermaInsumo as mpi where mpi.idMotivoMerma=:idMotivoMerma";
        $query = $this->connect->prepare($sql);
        $query->bindParam(':idMotivoMerma', $idMotivoMerma);
        $query -> execute(); 
        $results = $query -> fetchAll(); 
        return $results;
    }
    //INSERT AQUI SE INSERTA TODO

    public function insertCompraInsumos($fechaCompraInsumos,$idProveedor,$factura,$total){
        $this->bitacora("Movimientos","Compra de insumo","Inserto ".$this->texto(array("fechaCompraInsumos","idProveedor","factura","total"),array($fechaCompraInsumos,$idProveedor,$factura,$total)),$_SESSION["id"]);
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

            $sql="SELECT existencias, costoPromedio FROM insumo WHERE idInsumo= :idInsumo";
            $query = $this->connect->prepare($sql);
            $query->bindParam(':idInsumo', $value->idInsumo );
            $query->execute();

            $request=$query->fetchAll();
            $existenciasnow=$request[0]['existencias'];
            $costonow=$request[0]['costoPromedio'];
                    
            $costoPromedionew=(($existenciasnow*$costonow)+($value->Cantidad*$value->Costo))/($existenciasnow+$value->Cantidad);

            $existenciasnew=$request[0]['existencias']+$value->Cantidad;
            
            $sql="UPDATE insumo SET existencias=:existencias,costoPromedio=:costoPromedio WHERE idInsumo= :idInsumo";
            $query = $this->connect->prepare($sql);
            $query->bindParam(':existencias', $existenciasnew);
            $query->bindParam(':costoPromedio', $costoPromedionew);
            $query->bindParam(':idInsumo', $value->idInsumo);
            $query->execute();
        }        
    }

    public function insertOrdenProduccion( $idResponsable, $idPlanta, $fechaOrden, $fechaAproxTermino, $descripcion, $cantidadEsperada){
        $this->bitacora("Movimientos","Orden de produccion","Obtener regristro ".$this->texto(array("idResponsable", "idPlanta", "fechaOrden", "fechaAproxTermino", "descripcion", "cantidadEsperada"),array($idResponsable, $idPlanta, $fechaOrden, $fechaAproxTermino, $descripcion, $cantidadEsperada)),$_SESSION["id"]);
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
        $this->bitacora("Movimientos","Orden de produccion","Cancelar ".$this->texto(array("idOrdenProduccion"),array($idOrdenProduccion)),$_SESSION["id"]);
        $sql="UPDATE ordenProduccion SET estado='Cancelado' WHERE  idOrden=:idOrdenProduccion";
        $query = $this->connect->prepare($sql);
        $query->bindParam(':idOrdenProduccion', $idOrdenProduccion);
        $query->execute();
    }

    public function TerminarOrdenProduccion($idOrdenProduccion,$fechaReal,$CantidadLograda,$CostoProduccion){
        $this->bitacora("Movimientos","Orden de produccion","Terminar".$this->texto(array("idOrdenProduccion","fechaReal","CantidadLograda","CostoProduccion"),array($idOrdenProduccion,$fechaReal,$CantidadLograda,$CostoProduccion)),$_SESSION["id"]);
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
        $this->bitacora("Movimientos","Vale de salida","Insertar ".$this->texto(array("idInsumo","idOrden", "idResponsable", "fecha", "cantidad"),array($idInsumo,$idOrden, $idResponsable, $fecha, $cantidad)),$_SESSION["id"]);
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
        $this->bitacora("Movimientos","Devoluciones","insertar ".$this->texto(array( "idVale", "idInsumo", "fecha", "cantidad"),array( $idVale, $idInsumo, $fecha, $cantidad)),$_SESSION["id"]);
        $sql="INSERT INTO devolucion( idVale, fecha, cantidad) VALUES ( :idVale, :fecha, :cantidad)";
        $query = $this->connect->prepare($sql);
        $query->bindParam(':idVale', $idVale);
        $query->bindParam(':fecha', $fecha);
        $query->bindParam(':cantidad', $cantidad);
        $query->execute();

        $sql="SELECT existencias FROM insumo WHERE idInsumo= :idInsumo";
        $query = $this->connect->prepare($sql);
        $query->bindParam(':idInsumo', $idInsumo );
        $query->execute();

        $request=$query->fetchAll();
        $existencias=$request[0]['existencias']+$cantidad;
            
        $sql="UPDATE insumo SET existencias=:existencias WHERE idInsumo= :idInsumo";
        $query = $this->connect->prepare($sql);
        $query->bindParam(':existencias', $existencias);
        $query->bindParam(':idInsumo', $idInsumo);
        $query->execute();
    }

    public function insertMermaInsumos($idResponsable,$fecha){
        $this->bitacora("Movimientos","Merma de insumos","Insertar ".$this->texto(array("idResponsable","fecha"),array($idResponsable,$fecha)),$_SESSION["id"]);
        $sql="INSERT INTO mermaInsumo(idResponsable, fecha) VALUES ( :idResponsable, :fecha)";
        $query = $this->connect->prepare($sql);
        $query->bindParam(':idResponsable', $idResponsable);
        $query->bindParam(':fecha', $fecha);
        $query->execute();
        $idMerma=$this->connect->lastInsertId();
        return $idMerma;
    }
    
    public function insertDetallesMermaInsumos($idMermaInsumos,$detalles){
        foreach ($detalles as $value) {
            $sql="INSERT INTO detalleMermaInsumo(idMermaInsumos, idInsumo,idMotivoMerma, cantidad, motivo) VALUES (:idMermaInsumos, :idInsumo,:idMotivoMerma, :cantidad, :motivo)";
            $query = $this->connect->prepare($sql);
            $query->bindParam(':idMermaInsumos', $idMermaInsumos);
            $query->bindParam(':idInsumo', $value->idInsumo);
            $query->bindParam(':idMotivoMerma', $value->idMotivoMerma);
            $query->bindParam(':cantidad', $value->Cantidad);
            $query->bindParam(':motivo', $value->Motivo);
            $query->execute();

            $sql="SELECT existencias FROM insumo WHERE idInsumo= :idInsumo";
            $query = $this->connect->prepare($sql);
            $query->bindParam(':idInsumo', $value->idInsumo );
            $query->execute();

            $request=$query->fetchAll();                    

            $existenciasnew=$request[0]['existencias']-$value->Cantidad;
            
            $sql="UPDATE insumo SET existencias=:existencias WHERE idInsumo= :idInsumo";
            $query = $this->connect->prepare($sql);
            $query->bindParam(':existencias', $existenciasnew);
            $query->bindParam(':idInsumo', $value->idInsumo);
            $query->execute();
        }        
    }





}