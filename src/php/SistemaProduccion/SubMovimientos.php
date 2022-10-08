<?php 

require_once($_SERVER['DOCUMENT_ROOT']."/src/php/SistemaProduccion/Movimientos.php");

//getProveedores
if(isset($_POST['Busqueda'])){
    switch ($_POST['Busqueda']) {
        case 'CompraInsumosDatosProveedores':
            $idProveedor = $_POST['idProveedor'];
            $conexion = new Movimientos();
            $resultado = $conexion->getProveedores($idProveedor);
            echo json_encode($resultado);
            break;
        case 'CompraInsumosDatosInsumos':
            $idInsumos = $_POST['idInsumo'];
            $conexion = new Movimientos();
            $resultado = $conexion->getInsumos($idInsumos);
            echo json_encode($resultado);
            break;
    }
}