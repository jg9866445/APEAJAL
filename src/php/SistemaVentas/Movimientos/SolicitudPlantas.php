<?php 

require_once($_SERVER['DOCUMENT_ROOT']."/src/php/connectividad.php");
            $db = new DB_Connect();
            $connect=$db->connect();


if(isset($_POST['Busqueda'])){
    switch ($_POST['Busqueda']) {
        case 'DatosCliente':
            $idCliente = $_POST['idCliente'];
            $sql="Select * from clientes as c WHERE c.idCliente = :idCliente ;";
            $query = $connect->prepare($sql);
            $query->bindParam(":idCliente",$idCliente);
            $query -> execute(); 
            $results = $query -> fetchAll(); 
            echo json_encode($results);
            return null;
        break;
        case 'Predio':
            $idCliente = $_POST['idCliente'];
            $sql="Select * FROM predios as p where p.idCliente = :idCliente ;";
            $query = $connect->prepare($sql);
            $query->bindParam(":idCliente",$idCliente);
            $query -> execute(); 
            $results = $query -> fetchAll(); 
            foreach ($results as $key => $value) {
                echo '<option value="'.$value["idPredio"].'">'.$value["municipio"].'</option>';
            }
            return null;
        break;
        case 'DatosPredio':
            $idPredio = $_POST['idPredio'];
            $sql="Select * FROM predios as p where p.idPredio = :idPredio ;";
            $query = $connect->prepare($sql);
            $query->bindParam(":idPredio",$idPredio);
            $query -> execute(); 
            $results = $query -> fetchAll(); 
            echo json_encode($results);
            return null;
        break;
        case 'DatosPlantas':
            $idPlanta = $_POST['idPlanta'];
            $sql="SELECT e.nombre,pf.descripcion from plantaForestal as pf INNER JOIN especie as e on e.idEspecie = pf.idEspecie WHERE pf.idPlanta = :idPlanta;";
            $query = $connect->prepare($sql);
            $query->bindParam(":idPlanta",$idPlanta);
            $query -> execute(); 
            $results = $query -> fetchAll(); 
            echo json_encode($results);
            return null;
        break;
    }
}