<?php
require_once($_SERVER['DOCUMENT_ROOT']."/src/php/SistemaProduccion/Funciones.php");

$conexion = new Funciones();


switch ($_POST['categoria']){
    case 'Clasificacion':
        $concepto = $_POST['NombreClasificacion'];
        $descripcion = $_POST['DescripcionClasificacion'];
        $resultado = $conexion->insertClasificacion($concepto, $descripcion);

        if ($resultado == true) {
            header("Location: ". $_SERVER['DOCUMENT_ROOT'] . "/SistemaProduccion/Categorias/Clasificacion.php", false, 201);
            die();
        }
    break;
}

?>