<?php 

require_once($_SERVER['DOCUMENT_ROOT']."/src/php/SistemaProduccion/Movimientos.php");
    
//getProveedores
if(isset($_POST['Metodo'])){
    switch ($_POST['Metodo']) {
        case 'getNextIdCompra':
            $conexion = new Movimientos();
            $resultado = $conexion->getNextIdCompra();
            echo json_encode($resultado);
        break;
        
        case 'getAllComprasInsumos':
            $conexion = new Movimientos();
            $resultado = $conexion->getAllComprasInsumos();
            echo json_encode($resultado);
        break;

        case 'getProveedore':
            $idProveedor = $_POST['idProveedor'];
            $conexion = new Movimientos();
            $resultado = $conexion->getProveedore($idProveedor);
            echo json_encode($resultado);
        break;

        case 'getInsumo':
            $idInsumos = $_POST['idInsumo'];
            $conexion = new Movimientos();
            $resultado = $conexion->getInsumo($idInsumos);
            echo json_encode($resultado);
        break;

        case 'getResponsable':
            $idResponsable = $_POST['idResponsable'];
            $conexion = new Movimientos();
            $resultado = $conexion->getResponsable($idResponsable);
            echo json_encode($resultado);
        break;
            
        case 'getPlanta':
            $idPlanta = $_POST['idPlanta'];
            $conexion = new Movimientos();
            $resultado = $conexion->getPlanta($idPlanta);
            echo json_encode($resultado);
        break;
        
        case 'insertCompraInsumo':
            $datosCompra= json_decode($_POST['datosCompra']);
            $detalles= json_decode($_POST['detalles']);
            $conexion = New Movimientos();
            $idCompra=$conexion->insertCompraInsumos($datosCompra->FechaOrden,$datosCompra->idProveedor,$datosCompra->factura,$datosCompra->total);
            $conexion->insertDetalleCompra($idCompra,$detalles);
            $conexion->GuardarArchivo($_SERVER['DOCUMENT_ROOT']."/src/PDF/FacturasCompras/",$idCompra,$_FILES);
        break;
        
        default:
            echo "Error";
        break;
        
    }



}