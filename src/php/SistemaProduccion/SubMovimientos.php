<?php 

require_once($_SERVER['DOCUMENT_ROOT']."/src/php/SistemaProduccion/Movimientos.php");
    
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
        if(isset($_POST['Metodo'])){
            switch ($_POST['Metodo']) {
                case 'getNextIdCompra':
                    $conexion = new Movimientos();
                    $resultado = $conexion->getNextIdCompra();
                    echo json_encode($resultado);
                break;
        
                case 'getNextidSalida':
                    $conexion = new Movimientos();
                    $resultado = $conexion->getNextidSalida();
                    echo json_encode($resultado);
                break;

                case 'getNextidOrdenProduccion':
                    $conexion = new Movimientos();
                    $resultado = $conexion->getNextidOrdenProduccion();
                    echo json_encode($resultado);
                break;

                case 'getNextidDevolucion':
                    $conexion = new Movimientos();
                    $resultado = $conexion->getNextidDevolucion();
                    echo json_encode($resultado);
                break;

                case 'getAllProveedores':
                    $conexion = new Movimientos();
                    $resultado = $conexion->getAllProveedores();
                    echo json_encode($resultado);
                break;

                case 'getAllInsumos':
                    $conexion = new Movimientos();
                    $resultado = $conexion->getAllInsumos();
                    echo json_encode($resultado);
                break;

                case 'getAllResponsables':
                    $conexion = new Movimientos();
                    $resultado = $conexion->getAllResponsables();
                    echo json_encode($resultado);
                break;

                case 'getAllPlanta':
                    $conexion = new Movimientos();
                    $resultado = $conexion->getAllPlanta();
                    echo json_encode($resultado);
                break;

                case 'getAllSalidas':
                    $conexion = new Movimientos();
                    $resultado = $conexion->getAllSalidas();
                    echo json_encode($resultado);
                break;

                case 'getAllComprasInsumos':
                    $conexion = new Movimientos();
                    $resultado = $conexion->getAllComprasInsumos();
                    echo json_encode($resultado);
                break;

                case 'getAllOrdenProduccion':
                    $conexion = new Movimientos();
                    $resultado = $conexion->getAllOrdenProduccion();
                    echo json_encode($resultado);
                break;

                case 'getAllValeSalida':
                    $conexion = new Movimientos();
                    $resultado = $conexion->getAllValeSalida();
                    echo json_encode($resultado);
                break;

                case 'getAllDevoluciones':
                    $conexion = new Movimientos();
                    $resultado = $conexion->getAllDevoluciones();
                    echo json_encode($resultado);
                break;


                case 'getProveedore':
                    $idProveedor = $_POST['idProveedor'];
                    $conexion = new Movimientos();
                    $resultado = $conexion->getProveedore($idProveedor);
                    echo json_encode($resultado);
                break;

                case 'getInsumo':
                    $idInsumo = $_POST['idInsumo'];
                    $conexion = new Movimientos();
                    $resultado = $conexion->getInsumo($idInsumo);
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

                case 'getValeSalida':
                    $idVale = $_POST['idVale'];
                    $conexion = new Movimientos();
                    $resultado = $conexion->getValeSalida($idVale);
                    echo json_encode($resultado);
                break;

                case 'insertCompraInsumos':
                    $datosCompra= json_decode($_POST['datosCompra']);
                    $detalles= json_decode($_POST['detalles']);
                    $conexion = New Movimientos();
                    $idCompra=$conexion->insertCompraInsumos($datosCompra->FechaOrden,$datosCompra->idProveedor,$datosCompra->factura,$datosCompra->total);
                    $conexion->insertDetalleCompra($idCompra,$detalles);
                    $this->GuardarArchivo($_SERVER['DOCUMENT_ROOT']."/src/PDF/FacturasCompras/",$idCompra);
                break;

                case 'insertOrdenProduccion':
                    $datosOrdenProduccion= json_decode($_POST['datosOrdenProduccion']);
                    $conexion = New Movimientos();
                    $idCompra=$conexion->insertOrdenProduccion($datosOrdenProduccion->idOrden,$datosOrdenProduccion->idResponsable,$datosOrdenProduccion->idPlanta,$datosOrdenProduccion->fechaOrden,$datosOrdenProduccion->fechaAproxTermino,$datosOrdenProduccion->descripcion,$datosOrdenProduccion->cantidadEsperada,$datosOrdenProduccion->estado);
                break;

                case 'InsertValeSalida':
                    $datosValesSalidas= json_decode($_POST['datosValesSalidas']);
                    $conexion = New Movimientos();
                    $idCompra=$conexion->InsertValeSalida($datosValesSalidas->idVale,$datosValesSalidas->idInsumo,$datosValesSalidas->idResponsable,$datosValesSalidas->fecha,$datosValesSalidas->cantidad);
                break;
                case 'insertDevolucion':
                    $datosDevoluciones= json_decode($_POST['datosDevoluciones']);
                    $conexion = New Movimientos();
                    $idCompra=$conexion->insertDevolucion($datosDevoluciones->idDevolucion,$datosDevoluciones->idVale,$datosDevoluciones->idInsumo,$datosDevoluciones->fecha,$datosDevoluciones->cantidad);
                break;

                default:
                    echo "Metodo No encontrado";
                break;
        
            }
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
                            echo("Error : archivos no movido");
                        }
                }else{
                    echo("Error : archivos no es pdf");
                }
            }else{
                echo("Error : archivos no encotrados");
            }
    }
}

new SubMovimientos();




