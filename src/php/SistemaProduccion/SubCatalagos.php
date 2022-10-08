<?php 
//Este archivo es para general las consultas que se ocupen consumir con json para el area de catalagos
require_once($_SERVER['DOCUMENT_ROOT']."/src/php/SistemaProduccion/Catalago.php");
if(isset($_POST['Busqueda'])){
    switch ($_POST['Busqueda']) {
        case 'NextProveedor':
            $conexion = new Catalago();
            $resultado = $conexion->getNextIdProveedor();
            echo json_encode($resultado);
            break;
    }
}