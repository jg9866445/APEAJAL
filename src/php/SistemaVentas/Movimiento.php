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

    public function getAllClientes(){
        $sql = "SELECT * from  clientes";
        $query = $this->connect->prepare($sql);
        $query -> execute(); 
        $results = $query -> fetchAll(); 
        return $results;
    }

    public function getAllResponsable() {
        $sql = "SELECT * from responsable";
        $query = $this->connect->prepare($sql);
        $query -> execute(); 
        $results = $query -> fetchAll(); 
        return $results;
    }
    
    public function getAllPlantas()
    {
        $sql = "SELECT p.*,e.nombre FROM plantaForestal as p INNER JOIN especie as e ON e.idEspecie=p.idEspecie;";
        $query = $this->connect->prepare($sql);
        $query -> execute(); 
        $results = $query -> fetchAll(); 
        return $results;
    }


    //Aqui va los get para tablas 
    public function getAllPredios() {
        $sql = "SELECT * from predios as p inner join clientes as c on p.idCliente = c.idCliente";
        $query = $this->connect->prepare($sql);
        $query -> execute(); 
        $results = $query -> fetchAll(); 
        return $results;
    }



    public function getAllVentas()
    {
        $sql = "SELECT v.idVenta, v.fechaVenta, v.idSolicitud , r.nombre , v.total FROM ventas as v INNER JOIN responsable as r on r.idResponsable=v.idResponsable";
        $query = $this->connect->prepare($sql);
        $query -> execute(); 
        $results = $query -> fetchAll(); 
        return $results;
    }

    public function getAllPagos()
    {
        $sql = "SELECT p.idPago,p.fecha,p.idVenta,p.idResponsable,p.conceptoGeneral,p.importe from pagos as p  INNER JOIN responsable as r on r.idResponsable= p.idResponsable";
        $query = $this->connect->prepare($sql);
        $query -> execute(); 
        $results = $query -> fetchAll(); 
        return $results;
    }

   public function getAllSolicitud()
    {
        $sql = "Select s.idSolicitud,s.fecha, r.nombre, c.razonSocial,c.RFC,c.CURP,c.tipoCliente from solicitudes as s INNER JOIN clientes as c on c.idCliente = s.idCliente INNER JOIN responsable as r on r.idResponsable = s.idResponsable;";
        $query = $this->connect->prepare($sql);
        $query -> execute(); 
        $results = $query -> fetchAll(); 
        return $results;
    }






















































    public function getResponsable($idResponsable)
    {
        $sql = "SELECT * FROM responsable where idResponsable = :idResponsable";
        $query = $this->connect->prepare($sql);
        $query->bindParam(':idResponsable', $idResponsable);
        $query -> execute(); 
        $results = $query -> fetchAll(); 
        return $results;
    }

    public function getClientes($idCliente)
    {
        $sql = "SELECT * FROM clientes where idCliente = :idCliente";
        $query = $this->connect->prepare($sql);
        $query->bindParam(':idCliente', $idCliente);
        $query -> execute(); 
        $results = $query -> fetchAll(); 
        return $results;
    }
    //TODO:Ok error en esta funcion no tengo el tiempo para solocinar que funcione segun el cliente que esta selecionado porqueu es fucion de dos tablas
    public function getPredios($idPredio)
    {
        $sql = "SELECT * FROM predios where idPredio = :idPredio";
        $query = $this->connect->prepare($sql);
        $query->bindParam(':idPredio', $idPredio);
        $query -> execute(); 
        $results = $query -> fetchAll(); 
        return $results;
    }

    public function getPlantasForestal($idPlanta)
    {
        $sql = "SELECT e.nombre,p.descripcion,p.precio  from  plantaForestal as p INNER JOIN especie as e on p.idEspecie = e.idEspecie where p.idPlanta = :idPlanta";
        $query = $this->connect->prepare($sql);
        $query->bindParam(':idPlanta', $idPlanta);
        $query -> execute(); 
        $results = $query -> fetchAll(); 
        return $results;
    }

    public function getSolicitud($idSolicitud)
    {
        $sql = "SELECT c.razonSocial, c.domicilio, c.RFC, c.telefono, s.fecha, s.estado,s.total, r.nombre, r.puesto  from  solicitudes as s INNER JOIN clientes as c on s.idCliente = c.idCliente INNER JOIN responsable as r on s.idResponsable = r.idResponsable where s.idSolicitud = :idSolicitud";
        $query = $this->connect->prepare($sql);
        $query->bindParam(':idSolicitud', $idSolicitud);
        $query -> execute(); 
        $results = $query -> fetchAll(); 
        return $results;
    }

    /*public function getDetallesSolicitud($idSolicitud)
    {
        $sql = "Select p.idPredio, p.municipio, p.extencion, p.latitud, p.longitud, pf.idPlanta, e.nombre, ds.precio, ds.cantidadSolicitada FROM detalleSolicitud as ds INNER JOIN predios as p ON ds.idPredio = p.idPredio INNER JOIN plantaForestal as pf ON ds.idPlanta = pf.idPlanta INNER JOIN especie AS e ON pf.idEspecie = e.idEspecie WHERE idSolicitud= :idSolicitud";
        $query = $this->connect->prepare($sql);
        $query->bindParam(':idSolicitud', $idSolicitud);
        $query -> execute(); 
        $results = $query -> fetchAll(); 
        return $results;
    }*/

    public function get($idSolicitud)
    {
        $sql = "SELECT c.razonSocial, c.domicilio, c.RFC, c.telefono, s.fecha, s.estado,s.total, r.nombre, r.puesto  from  solicitudes as s INNER JOIN clientes as c on s.idCliente = c.idCliente INNER JOIN responsable as r on s.idResponsable = r.idResponsable where s.idSolicitud = :idSolicitud";
        $query = $this->connect->prepare($sql);
        $query->bindParam(':idSolicitud', $idSolicitud);
        $query -> execute(); 
        $results = $query -> fetchAll(); 
        return $results;
    }

    public function getDetallesSolicitud($idSolicitud)
    {
        $sql = "Select p.idPredio, p.municipio, p.extencion, p.latitud, p.longitud, pf.idPlanta, e.nombre, ds.precio, ds.cantidadSolicitada FROM detalleSolicitud as ds INNER JOIN predios as p ON ds.idPredio = p.idPredio INNER JOIN plantaForestal as pf ON ds.idPlanta = pf.idPlanta INNER JOIN especie AS e ON pf.idEspecie = e.idEspecie WHERE idSolicitud= :idSolicitud";
        $query = $this->connect->prepare($sql);
        $query->bindParam(':idSolicitud', $idSolicitud);
        $query -> execute(); 
        $results = $query -> fetchAll(); 
        return $results;
    }

    public function getPagoPlanta()
    {
        $sql = "SELECT * from pagos";
        $query = $this->connect->prepare($sql);
        $query -> execute(); 
        $results = $query -> fetchAll(); 
        return $results;
    }









 

    public function getVentaPlanta()
    {
        $sql = "Select v.idVenta, v.fechaVenta, s.idSolicitud, r.nombre, v.total from ventas as v INNER JOIN responsable as r on v.idResponsable = r.idResponsable INNER Join solicitudes as s on v.idSolicitud = s.idSolicitud";
        $query = $this->connect->prepare($sql);
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

    public function getAllVenta(){
        $sql = "SELECT v.fechaVenta, s.idSolicitud, s.estado, r.nombre, r.puesto FROM ventas as v INNER JOIN solicitudes as s ON s.idSolicitud = v.idSolicitud INNER JOIN responsable as r ON r.idResponsable = v.idResponsable;";
        $query = $this->connect->prepare($sql);
        $query -> execute(); 
        $results = $query -> fetchAll(); 
        return $results;
    }

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

    public function insertSolicitud($idCliente,$fecha,$estado,$idResponsable){
        $sql="INSERT INTO solicitudes(idCliente, fecha, estado, idResponsable) VALUES ( :idCliente, :fecha, :estado, :idResponsable)";
        $query = $this->connect->prepare($sql);
        $query->bindParam(':idCliente', $idCliente);
        $query->bindParam(':fecha', $fecha);
        $query->bindParam(':estado', $estado);
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


    //NEXT IDS
    function getNextidSolicitudPlantas(){
        $sql = "SELECT AUTO_INCREMENT  FROM information_schema.TABLES WHERE TABLE_SCHEMA = 'recidenciacyj_apeajal' AND TABLE_NAME = 'solicitudes'";
        $query = $this->connect->prepare($sql);
        $query -> execute(); 
        $results = $query -> fetchAll(); 
        return $results;
    }

    function getNextidVenta(){
        $sql = "SELECT AUTO_INCREMENT  FROM information_schema.TABLES WHERE TABLE_SCHEMA = 'recidenciacyj_apeajal' AND TABLE_NAME = 'solicitudes'";
        $query = $this->connect->prepare($sql);
        $query -> execute(); 
        $results = $query -> fetchAll(); 
        return $results;
    }





    //TODO:PORFAVOR ANALIZA BIEN ESTE CODIGO PARA VER QUE PUEDES Y QUE NO ELINAR Y dejarlo mucho mas entendible
    //TODO:SELECT DEBAJO DE ESTa liena es importete no BORRES 
    //SELECT dv.saldo -(SELECT SUM(ds.cantidadSurtida) from salidas as s INNER JOIN pagos as p on s.idPago= p.idPago INNER JOIN ventas as v on v.idVenta = p.idVenta INNER JOIN detalleSalida as ds on ds.idSalida = s.idSalida WHERE ds.idPlanta = 1 and v.idVenta = 1 and ds.) from pagos as p INNER JOIN ventas as v on p.idVenta = v.idVenta INNER JOIN detalleVenta as dv on dv.idVenta = v.idVenta;

    /*public function getPlantasForestal(){
        $sql = "SELECT * FROM plantaForestal";
        $query = $this->connect->prepare($sql);
        $query -> execute(); 
        $results = $query -> fetchAll(); 
        return $results;
    }*/

    /*public function getPredios(){
        $sql = "SELECT p.idPredio, c.razonSocial, p.municipio, p.extencion, p.usoPredio, p.longitud, p.latitud FROM predios as p INNER JOIN clientes as c On c.idCliente = p.idCliente";
        $query = $this->connect->prepare($sql);
        $query -> execute(); 
        $results = $query -> fetchAll(); 
        return $results;
    }*/

    /*public function insertSolicitudPlantas($idSolicitud, $fecha){
        cambiar estado por pendiente
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
    }*/

    /*public function getSolicitudesPlantas()
    {
        $sql = "Select idSolicitud from solicitudes";
        $query = $this->connect->prepare($sql);
        $query -> execute(); 
        $results = $query -> fetchAll(); 
        return $results;
    }*/

    /*public function getSolicitudPlantasIn($idSolicitud)
    {
        $sql = "SELECT c.razonSocial,e.nombre,pf.descripcion FROM solicitudes as s INNER JOIN detalleSolicitud as ds on s.idSolicitud=ds.idSolicitud INNER JOIN clientes as c ON s.idCliente = c.idCliente INNER JOIN plantaForestal as pf ON pf.idPlanta = ds.idPlanta INNER JOIN especie as e ON e.idEspecie=pf.idEspecie WHERE s.idSolicitud = :idSolicitud ";
        $query = $this->connect->prepare($sql);
        $query->bindParam(':idSolicitud', $idSolicitud);
        $query -> execute(); 
        $results = $query -> fetchAll(); 
        return $results;
    }*/

    /*function getNextPago(){
        $sql = "SELECT AUTO_INCREMENT  FROM information_schema.TABLES WHERE TABLE_SCHEMA = 'recidenciacyj_apeajal' AND TABLE_NAME = 'pagos'";
        $query = $this->connect->prepare($sql);
        $query -> execute(); 
        $results = $query -> fetchAll(); 
        return $results;
    }*/

    /*public function insertPagos($idSolicitud,$fecha,$conceptoGeneral,$Importe,$CantidadSurtida){
        $sql="INSERT INTO pagos( idSolicitud, fecha, conceptoGeneral, importe) VALUES (:idSolicitud,:fecha,:conceptoGeneral,:Importe)";
        $query = $this->connect->prepare($sql);
        $query->bindParam(':idSolicitud', $idSolicitud);
        $query->bindParam(':fecha', $fecha);
        $query->bindParam(':conceptoGeneral', $conceptoGeneral);
        $query->bindParam(':Importe', $Importe);
        $query->execute();

        $sql="SELECT idCliente FROM solicitudes WHERE idSolicitud= :idSolicitud";
        $query = $this->connect->prepare($sql);
        $query->bindParam(':idSolicitud', $idSolicitud);
        $query->execute();

        $request=$query->fetchAll();
        $idCliente=$request[0]['idCliente'];

        $sql="SELECT saldo FROM clientes WHERE idCliente= :idCliente";
        $query = $this->connect->prepare($sql);
        $query->bindParam(':idCliente', $idCliente);
        $query->execute();

        $request=$query->fetchAll();
        $saldo=$request[0]['saldo']-$Importe;

        $sql="UPDATE clientes SET saldo=:saldo WHERE idCliente=:idCliente";
        $query = $this->connect->prepare($sql);
        $query->bindParam(':saldo', $saldo);
        $query->bindParam(':idCliente', $idCliente);
        $query->execute();

        $sql="SELECT idSalida FROM salidas WHERE idSolicitud= :idSolicitud";
        $query = $this->connect->prepare($sql);
        $query->bindParam(':idSolicitud', $idSolicitud);
        $query->execute();

        $request=$query->fetchAll();
        $idSalida=$request[0]['idSalida'];

        $sql="SELECT saldo FROM detalleSalida WHERE idSalida= :idSalida";
        $query = $this->connect->prepare($sql);
        $query->bindParam(':idSalida', $idSalida);
        $query->execute();

        $request=$query->fetchAll();
        $saldo=$request[0]['saldo']-$Importe;

        $sql="UPDATE detalleSalida SET saldo=:saldo WHERE idSalida=:idSalida";
        $query = $this->connect->prepare($sql);
        $query->bindParam(':saldo', $saldo);
        $query->bindParam(':idSalida', $idSalida);
        $query->execute();
    }*/
}