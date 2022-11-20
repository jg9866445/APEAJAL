<?php 
require_once($_SERVER['DOCUMENT_ROOT']."/src/php/SistemaProduccion/Catalago.php");

class SubCatalagos
{

    public $conexion;

    function __construct(){        
        try {
            $this->conexion = new Catalago();

            $this->API();
        } 
        catch (PDOException $e) {
            print "¡Error!: " . $e->getMessage() . "<br/>";
            die();
        }
    }

    function API(){
        if(isset($_POST['Metodo'])){
            switch ($_POST['Metodo']) {

                case 'getAllClasificacionesForTable':
                    $resultado= $this->conexion->getAllClasificacionesForTable();
                    echo json_encode($resultado);
                break;

                case 'getAllClasificaciones':
                //    $resultado = $this->conexion->getAllClasificaciones();
                //   echo json_encode($resultado);
                break;

                case 'InsertarCalsificacion':
                    $data= json_decode($_POST['data']);
                    var_dump($data);
                    $resultado = $this->conexion->insertClasificacion($data->NombreClasificacion,$data->DescripcionClasificacion);
                    echo json_encode($resultado);
                break;
            }




        }
    }
}

new SubCatalagos();
