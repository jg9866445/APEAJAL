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
    //get next id
    
    public function getNextidPredio(){
        $sql = "SELECT AUTO_INCREMENT  FROM information_schema.TABLES WHERE TABLE_SCHEMA = 'recidenciacyj_apeajal' AND TABLE_NAME = 'predios'";
        $query = $this->connect->prepare($sql);
        $query -> execute(); 
        $results = $query -> fetchAll(); 
        return $results;
    }
    
    public function getNextidSolicitudPlantas(){
        $sql = "SELECT AUTO_INCREMENT  FROM information_schema.TABLES WHERE TABLE_SCHEMA = 'recidenciacyj_apeajal' AND TABLE_NAME = 'solicitudes'";
        $query = $this->connect->prepare($sql);
        $query -> execute(); 
        $results = $query -> fetchAll(); 
        return $results;
    }

    public function getNextidVenta(){
        $sql = "SELECT AUTO_INCREMENT  FROM information_schema.TABLES WHERE TABLE_SCHEMA = 'recidenciacyj_apeajal' AND TABLE_NAME = 'ventas'";
        $query = $this->connect->prepare($sql);
        $query -> execute(); 
        $results = $query -> fetchAll(); 
        return $results;
    }
    
    public function getNextidPago(){
        $sql = "SELECT AUTO_INCREMENT  FROM information_schema.TABLES WHERE TABLE_SCHEMA = 'recidenciacyj_apeajal' AND TABLE_NAME = 'pagos'";
        $query = $this->connect->prepare($sql);
        $query -> execute(); 
        $results = $query -> fetchAll(); 
        return $results;
    }

    public function getNextidSalida(){
        $sql = "SELECT AUTO_INCREMENT  FROM information_schema.TABLES WHERE TABLE_SCHEMA = 'recidenciacyj_apeajal' AND TABLE_NAME = 'salidas'";
        $query = $this->connect->prepare($sql);
        $query -> execute(); 
        $results = $query -> fetchAll(); 
        return $results;
    }

    public function getNextidMerma(){
        $sql = "SELECT AUTO_INCREMENT  FROM information_schema.TABLES WHERE TABLE_SCHEMA = 'recidenciacyj_apeajal' AND TABLE_NAME = 'mermaPlantaForestal'";
        $query = $this->connect->prepare($sql);
        $query -> execute(); 
        $results = $query -> fetchAll(); 
        return $results;
    }
    //Get tablas
    public function getAllPrediosforTabla(){
        $sql = "SELECT * from predios as p inner join clientes as c on p.idCliente = c.idCliente";
        $query = $this->connect->prepare($sql);
        $query -> execute(); 
        $results = $query -> fetchAll(); 
        return $results;
    }
    
    public function getAllSolicitudPlantasforTabla(){
        $sql = "Select s.idSolicitud,s.fecha, r.nombre, c.razonSocial,c.RFC,c.CURP,c.tipoCliente,s.estado from solicitudes as s INNER JOIN clientes as c on c.idCliente = s.idCliente INNER JOIN responsable as r on r.idResponsable = s.idResponsable;";
        $query = $this->connect->prepare($sql);
        $query -> execute(); 
        $results = $query -> fetchAll(); 
        return $results;
    }

    public function getAllVentasforTabla(){
        $sql = "SELECT v.idVenta, v.fechaVenta, v.idSolicitud , r.nombre , v.total FROM ventas as v INNER JOIN responsable as r on r.idResponsable=v.idResponsable";
        $query = $this->connect->prepare($sql);
        $query -> execute(); 
        $results = $query -> fetchAll(); 
        return $results;
    }
    
    public function getAllPagosforTabla(){
        $sql = "SELECT p.* from pagos as p INNER JOIN ventas as v ON v.idVenta=p.idVenta INNER JOIN solicitudes as s on s.idSolicitud=v.idSolicitud";
        $query = $this->connect->prepare($sql);
        $query -> execute(); 
        $results = $query -> fetchAll(); 
        return $results;
    }

    public function getAllSalidasForTabla(){
        $sql = 'SELECT s.idSalida,s.idPago,r.nombre as "Responsable",s.fechaEntrega from salidas as s INNER JOIN responsable as r on r.idResponsable=s.idResponsable';
        $query = $this->connect->prepare($sql);
        $query -> execute(); 
        $results = $query -> fetchAll(); 
        return $results;
    }

    public function getAllMermasForTabla(){
        $sql = "Select m.idMermaPlanta,m.fecha, r.nombre from mermaPlantaForestal as m INNER JOIN responsable as r on r.idResponsable = m.idResponsable;";
        $query = $this->connect->prepare($sql);
        $query -> execute(); 
        $results = $query -> fetchAll(); 
        return $results;
    }
    
    //get for selected
    public function getAllResponsableSelect(){
        $sql = "SELECT * from responsable";
        $query = $this->connect->prepare($sql);
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
    
    public function getAllMotivoMermasSelect(){
        $sql = "Select * from motivoMermaPlantaForestal";
        $query = $this->connect->prepare($sql);
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

    public function getAllSolicitudSelect(){
        $sql = "Select * from solicitudes as s where s.estado = 'Pendiente';";
        $query = $this->connect->prepare($sql);
        $query -> execute(); 
        $results = $query -> fetchAll(); 
        return $results;
    }

    public function getMotivoMermaPlantaForestal($idMotivoMerma){
        $sql = "Select * from motivoMermaPlantaForestal as mpf where mpf.idMotivoMerma=:idMotivoMerma";
        $query = $this->connect->prepare($sql);
        $query->bindParam(':idMotivoMerma', $idMotivoMerma);
        $query -> execute(); 
        $results = $query -> fetchAll(); 
        return $results;
    }

    public function getAllVentaSelect(){
        $sql = "SELECT * FROM ventas as v INNER JOIN solicitudes as s on s.idSolicitud=v.idSolicitud WHERE s.estado = 'Atendido'";
        $query = $this->connect->prepare($sql);
        $query -> execute(); 
        $results = $query -> fetchAll(); 
        return $results;
    }

    public function getAllPagosSelector(){
        $sql = "SELECT p.*,s.estado FROM pagos as p INNER JOIN ventas as v on p.idVenta=v.idVenta INNER JOIN solicitudes as s ON s.idSolicitud = v.idSolicitud WHERE s.estado='Pagado' OR s.estado='Entregando';";
        $query = $this->connect->prepare($sql);
        $query -> execute(); 
        $results = $query -> fetchAll(); 
        return $results;
    }


    //Get Individual

    public function getPlantasForestal($idPlanta){
        $sql = "SELECT e.nombre,p.*  from  plantaForestal as p INNER JOIN especie as e on p.idEspecie = e.idEspecie where p.idPlanta = :idPlanta";
        $query = $this->connect->prepare($sql);
        $query->bindParam(':idPlanta', $idPlanta);
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
    
    public function getVentaPlantas($idVenta){
        $sql = "SELECT v.idVenta,v.fechaVenta, s.idSolicitud, s.estado, r.nombre, r.puesto,v.total,c.tipoCliente FROM ventas as v INNER JOIN solicitudes as s ON s.idSolicitud = v.idSolicitud INNER JOIN clientes as c on s.idCliente = c.idCliente INNER JOIN responsable as r ON r.idResponsable = v.idResponsable WHERE v.idVenta = :idVenta";
        $query = $this->connect->prepare($sql);
        $query->bindParam(':idVenta', $idVenta);
        $query -> execute(); 
        $results = $query -> fetchAll(); 
        return $results;
    }

    public function getDetallesVentasPlantas($idVenta){
        $sql = "Select p.idPredio, p.municipio, p.extencion, p.latitud, p.longitud, pf.idPlanta, e.nombre,pf.descripcion, ds.precio, ds.cantidadSolicitada FROM detalleVenta as ds INNER JOIN predios as p ON ds.idPredio = p.idPredio INNER JOIN plantaForestal as pf ON ds.idPlanta = pf.idPlanta INNER JOIN especie AS e ON pf.idEspecie = e.idEspecie WHERE idVenta= :idVenta";
        $query = $this->connect->prepare($sql);
        $query->bindParam(':idVenta', $idVenta);
        $query -> execute(); 
        $results = $query -> fetchAll(); 
        return $results;
    }

    
    public function getDetallesVentasSalidas($idVenta)
    {
        $sql = "SELECT p.idPredio, p.municipio, p.extencion, p.latitud, p.longitud, pf.idPlanta, e.nombre,pf.descripcion, ds.precio, (ds.cantidadSolicitada-(SELECT ifNull(SUM(dsa.cantidadSurtida),0) FROM pagos as pa INNER JOIN salidas as sa ON sa.idPago=pa.idPago INNER JOIN detalleSalida as dsa ON sa.idSalida=dsa.idSalida WHERE pa.idVenta=:idVenta and p.idPredio = dsa.idPredio and dsa.idPlanta= pf.idPlanta )) as cantidadSolicitada FROM detalleVenta as ds INNER JOIN predios as p ON ds.idPredio = p.idPredio INNER JOIN plantaForestal as pf ON ds.idPlanta = pf.idPlanta INNER JOIN especie AS e ON pf.idEspecie = e.idEspecie WHERE idVenta= :idVenta1;";
        $query = $this->connect->prepare($sql);
        $query->bindParam(':idVenta', $idVenta);
        $query->bindParam(':idVenta1', $idVenta);
        $query -> execute(); 
        $results = $query -> fetchAll(); 
        return $results;
    }
    
    public function getResponsable($idResponsable){
        $sql = "SELECT * FROM responsable where idResponsable = :idResponsable";
        $query = $this->connect->prepare($sql);
        $query->bindParam(':idResponsable', $idResponsable);
        $query -> execute(); 
        $results = $query -> fetchAll(); 
        return $results;
    }
    
    public function getPagoPlantas($idPago){
        $sql="SELECT p.idVenta, p.idPago,p.fecha,r.nombre,r.puesto,p.conceptoGeneral,p.importe FROM pagos as p INNER JOIN responsable as r on r.idResponsable=p.idResponsable WHERE p.idPago=:idPago";
        $query = $this->connect->prepare($sql);
        $query->bindParam(':idPago', $idPago);
        $query -> execute(); 
        $results = $query -> fetchAll(); 
        return $results;
    }

    public function getSalida($idSalida){
        $sql = "SELECT s.idSalida,s.fechaEntrega as fechaSalida,r.nombre as nombreP,r.puesto as puestoP ,v.idVenta From salidas as s INNER JOIN responsable as r ON r.idResponsable=s.idResponsable  INNER JOIN pagos as p ON p.idPago=s.idPago INNER JOIN ventas as v on v.idVenta=p.idVenta WHERE s.idSalida = :idSalida";
        $query = $this->connect->prepare($sql);
        $query->bindParam(':idSalida', $idSalida);
        $query -> execute(); 
        $results = $query -> fetchAll(); 
        return $results;
    }

    public function getDetalleSalida($idSalida){
       $sql = "SELECT p.idPredio, p.municipio, p.extencion, p.latitud, p.longitud, pf.idPlanta, e.nombre,pf.descripcion, ds.cantidadSurtida FROM detalleSalida as ds INNER JOIN predios as p ON ds.idPredio = p.idPredio INNER JOIN plantaForestal as pf ON ds.idPlanta = pf.idPlanta INNER JOIN especie AS e ON pf.idEspecie = e.idEspecie WHERE ds.idSalida=:idSalida";
        $query = $this->connect->prepare($sql);
        $query->bindParam(':idSalida', $idSalida);
        $query -> execute(); 
        $results = $query -> fetchAll(); 
        return $results;
    }

    public function getMermaPlantas($idMermaPlanta){
        $sql = "SELECT r.nombre AS NombreResponsable , r.puesto AS PuestoResponsable, m.idMermaPlanta ,m.fecha FROM mermaPlantaForestal as m  INNER JOIN responsable as r ON r.idResponsable=m.idResponsable WHERE m.idMermaPlanta =  :idMermaPlanta;";
        $query = $this->connect->prepare($sql);
        $query->bindParam(':idMermaPlanta', $idMermaPlanta);
        $query -> execute(); 
        $results = $query -> fetchAll(); 
        return $results;
    }


    public function getDetallesMermas($idMermaPlanta){
       $sql = "SELECT dmpf.*,mm.nombre as motivoMerma,e.nombre FROM detalleMermaPlantaForestal as dmpf INNER JOIN motivoMermaPlantaForestal as mm ON dmpf.idMotivoMerma=mm.idMotivoMerma INNER JOIN plantaForestal as pf on pf.idPlanta=dmpf.idPlanta INNER JOIN especie as e on e.idEspecie=pf.idEspecie WHERE dmpf.idMermaPlanta=:idMermaPlanta";
        $query = $this->connect->prepare($sql);
        $query->bindParam(':idMermaPlanta', $idMermaPlanta);
        $query -> execute(); 
        $results = $query -> fetchAll(); 
        return $results;
    }
    //INSERT

    public function insertPredios( $idCliente, $municipio, $extencion, $usoPredio, $longitud, $latitud){
        $sql = "INSERT INTO predios( idCliente, municipio, extencion, usoPredio, longitud, latitud) VALUES ( :idCliente, :municipio, :extencion, :usoPredio, :longitud, :latitud)";
        $query = $this->connect->prepare($sql);
        $query->bindParam(':idCliente', $idCliente);
        $query->bindParam(':municipio', $municipio);
        $query->bindParam(':extencion', $extencion);
        $query->bindParam(':usoPredio', $usoPredio);
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
    
    public function cancelarSolicitud($idSolicitud){
        $sql="UPDATE solicitudes SET estado='Cancelado' WHERE  idSolicitud=:idSolicitud";
        $query = $this->connect->prepare($sql);
        $query->bindParam(':idSolicitud', $idSolicitud);
        $query->execute();
    }

    public function insertVentaPlanta($idSolicitud,$idResponsable,$fechaVenta,$total){
        $sql="INSERT INTO ventas(idSolicitud, idResponsable, fechaVenta, total) VALUES ( :idSolicitud, :idResponsable, :fechaVenta, :total)";
        $query = $this->connect->prepare($sql);
        $query->bindParam(':idSolicitud', $idSolicitud);
        $query->bindParam(':idResponsable', $idResponsable);
        $query->bindParam(':fechaVenta', $fechaVenta);
        $query->bindParam(':total', $total);
        $query->execute();
        $idVentaPlanta=$this->connect->lastInsertId();
        
        $sql="UPDATE solicitudes SET estado='Atendido' WHERE  idSolicitud=:idSolicitud";
        $query = $this->connect->prepare($sql);
        $query->bindParam(':idSolicitud', $idSolicitud);
        $query->execute();

        return $idVentaPlanta;
    }

    public function insertDetallesVenta($idVenta,$detalles){
        foreach ($detalles as $value) {
            $sql="INSERT INTO detalleVenta(idVenta, idPredio, idPlanta, cantidadSolicitada, precio) VALUES (:idVenta, :idPredio, :idPlanta, :cantidadSolicitada,:precio)";
            $query = $this->connect->prepare($sql);
            $query->bindParam(':idVenta', $idVenta);
            $query->bindParam(':idPredio', $value->predio);
            $query->bindParam(':idPlanta', $value->planta);
            $query->bindParam(':precio', $value->precio);
            $query->bindParam(':cantidadSolicitada', $value->Cantidad);
            $query->execute();
        }        
    }

    public function insertPagos($idResponsable, $idVenta, $fecha, $conceptoGeneral, $importe){
        $sql="INSERT INTO pagos(idResponsable, idVenta, fecha, conceptoGeneral, importe) VALUES (:idResponsable,:idVenta,:fecha,:conceptoGeneral,:importe)";
        $query = $this->connect->prepare($sql);
        $query->bindParam(':idResponsable', $idResponsable);
        $query->bindParam(':idVenta', $idVenta);
        $query->bindParam(':fecha', $fecha);
        $query->bindParam(':conceptoGeneral', $conceptoGeneral);
        $query->bindParam(':importe', $importe);
        $query->execute();
        $idPago=$this->connect->lastInsertId();

        $sql="SELECT * FROM ventas WHERE idVenta = :idVenta";
        $query = $this->connect->prepare($sql);
        $query->bindParam(':idVenta', $idVenta );
        $query->execute();

        $request=$query->fetchAll();
        $idSolicitud=$request[0]['idSolicitud'];

        $sql="UPDATE solicitudes SET estado='Pagado' WHERE  idSolicitud=:idSolicitud";
        $query = $this->connect->prepare($sql);
        $query->bindParam(':idSolicitud', $idSolicitud);
        $query->execute();

        return $idPago;
    }

    public function insertSalidaPlantas($idPago,$idResponsable,$fechaEntrega){
        $sql="INSERT INTO salidas(idPago, idResponsable, fechaEntrega) VALUES ( :idPago, :idResponsable,:fechaEntrega)";
        $query = $this->connect->prepare($sql);
        $query->bindParam(':idPago', $idPago);
        $query->bindParam(':idResponsable', $idResponsable);
        $query->bindParam(':fechaEntrega', $fechaEntrega);
        $query->execute();
        $idSalida=$this->connect->lastInsertId();
        $salidas = ["idSalida" => $idSalida,"idPago" => $idPago];
        return $salidas;
    }
 
    public function insertDetalleSalidas($idSalida,$detalles){
        foreach ($detalles as $value) {
            $sql="INSERT INTO detalleSalida(idSalida, idPredio, idPlanta, cantidadSurtida) VALUES (:idSalida, :idPredio, :idPlanta, :cantidadSurtida)";
            $query = $this->connect->prepare($sql);
            $query->bindParam(':idSalida', $idSalida);
            $query->bindParam(':idPredio', $value->predio);
            $query->bindParam(':idPlanta', $value->planta);
            $query->bindParam(':cantidadSurtida', $value->Cantidad);
            $query->execute();

            $sql="SELECT existencia  from  plantaForestal as pf  WHERE idPlanta=:idPlanta";
            $query = $this->connect->prepare($sql);
            $query->bindParam(':idPlanta', $value->planta );
            $query->execute();

            $request=$query->fetchAll();
            $existencias=$request[0]['existencia']-$value->Cantidad;

            $sql="UPDATE plantaForestal SET existencia=:existencia WHERE idPlanta=:idPlanta";
            $query = $this->connect->prepare($sql);
            $query->bindParam(':existencia', $existencias);
            $query->bindParam(':idPlanta', $value->planta);
            $query->execute();
        } 
    }

    public function insertSalidaEstado($idPago){
        
        $sql="SELECT dv.idPredio,dv.idPlanta,dv.cantidadSolicitada from  pagos as p  INNER JOIN ventas as v ON p.idVenta = v.idVenta INNER JOIN detalleVenta as dv on dv.idVenta = v.idVenta where p.idPago =:idPago ORDER BY dv.idPredio,dv.idPlanta;";
        $query = $this->connect->prepare($sql);
        $query->bindParam(':idPago', $idPago);
        $query->execute();
        $detallesVenta=$query->fetchAll();
        
        $sql="SELECT idPredio,idPlanta,SUM(cantidadSurtida) as cantidadSurtida FROM salidas as s INNER JOIN detalleSalida as ds on ds.idSalida= s.idSalida WHERE s.idPago = :idPago GROUP BY ds.idPredio,ds.idPlanta ORDER BY ds.idPredio,ds.idPlanta;";
        $query = $this->connect->prepare($sql);
        $query->bindParam(':idPago', $idPago);
        $query->execute();
        $detallesSalidas=$query->fetchAll();
        
        $totalVentas=count($detallesVenta);
        $totalSalidas=count($detallesSalidas);
        $VentaNoTerminada=false;
        
        if( $totalVentas == $totalSalidas){
            for ($i = 0; $i <= $totalVentas; $i++) {
                if($detallesVenta[$i]['idPredio']==$detallesSalidas[$i]['idPredio']){
                    if($detallesVenta[$i]['idPlanta']==$detallesSalidas[$i]['idPlanta']){
                        if($detallesVenta[$i]['cantidadSolicitada']==$detallesSalidas[$i]['cantidadSurtida']){
                                    $VentaNoTerminada=true;
                        }else{
                                    $VentaNoTerminada=false;
                            break;
                        }
                    }else{
                                $VentaNoTerminada=false;

                        break;
                    }
                }else{
                            $VentaNoTerminada=false;

                    break;
                }
                    
            }

        }
        $sql="Select v.idSolicitud FROM pagos as p INNER JOIN ventas as v ON v.idVenta= p.idVenta WHERE p.idPago=:idPago";
        $query = $this->connect->prepare($sql);
        $query->bindParam(':idPago', $idPago);
        $query->execute();
        $request=$query->fetchAll();
        $idSolicitud=$request[0]['idSolicitud'];

        if($VentaNoTerminada){
            $sql="UPDATE solicitudes SET estado='Terminado' WHERE  idSolicitud=:idSolicitud";
            $query = $this->connect->prepare($sql);
            $query->bindParam(':idSolicitud', $idSolicitud);
            $query->execute();
        }else{
            $sql="UPDATE solicitudes SET estado='Entregando' WHERE  idSolicitud=:idSolicitud";
            $query = $this->connect->prepare($sql);
            $query->bindParam(':idSolicitud', $idSolicitud);
            $query->execute();        
        }

    }

    public function InsertMermaPlantasForestales($fecha,$idResponsable){
        $sql="INSERT INTO mermaPlantaForestal(fecha, idResponsable) VALUES ( :fecha,:idResponsable)";
        $query = $this->connect->prepare($sql);
        $query->bindParam(':fecha', $fecha);
        $query->bindParam(':idResponsable', $idResponsable);
        $query->execute();
        $idMema=$this->connect->lastInsertId();
        return $idMema;
    }
    
    public function InsertDetalleMermaPlantaForestal($idMermaPlantas,$detalles){
         foreach ($detalles as $value) {
            $sql="INSERT INTO detalleMermaPlantaForestal(idMermaPlanta, idPlanta,idMotivoMerma, cantidad, motivo) VALUES (:idMermaPlantas, :idPlanta,:idMotivoMerma, :Cantidad,:Motivo)";
            $query = $this->connect->prepare($sql);
            $query->bindParam(':idMermaPlantas', $idMermaPlantas);
            $query->bindParam(':idPlanta', $value->planta);
            $query->bindParam(':Cantidad', $value->Cantidad);
            $query->bindParam(':Motivo', $value->Motivo);
            $query->bindParam(':idMotivoMerma', $value->idMotivoMerma);
            $query->execute();

            $sql="SELECT existencia  from  plantaForestal  WHERE idPlanta=:idPlanta";
            $query = $this->connect->prepare($sql);
            $query->bindParam(':idPlanta', $value->planta );
            $query->execute();

            $request=$query->fetchAll();
            $existencias=$request[0]['existencia']-$value->Cantidad;
            
            $sql="UPDATE plantaForestal SET existencia=:existencia WHERE idPlanta=:idPlanta";
            $query = $this->connect->prepare($sql);
            $query->bindParam(':existencia', $existencias);
            $query->bindParam(':idPlanta', $value->planta);
            $query->execute();
        }     
    }





/*














    public function getAllResponsable() {
        $sql = "SELECT * from responsable";
        $query = $this->connect->prepare($sql);
        $query -> execute(); 
        $results = $query -> fetchAll(); 
        return $results;
    }
    


    public function getPredios($idPredio)
    {
        $sql = "SELECT * FROM predios where idPredio = :idPredio";
        $query = $this->connect->prepare($sql);
        $query->bindParam(':idPredio', $idPredio);
        $query -> execute(); 
        $results = $query -> fetchAll(); 
        return $results;
    }
 
    public function getPredioForCliente($idCliente)
    {
        $sql = "SELECT * FROM predios where idCliente = :idCliente";
        $query = $this->connect->prepare($sql);
        $query->bindParam(':idCliente', $idCliente);
        $query -> execute(); 
        $results = $query -> fetchAll(); 
        return $results;
    }

    public function getPlantasForestal($idPlanta)
    {

    }



    public function getAllPlantas()
    {
        $sql = "SELECT p.*,e.nombre FROM plantaForestal as p INNER JOIN especie as e ON e.idEspecie=p.idEspecie;";
        $query = $this->connect->prepare($sql);
        $query -> execute(); 
        $results = $query -> fetchAll(); 
        return $results;
    }

    public function getAllPredios() {
        $sql = "SELECT * from predios as p inner join clientes as c on p.idCliente = c.idCliente";
        $query = $this->connect->prepare($sql);
        $query -> execute(); 
        $results = $query -> fetchAll(); 
        return $results;
    }

   public function getAllSolicitud()
    {
        $sql = "Select s.idSolicitud,s.fecha, r.nombre, c.razonSocial,c.RFC,c.CURP,c.tipoCliente,s.estado from solicitudes as s INNER JOIN clientes as c on c.idCliente = s.idCliente INNER JOIN responsable as r on r.idResponsable = s.idResponsable;";
        $query = $this->connect->prepare($sql);
        $query -> execute(); 
        $results = $query -> fetchAll(); 
        return $results;
    }

   public function getAllSolicitudPendientes()
    {

    }

    public function getAllVentas()
    {
;
    }

    public function getVentaPlanta()
    {
        $sql = "Select v.idVenta, v.fechaVenta, s.idSolicitud, r.nombre, v.total from ventas as v INNER JOIN responsable as r on v.idResponsable = r.idResponsable INNER Join solicitudes as s on v.idSolicitud = s.idSolicitud";
        $query = $this->connect->prepare($sql);
        $query -> execute(); 
        $results = $query -> fetchAll(); 
        return $results;
    }

    public function getAllVenta(){
        $sql = "SELECT v.idVenta,v.fechaVenta, s.idSolicitud, s.estado, r.nombre, r.puesto FROM ventas as v INNER JOIN solicitudes as s ON s.idSolicitud = v.idSolicitud INNER JOIN responsable as r ON r.idResponsable = v.idResponsable WHERE s.estado = 'Atendido'";
        $query = $this->connect->prepare($sql);
        $query -> execute(); 
        $results = $query -> fetchAll(); 
        return $results;
    }
    


    //

    
    public function getPagoPlanta($idPago)
    {
        $sql = "SELECT p.fecha as fechaPago,p.conceptoGeneral,p.importe,r.nombre as nombreResponsable,r.puesto,p.idVenta,s.idCliente from pagos as p INNER JOIN responsable as r ON r.idResponsable=p.idResponsable  INNER JOIN ventas as v on v.idVenta = p.idVenta INNER JOIN solicitudes as s on s.idSolicitud= v.idSolicitud WHERE p.idPago = :idPago";
        $query = $this->connect->prepare($sql);
        $query->bindParam(':idPago', $idPago);
        $query -> execute();         
        $results = $query -> fetchAll(); 
        return $results;
    }

    public function getAllPago()
    {
        $sql = "SELECT p.idPago,p.fecha,p.conceptoGeneral,p.importe,r.nombre as nombreResponsable,r.puesto,p.idVenta,s.idCliente   from pagos as p INNER JOIN responsable as r ON r.idResponsable=p.idResponsable  INNER JOIN ventas as v on v.idVenta = p.idVenta INNER JOIN solicitudes as s on s.idSolicitud= v.idSolicitud";
        $query = $this->connect->prepare($sql);
        $query->bindParam(':idPago', $idPago);
        $query -> execute();         
        $results = $query -> fetchAll(); 
        return $results;
    }

    public function getSalidaPlanta()
    {
        $sql = "Select * from salidas";
        $query = $this->connect->prepare($sql);
        $query -> execute(); 
        $results = $query -> fetchAll(); 
        return $results;
    }

    public function getAllPagos()
    {

    }
	
	public function getAllPagosSelect()
    {
        $sql = "SELECT p.idPago from pagos as p INNER JOIN ventas as v ON v.idVenta=p.idVenta INNER JOIN solicitudes as s on s.idSolicitud=v.idSolicitud WHERE s.estado = 'Pagado' or s.estado ='Entregando'";
        $query = $this->connect->prepare($sql);
        $query -> execute(); 
        $results = $query -> fetchAll(); 
        return $results;
    }
	

   
    


    
 
    


    //NEXT IDS








    //TODO:SELECT DEBAJO DE ESTa liena es importete no BORRES 
    //SELECT dv.saldo -(SELECT SUM(ds.cantidadSurtida) from salidas as s INNER JOIN pagos as p on s.idPago= p.idPago INNER JOIN ventas as v on v.idVenta = p.idVenta INNER JOIN detalleSalida as ds on ds.idSalida = s.idSalida WHERE ds.idPlanta = 1 and v.idVenta = 1 and ds.) from pagos as p INNER JOIN ventas as v on p.idVenta = v.idVenta INNER JOIN detalleVenta as dv on dv.idVenta = v.idVenta;

*/
}