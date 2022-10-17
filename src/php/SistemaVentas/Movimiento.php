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

    public function getResponsable($idResponsable)
    {
        $sql = "SELECT * FROM responsable where idResponsable = $idResponsable";
        $query = $this->connect->prepare($sql);
        $query->bindParam(':idResponsable', $idResponsable);
        $query -> execute(); 
        $results = $query -> fetchAll(); 
        return $results;
    }

    public function getClientes($idCliente)
    {
        $sql = "SELECT * FROM clientes where idCliente = $idCliente";
        $query = $this->connect->prepare($sql);
        $query->bindParam(':idCliente', $idCliente);
        $query -> execute(); 
        $results = $query -> fetchAll(); 
        return $results;
    }

    public function getPredios($idPredio)
    {
        $sql = "SELECT * FROM predios where idPredio = $idPredio";
        $query = $this->connect->prepare($sql);
        $query->bindParam(':idPredio', $idPredio);
        $query -> execute(); 
        $results = $query -> fetchAll(); 
        return $results;
    }

    public function getPlantasForestal($idPlanta)
    {
        $sql = "SELECT e.nombre,p.descripcion,p.precio  from  plantaForestal as p INNER JOIN especie as e on p.idEspecie = e.idEspecie";
        $query = $this->connect->prepare($sql);
        $query->bindParam(':idPlanta', $idPlanta);
        $query -> execute(); 
        $results = $query -> fetchAll(); 
        return $results;
    }

    //consulta completa

    public function getAllResponsable() {
        $sql = "SELECT * from responsable";
        $query = $this->connect->prepare($sql);
        $query -> execute(); 
        $results = $query -> fetchAll(); 
        return $results;
    }

    public function getAllClientes(){
        $sql = "SELECT * from  clientes";
        $query = $this->connect->prepare($sql);
        $query -> execute(); 
        $results = $query -> fetchAll(); 
        return $results;
    }

    public function getAllPredios() {
        $sql = "SELECT * from predios as p INNER JOIN clientes as c ON c.idCliente= p.idCliente;";
        $query = $this->connect->prepare($sql);
        $query -> execute(); 
        $results = $query -> fetchAll(); 
        return $results;
    }

    public function getAllPlanta(){
        $sql = "SELECT p.*,e.nombre FROM plantaForestal as p INNER JOIN especie as e ON e.idEspecie=p.idEspecie;";
        $query = $this->connect->prepare($sql);
        $query -> execute(); 
        $results = $query -> fetchAll(); 
        return $results;
    }

    public function getAllSolicitud() {
        $sql = "SELECT * from solicitudes";
        $query = $this->connect->prepare($sql);
        $query -> execute(); 
        $results = $query -> fetchAll(); 
        return $results;
    }

    public function getSolicitudPlantas()
    {
        $sql = "Select s.idSolicitud,s.fecha, r.nombre, c.razonSocial,c.RFC,c.CURP,c.tipoCliente,p.municipio,p.usoPredio,e.nombre,pf.descripcion,ds.cantidadSolicitada from solicitudes as s INNER JOIN clientes as c on c.idCliente = s.idCliente INNER Join predios as p on p.idCliente=s.idCliente INNER JOIN detalleSolicitud as ds on ds.idSolicitud = s.idSolicitud INNER JOIN plantaForestal as pf on pf.idPlanta = ds.idPlanta INNER JOIN especie as e on e.idEspecie = pf.idEspecie INNER JOIN responsable as r on r.idResponsable = s.idResponsable";
        $query = $this->connect->prepare($sql);
        $query -> execute(); 
        $results = $query -> fetchAll(); 
        return $results;
    }

    public function getVentaPlanta()
    {
        $sql = "Select v.fechaVenta, s.idSolicitud, r.nombre, v.total from ventas as v INNER JOIN responsable as r on v.idResponsable = r.idResponsable INNER Join solicitudes as s on v.idSolicitud = s.idSolicitud";
        $query = $this->connect->prepare($sql);
        $query -> execute(); 
        $results = $query -> fetchAll(); 
        return $results;
    }

    //inserts 

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