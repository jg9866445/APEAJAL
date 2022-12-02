<?php 
require_once($_SERVER['DOCUMENT_ROOT']."/src/php/SistemaVentas/Movimiento.php");
require_once($_SERVER['DOCUMENT_ROOT']."/src/php/auxiliar/log.php");

    
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
                    
                    case 'getNextidPredio':
                        $conexion = new Movimientos();
                        $resultado = $conexion->getNextidPredio();
                        echo json_encode($resultado);
                    break;

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

                    case 'getNextidSalida':
                        $conexion = new Movimientos();
                        $resultado = $conexion->getNextidSalida();
                        echo json_encode($resultado);
                    break;

                    case 'getNextidMerma':
                        $conexion = new Movimientos();
                        $resultado = $conexion->getNextidMerma();
                        echo json_encode($resultado);
                    break;

                    //Get for tablas
                    case 'getAllPrediosforTabla':
                        $conexion= new Movimientos();
                        $resultado= $conexion->getAllPrediosforTabla();
                        echo json_encode($resultado);
                    break;

                    case 'getAllSolicitudPlantasforTabla':
                        $conexion= new Movimientos();
                        $resultado= $conexion->getAllSolicitudPlantasforTabla();
                        echo json_encode($resultado);
                    break;  

                    case 'getAllVentasforTabla':
                        $conexion= new Movimientos();
                        $resultado= $conexion->getAllVentasforTabla();
                        echo json_encode($resultado);
                    break;
                    
                    case 'getAllPagosforTabla':
                        $conexion= new Movimientos();
                        $resultado= $conexion->getAllPagosforTabla();
                        echo json_encode($resultado);
                    break;

                    case 'getAllSalidasForTabla':
                        $conexion= new Movimientos();
                        $resultado= $conexion->getAllSalidasForTabla();
                        echo json_encode($resultado);
                    break;
                    
                    case 'getAllMermasForTabla':
                        $conexion= new Movimientos();
                        $resultado= $conexion->getAllMermasForTabla();
                        echo json_encode($resultado);
                    break;  

                    //get for selected
                    case 'getAllResponsableSelect':
                        $conexion=new Movimientos();
                        $resultado=$conexion->getAllResponsableSelect();
                        echo json_encode($resultado);
                    break;
                    
                    case 'getAllPrediosforSelect':
                        $idCliente = $_POST['idCliente'];
                        $conexion = new Movimientos();                        
                        $resultado = $conexion->getAllPrediosforSelect($idCliente);
                        echo json_encode($resultado);
                    break;
                    
                    case 'getAllPlantasfolestalesSelect':
                        $conexion=new Movimientos();
                        $resultado=$conexion->getAllPlantasfolestalesSelect();
                        echo json_encode($resultado);
                    break;
    
                    case 'getAllSolicitudSelect':
                        $conexion=new Movimientos();
                        $resultado=$conexion->getAllSolicitudSelect();
                        echo json_encode($resultado);
                    break;

                    case 'getAllVentaSelect':
                        $conexion=new Movimientos();
                        $resultado=$conexion->getAllVentaSelect();
                        echo json_encode($resultado);
                    break;

                    case 'getAllPagosSelector':
                        $conexion=new Movimientos();
                        $resultado=$conexion->getAllPagosSelector();
                        echo json_encode($resultado);
                    break;
                    
                    //get Individual 
                    case 'getResponsable':
                        $idResponsable = $_POST['idResponsable'];
                        $conexion = new Movimientos();
                        $resultado = $conexion->getResponsable($idResponsable);
                        echo json_encode($resultado);
                    break;

                    case 'getPredio':
                        $idPredio = $_POST['idPredio'];
                        $conexion = new Movimientos();                        
                        $resultado = $conexion->getAllPredio($idPredio);
                        echo json_encode($resultado);
                    break;
                    
                    case 'getSolicitud':
                        $idSolicitud = $_POST['idSolicitud'];
                        $conexion = new Movimientos();                        
                        $resultado = $conexion->getSolicitudPlantas($idSolicitud);
                        echo json_encode($resultado);
                    break;

                    case 'getDetallesSolicitud':
                        $idSolicitud = $_POST['idSolicitud'];
                        $conexion = new Movimientos();                        
                        $resultado = $conexion->getDetallesSolicitudPlantas($idSolicitud);
                        echo json_encode($resultado);
                    break;
                    
                    case 'getClientes':
                        $dato= $_POST['dato'];
                        $conexion= new Movimientos();
                        $resultado= $conexion->getClientes($dato);
                        echo json_encode($resultado);
                    break;

                    case 'getSolicitudPlantas':
                        $idSolicitud = $_POST['idSolicitud'];
                        $conexion = new Movimientos();                        
                        $resultado = $conexion->getSolicitudPlantas($idSolicitud);
                        echo json_encode($resultado);
                    break;
                    
                    case 'getDetallesSolicitudPlantas':
                        $idSolicitud= $_POST['idSolicitud'];
                        $conexion= new Movimientos();
                        $resultado= $conexion->getDetallesSolicitudPlantas($idSolicitud);
                        echo json_encode($resultado);
                    break;
                    
                    case 'getPlantasForestal':
                        $idPlanta= $_POST['idPlanta'];
                        $conexion= new Movimientos();
                        $resultado= $conexion->getPlantasForestal($idPlanta);
                        echo json_encode($resultado);
                    break;

                    case 'getVentaPlantas':
                        $idVenta= $_POST['idVenta'];
                        $conexion= new Movimientos();
                        $resultado= $conexion->getVentaPlantas($idVenta);
                        echo json_encode($resultado);
                    break;
                    
                    case 'getDetallesVentasPlantas':
                        $idVenta= $_POST['idVenta'];
                        $conexion= new Movimientos();
                        $resultado= $conexion->getDetallesVentasPlantas($idVenta);
                        echo json_encode($resultado);
                    break;

                    case 'getDetallesVentasSalidas':
                        $idVenta= $_POST['idVenta'];
                        $conexion= new Movimientos();
                        $resultado= $conexion->getDetallesVentasSalidas($idVenta);
                        echo json_encode($resultado);
                    break;
                                        
                    case 'getPagoPlantas':
                        $idPago= $_POST['idPago'];
                        $conexion= new Movimientos();
                        $resultado= $conexion->getPagoPlantas($idPago);
                        echo json_encode($resultado);
                    break;
                                        
                    case 'getSalida':
                        $idSalida= $_POST['idSalida'];
                        $conexion= new Movimientos();
                        $resultado= $conexion->getSalida($idSalida);
                        echo json_encode($resultado);
                    break;
                                                
                    case 'getDetalleSalida':
                        $idSalida= $_POST['idSalida'];
                        $conexion= new Movimientos();
                        $resultado= $conexion->getDetalleSalida($idSalida);
                        echo json_encode($resultado);
                    break;
                                              
                    
                    //INSERT 

                    case 'insertPredios':
                        $datosPredio= json_decode($_POST['datosPredio']);
                        $conexion = New Movimientos();
                        $conexion->insertPredios( $datosPredio->idCliente, $datosPredio->municipio, $datosPredio->extencion, $datosPredio->usoPredio, $datosPredio->longitud, $datosPredio->latitud);
                    break;

                    case 'insertSolicitudPlantas':
                        $datosSolicud= json_decode($_POST['datosSolicud']);
                        $detalles= json_decode($_POST['detalles']);
                        $conexion = New Movimientos();
                        $idSolicitud=$conexion->insertSolicitud($datosSolicud->idCliente,$datosSolicud->FechaSolicitud,$datosSolicud->total,$datosSolicud->idResponsable);
                        $conexion->insertDetallesSolicitud($idSolicitud,$detalles);
                    break;

                    case 'cancelarSolicitud':
                        $datosSolicud= json_decode($_POST['datosSolicud']);
                        $conexion = New Movimientos();
                        $conexion->cancelarSolicitud($datosSolicud->idSolicitud);
                    break;       

                    case 'insertVentaPlanta':
                        $datosVenta= json_decode($_POST['datosVenta']);
                        $detalles= json_decode($_POST['detalles']);
                        $conexion = New Movimientos();
                        $idVenta=$conexion->insertVentaPlanta($datosVenta->idSolicitud,$datosVenta->idResponsable,$datosVenta->fechaVenta,$datosVenta->total);
                        $conexion->insertDetallesVenta($idVenta,$detalles);
                    break;

                    case 'insertPagos':
                        $datosPago= json_decode($_POST['datosPago']);
                        $conexion = New Movimientos();
                        $idPago=$conexion->insertPagos($datosPago->idResponsable,$datosPago->idVenta,$datosPago->fecha,$datosPago->conceptoGeneral,$datosPago->importe);
                        $this->GuardarArchivo($_SERVER['DOCUMENT_ROOT']."/src/PDF/ComprobantePago/",$idPago);
                    break;

                    case 'InsertSalida':
                        $datosSalida= json_decode($_POST['datosSalidas']);
                        $detalles= json_decode($_POST['detalles']);
                        $conexion = New Movimientos();
                        $salida=$conexion->insertSalidaPlantas($datosSalida->idPago,$datosSalida->idResponsable,$datosSalida->fechaEntrega);
                        $conexion->insertDetalleSalidas($salida['idSalida'],$detalles);
                        $conexion->insertSalidaEstado($salida['idPago']);
                    break;

                    case 'InsertMermaPlantasForestales':
                        $datosMerma= json_decode($_POST['datosMerma']);
                        $detalles= json_decode($_POST['detalles']);
                        $conexion = New Movimientos();
                        $idMerma=$conexion->InsertMermaPlantasForestales($datosMerma->fecha,$datosMerma->idResponsable);
                        $conexion->InsertDetalleMermaPlantaForestal($idMerma,$detalles);
                    break;

