<?php 
require_once($_SERVER['DOCUMENT_ROOT']."/src/php/SistemaVentas/Movimiento.php");
require_once($_SERVER['DOCUMENT_ROOT']."/src/php/log.php");

    
class SubMovimientos
{

    public $conexion;

    function __construct(){        
        try {
            $this->conexion = new Movimientos();

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
                    case 'getNextidSolicitudPlantas':
                        $conexion = new Movimientos();
                        $resultado = $conexion->getNextidSolicitudPlantas();
                        echo json_encode($resultado);
                    break;
                    
                    case 'getNextidVenta':
                        $conexion = new Movimientos();
                        $resultado = $conexion->getNextidVenta();
                        echo json_encode($resultado);
                    break;

                    case 'getNextidPago':
                        $conexion = new Movimientos();
                        $resultado = $conexion->getNextidPago();
                        echo json_encode($resultado);
                    break;

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

                    case 'getPredioForCliente':
                        $idCliente = $_POST['idCliente'];
                        $conexion = new Movimientos();
                        $resultado = $conexion->getPredioForCliente($idCliente);
                        echo json_encode($resultado);
                    break;

                    case 'getPlanta':
                        $idPlanta = $_POST['idPlanta'];
                        $conexion = new Movimientos();
                        $resultado = $conexion->getPlantasForestal($idPlanta);
                        echo json_encode($resultado);
                    break;

                    case 'getSolicitud':
                        $idSolicitud = $_POST['idSolicitud'];
                        $conexion = new Movimientos();
                        $resultado = $conexion->getSolicitud($idSolicitud);
                        echo json_encode($resultado);
                    break;
                    
                    case 'getDetallesSolicitud':
                        $idSolicitud = $_POST['idSolicitud'];
                        $conexion = new Movimientos();
                        $resultado = $conexion->getDetallesSolicitud($idSolicitud);
                        echo json_encode($resultado);
                    break;
                    
                    case 'getAllInsumos':
                        $conexion = New Movimientos();
                        $resultado = $conexion->getAllInsumos();
                        echo json_encode($resultado);
                    break;
                    
                    case 'getAllProveedores':
                        $conexion = New Movimientos();
                        $resultado = $conexion->getAllProveedores();
                        echo json_encode($resultado);
                    break;

                    case 'insertSolicitudPlantas':
                        $datosSolicud= json_decode($_POST['datosSolicud']);
                        $detalles= json_decode($_POST['detalles']);
                        $conexion = New Movimientos();
                        $idSolicitud=$conexion->insertSolicitud($datosSolicud->idCliente,$datosSolicud->FechaSolicitud,$datosSolicud->total,$datosSolicud->idResponsable);
                        $conexion->insertDetallesSolicitud($idSolicitud,$detalles);
                    break;
                    
                    case 'insertVentaPlanta':
                        $datosVenta= json_decode($_POST['datosVenta']);
                        $detalles= json_decode($_POST['detalles']);
                        $conexion = New Movimientos();
                        $idVenta=$conexion->insertVentaPlanta($datosVenta->idSolicitud,$datosVenta->idResponsable,$datosVenta->fechaVenta,$datosVenta->total);
                        $conexion->insertDetallesVenta($idVenta,$detalles);
                    break;



                    ///AQUI TODAVIA NO

                    case 'getPagoPlanta':
                        $idPago = $_POST['idPago'];
                        $conexion = new Movimientos();
                        $resultado = $conexion->getPagoPlanta($idPago);
                        echo json_encode($resultado);
                    break;




                    
                    case 'insertPagos':
                        $datosPago= json_decode($_POST['datosPago']);
                        $conexion = New Movimientos();
                        $idPago=$conexion->insertVentaPlanta($datosPago->idResponsable,$datosPago->idVenta,$datosPago->fecha,$datosPago->conceptoGeneral,$datosPago->importe);
                        $this->GuardarArchivo($_SERVER['DOCUMENT_ROOT']."/src/PDF/FacturasCompras/",$idPago);
                    break;

                    case 'cancelarSolicitud':
                        $DatoSolicitud= json_decode($_POST['DatoSolicitud']);
                        $conexion = New Movimientos();
                        $conexion->cancelarSolicitud($DatoSolicitud->idSolicitud);
                    break;                    


                    

                    default:
                        echo "Error";
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
                            save("SubMovimientos","GuardarArchivo","Archivo no movido");
                        }
                }else{
                        save("SubMovimientos","GuardarArchivo","Archivo no es pdf");

                }
            }else{
                    save("SubMovimientos","GuardarArchivo","Archivo no encotrado");
            }
    }
}

new SubMovimientos();



































