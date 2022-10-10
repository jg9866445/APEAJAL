<?php 
require_once($_SERVER['DOCUMENT_ROOT']."/src/php/SistemaVentas/Movimiento.php");

//getProveedores
if(isset($_POST['Busqueda'])){
    switch ($_POST['Busqueda']) {
        case 'SolicitudPlantas':
            $idSolicitud = $_POST['idSolicitud'];
            $conexion = new Movimientos();
            $resultado = $conexion->getSolicitudPlantasIn($idSolicitud);
            echo json_encode($resultado);
            break;
    }
}