/*









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
                    
                    case 'getVentas':
                        $idVenta = $_POST['idVenta'];
                        $conexion = new Movimientos();
                        $resultado = $conexion->getVentas($idVenta);
                        echo json_encode($resultado);
                    break;
                    
                    case 'getDetallesVentas': 
                        $idVenta = $_POST['idVenta'];
                        $conexion = new Movimientos();
                        $resultado = $conexion->getDetallesVentas($idVenta);
                        echo json_encode($resultado);
                    break;

                                        
                    case 'getDetallesVentasSalidas': 
                        $idVenta = $_POST['idVenta'];
                        $conexion = new Movimientos();
                        $resultado = $conexion->getDetallesVentasSalidas($idVenta);
                        echo json_encode($resultado);
                    break;
                    
                    
                    case 'getAllInsumos':
                        $conexion = New Movimientos();
                        //$resultado = $conexion->getAllInsumos();
                        //echo json_encode($resultado);
                    break;
                    
                    case 'getAllProveedores':
                        $conexion = New Movimientos();
                       // $resultado = $conexion->getAllProveedores();
//echo json_encode($resultado);
                    break;

                    case 'getPagoPlanta':
                        $idPago = $_POST['idPago'];
                        $conexion = new Movimientos();
                        $resultado = $conexion->getPagoPlanta($idPago);
                        echo json_encode($resultado);
                    break;
                    

                    



             


                    */

                    default:
                        echo "Error";
                    break;
                }
            }
        }catch (Exception $e){
                save(var_dump($e));
        }
    }
    function bitacora($idUsuario,$fecha,$archivo,$actividad){
        $idUsuario="USUARIO QUE MODIFICA";
        $fecha="FEcha de alterazion";
        $archivo="Archivo que se modifica";
        $actividad="Actividad que se realiza";

        
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



































