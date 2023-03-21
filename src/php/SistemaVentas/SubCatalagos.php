<?php 
require_once($_SERVER['DOCUMENT_ROOT']."/src/php/auxiliar/log.php");
require_once($_SERVER['DOCUMENT_ROOT']."/src/php/SistemaVentas/Catalago.php");
    
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
        try{
            if(isset($_POST['Busqueda'])){
                switch ($_POST['Busqueda']) {
                    case 'NextCliente':
                        $conexion = new Catalago();
                        $resultado = $conexion->getNextIdCliente();
                        echo json_encode($resultado);
                    break;
                    
                    case 'insertClientes':
                        $conexion = new Catalago();
                        $datosClientes= json_decode($_POST['datosClientes']);
                        $idCliente=$conexion->insertClientes($datosClientes->RazonSocial,$datosClientes->RFC,$datosClientes->CURP,$datosClientes->domicilio,$datosClientes->Ciudad,$datosClientes->Estado,$datosClientes->email,$datosClientes->Telefono, $datosClientes->Celular, "Venta");
                        $this->GuardarArchivo($_SERVER['DOCUMENT_ROOT']."/src/PDF/ConstanciaFiscal/",$idCliente);

                    break;
                }
            }
        }catch (Exception $e){
                save(var_dump($e));
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
                        }
                }else{
                }
            }else{
            }
    }
}

    new SubCatalagos();