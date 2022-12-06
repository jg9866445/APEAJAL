<?php 

require_once($_SERVER['DOCUMENT_ROOT']."/src/php/auxiliar/log.php");
require_once($_SERVER['DOCUMENT_ROOT']."/src/php/SistemaClientes/SistemaClientes.php");
    
class SubSistemaClientes
{

    public $conexion;

    function __construct(){        
        try {
            $this->conexion = new SistemaClientes();

            $this->API();
        } 
        catch (PDOException $e) {
            print "¡Error!: " . $e->getMessage() . "<br/>";
            die();
        }
    }

    function API(){
        try{
            if(isset($_POST['Metodo'])){
                
                switch ($_POST['Metodo']) {

                    //GET NEXT ID
                    case 'ISlogin':
                        $conexion = new SistemaClientes();
                        $resultado = $conexion->ISlogin($_POST['dato']);
                        echo json_encode($resultado);
                    break;

                     case 'insertClientes':
                        $conexion = new SistemaClientes();
                        $datosClientes= json_decode($_POST['datosClientes']);
                        $idCliente=$conexion->insertClientes($datosClientes->RazonSocial,$datosClientes->RFC,$datosClientes->CURP,$datosClientes->domicilio,$datosClientes->Ciudad,$datosClientes->Estado,$datosClientes->email,$datosClientes->Telefono, $datosClientes->Celular, "Venta");
                        $this->GuardarArchivo($_SERVER['DOCUMENT_ROOT']."/src/PDF/ConstanciaFiscal/",$idCliente);

                    break;

                    case 'getAllPrediosforTabla':
                        $conexion= new SistemaClientes();
                        $resultado= $conexion->getAllPrediosforTabla($_POST['datosClientes']);
                        echo json_encode($resultado);
                    break;
                    
                    case 'getAllSolicitudPlantasforTabla':
                        $conexion= new SistemaClientes();
                        $resultado= $conexion->getAllSolicitudPlantasforTabla($_POST['datosClientes']);
                        echo json_encode($resultado);
                    break;

                    default:
                        echo "Metodo No encontrado";
                    break;
            
                }
            }
        }catch (Exception $e){
                save($e);
        }
    }
    function GuardarArchivo($ubicacion,$nombre){
        $nombre=$nombre.".pdf";
        $carpetaDestino=$ubicacion;
        if(isset($_FILES["file"]))
            {
                if($_FILES["file"]["type"]=="application/pdf")
                {
                    if(!file_exists($carpetaDestino)){
                        mkdir($carpetaDestino, 0777);
                    }
                    $origen=$_FILES["file"]["tmp_name"];
                    $destino=$carpetaDestino.$nombre;
                    if(move_uploaded_file($origen, $destino))
                    {
                    }else{
                            save("Archivo no movido");
                        }
                }else{
                        save("Archivo no es pdf");

                }
            }else{
                    save("Archivo no encotrado");
            }
    }
}
new SubSistemaClientes();
