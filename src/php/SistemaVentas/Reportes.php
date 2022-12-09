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



    public function RSolicitudes($fi,$ff){
        $sql = "SELECT s.idSolicitud,s.fecha,r.nombre,c.razonSocial,ds.idPredio,e.nombre,ds.cantidadSolicitada,ds.precio FROM solicitudes as s INNER JOIN clientes as c ON c.idCliente=s.idCliente INNER JOIN responsable as r ON r.idResponsable=s.idResponsable INNER JOIN detalleSolicitud as ds ON ds.idSolicitud=s.idSolicitud INNER JOIN plantaForestal as pf ON pf.idPlanta= ds.idPlanta INNER JOIN especie as e ON e.idEspecie = pf.idEspecie WHERE s.estado = 'Pendiente' and  s.fecha BETWEEN :fi AND :ff  ;";
        $query = $this->connect->prepare($sql);
        $query->bindParam(':fi', $fi,PDO::PARAM_STR);
        $query->bindParam(':ff', $ff,PDO::PARAM_STR);
        $query -> execute(); 
        $results = $query -> fetchAll(PDO::FETCH_NUM); 
        return $results;
    }

    
    public function RVentas($fi,$ff){
        $sql = "SELECT v.idVenta,v.fechaVenta,r.nombre,c.razonSocial,dv.idPredio,e.nombre,dv.cantidadSolicitada,dv.precio FROM ventas as v INNER JOIN solicitudes as s ON s.idSolicitud=v.idSolicitud INNER JOIN clientes as c ON c.idCliente=s.idCliente INNER JOIN responsable as r ON r.idResponsable=s.idResponsable INNER JOIN detalleVenta as dv ON dv.idVenta=v.idVenta INNER JOIN plantaForestal as pf ON pf.idPlanta= dv.idPlanta INNER JOIN especie as e ON e.idEspecie = pf.idEspecie WHERE s.estado = 'Atendido' and  s.fecha BETWEEN :fi AND :ff ;";
        $query = $this->connect->prepare($sql);
        $query->bindParam(':fi', $fi,PDO::PARAM_STR);
        $query->bindParam(':ff', $ff,PDO::PARAM_STR);
        $query -> execute(); 
        $results = $query -> fetchAll(PDO::FETCH_NUM); 
        return $results;
    }

    public function Rpago($fi,$ff){
        $sql = "SELECT p.idPago,r.nombre,c.razonSocial,v.idVenta,p.fecha,p.conceptoGeneral,p.importe FROM pagos as p INNER JOIN responsable as r ON r.idResponsable= p.idResponsable INNER JOIN ventas as v ON v.idVenta=p.idVenta INNER JOIN solicitudes as s ON s.idSolicitud=v.idSolicitud INNER JOIN clientes as c ON c.idCliente=s.idCliente WHERE   s.fecha BETWEEN :fi AND :ff ;";
        $query = $this->connect->prepare($sql);
        $query->bindParam(':fi', $fi,PDO::PARAM_STR);
        $query->bindParam(':ff', $ff,PDO::PARAM_STR);
        $query -> execute(); 
        $results = $query -> fetchAll(PDO::FETCH_NUM); 
        return $results;
    }

    public function Rsalida($fi,$ff){
        $sql = "SELECT sa.idSalida,r.nombre,p.idPago,sa.fechaEntrega,dsa.idPredio,e.nombre as 'Planta',dsa.cantidadSurtida FROM salidas as sa INNER JOIN pagos as p ON sa.idPago=p.idPago INNER JOIN ventas as v ON p.idVenta=v.idVenta INNER JOIN solicitudes as s ON s.idSolicitud=v.idSolicitud INNER JOIN responsable as r on r.idResponsable=s.idResponsable INNER JOIN detalleSalida as dsa ON dsa.idSalida= sa.idSalida INNER JOIN plantaForestal as pf on pf.idPlanta = dsa.idPlanta INNER JOIN especie as e ON pf.idEspecie=e.idEspecie WHERE s.estado = 'Entregado' OR s.estado='Entregando' and  s.fecha BETWEEN :fi AND :ff ;";
        $query = $this->connect->prepare($sql);
        $query->bindParam(':fi', $fi,PDO::PARAM_STR);
        $query->bindParam(':ff', $ff,PDO::PARAM_STR);
        $query -> execute(); 
        $results = $query -> fetchAll(PDO::FETCH_NUM); 
        return $results;
    }

    public function RMermas($fi,$ff){
        $sql="SELECT mpf.fecha,r.nombre,e.nombre,dmpf.cantidad,dmpf.motivo,mm.nombre as motivoMermaPlantaForestal from mermaPlantaForestal as mpf INNER JOIN detalleMermaPlantaForestal as dmpf on mpf.idMermaPlanta=dmpf.idMermaPlanta INNER JOIN responsable as r ON r.idResponsable = mpf.idResponsable INNER JOIN plantaForestal as pf ON pf.idPlanta= dmpf.idMermaPlanta INNER JOIN especie as e ON pf.idEspecie=e.idEspecie INNER JOIN motivoMermaPlantaForestal as mm ON mm.idMotivoMerma = dmpf.idMotivoMerma WHERE mpf.fecha BETWEEN :fi AND :ff;";
        $query = $this->connect->prepare($sql);
        $query->bindParam(':fi', $fi,PDO::PARAM_STR);
        $query->bindParam(':ff', $ff,PDO::PARAM_STR);
        $query -> execute(); 
        $results = $query -> fetchAll(PDO::FETCH_NUM); 
        return  $results;
    }

    public function RInventarioFisicio(){
        $sql="Select pf.idPlanta,e.nombre,pf.descripcion,pf.existencia,pf.precio from plantaForestal as pf INNER JOIN especie as e ON e.idEspecie=pf.idEspecie ;";
        $query = $this->connect->prepare($sql);
        $query -> execute(); 
        $results = $query -> fetchAll(PDO::FETCH_NUM); 
        return  $results;
    }

    public function RInventarioVirtual(){
        $sql="Select pf.idPlanta,e.nombre,pf.descripcion,pf.existencia,(SELECT IFNULL(SUM(dv.cantidadSolicitada),0) FROM pagos as p inner join ventas as v on v.idVenta=p.idVenta INNER JOIN solicitudes as s ON s.idSolicitud=v.idSolicitud INNER JOIN detalleVenta as dv ON dv.idVenta=v.idVenta inner join plantaForestal as pfl on pfl.idPlanta=dv.idPlanta WHERE dv.idPlanta=pf.idPlanta GROUP BY pfl.idPlanta) as existenciaV,pf.precio from plantaForestal as pf INNER JOIN especie as e ON e.idEspecie=pf.idEspecie;";
        $query = $this->connect->prepare($sql);
        $query -> execute(); 
        $results = $query -> fetchAll(PDO::FETCH_NUM); 
        return  $results;
    }


}