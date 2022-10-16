<?php 

require_once($_SERVER['DOCUMENT_ROOT']."/src/php/SistemaProduccion/Movimientos.php");

//getProveedores
if(isset($_POST['Metodo'])){
    switch ($_POST['Metodo']) {
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
            var_dump( $_FILES);
            echo "<br />";
            var_dump($_POST); 
            var_dump(json_decode($_POST["detalles"]));
            
            //$idPlanta = $_POST['idPlanta'];
            //$conexion = new Movimientos();
            //$resultado = $conexion->getPlanta($idPlanta);
            //echo json_encode($resultado);
        break;
        
        default:
            echo "Error";
        break;
        
    }
}