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

        default:
            echo "Error";
        break;
    }
}