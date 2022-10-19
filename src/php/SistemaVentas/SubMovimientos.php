<?php 
require_once($_SERVER['DOCUMENT_ROOT']."/src/php/SistemaVentas/Movimiento.php");

//getProveedores
if(isset($_POST['Metodo'])){
    switch ($_POST['Metodo']) {
        case 'getResponsable':
            $idResponsable = $_POST['idResponsable'];
            $conexion = new Movimientos();
            $resultado = $conexion->getResponsable($idResponsable);
            echo json_encode($resultado);
        break;

        case 'getClientes':
            $idCliente = $_POST['idCliente'];
            $conexion = new Movimientos();
            $resultado = $conexion->getClientes($idCliente);
            echo json_encode($resultado);
        break;

        case 'getPredios':
            $idPredio = $_POST['idPredio'];
            $conexion = new Movimientos();
            $resultado = $conexion->getPredios($idPredio);
            echo json_encode($resultado);
        break;

        case 'getPlanta':
            $idPlanta = $_POST['idPlanta'];
            $conexion = new Movimientos();
            $resultado = $conexion->getPlantasForestal($idPlanta);
            echo json_encode($resultado);
        break;

        case 'getSolicitud':
            $idSolicitud = $_POST['idSolicitud'];
            $conexion = new Movimientos();
            $resultado = $conexion->getSolicitud($idSolicitud);
            echo json_encode($resultado);
        break;

        case 'getPagoPlanta':
            $idResponsable = $_POST['idPago'];
            $conexion = new Movimientos();
            $resultado = $conexion->getPagoPlanta($idPago);
            echo json_encode($resultado);
        break;

        case 'getDetallesSolicitud':
            $idSolicitud = $_POST['idSolicitud'];
            $conexion = new Movimientos();
            $resultado = $conexion->getDetallesSolicitud($idSolicitud);
            echo json_encode($resultado);
        break;

        case 'insertSolicitudPlantas':
            $datosSolicud= json_decode($_POST['datosSolicud']);
            $detalles= json_decode($_POST['detalles']);
            $conexion = New Movimientos();
            $idSolicitud=$conexion->insertSolicitud($datosSolicud->idCliente,$datosSolicud->FechaSolicitud,$datosSolicud->estado,$datosSolicud->idResponsable);
            $conexion->insertDetallesSolicitud($idSolicitud,$detalles);
        break;

        case 'getAllInsumos':
            $conexion = New Movimientos();
            $resultado = $conexion->getAllInsumos();
            echo json_encode($resultado);
        break;
        
        case 'getAllProveedores':
            $conexion = New Movimientos();
            $resultado = $conexion->getAllProveedores();
            echo json_encode($resultado);
        break;
        

        default:
            echo "Error";
        break;
    }
}
//getDetallesSolicitud