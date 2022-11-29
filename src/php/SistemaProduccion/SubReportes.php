<?php 

require_once($_SERVER['DOCUMENT_ROOT']."/src/php/log.php");
require_once($_SERVER['DOCUMENT_ROOT']."/src/php/SistemaProduccion/Reportes.php");
require_once($_SERVER['DOCUMENT_ROOT']."/src/php/PDF.php");
class SubReportes
{

    public $conexion;

    function __construct(){        
        try {
            $this->conexion = new Reportes();

            $this->API();
        } 
        catch (PDOException $e) {
            print "¡Error!: " . $e->getMessage() . "<br/>";
            die();
        }
    }

    function API(){
        try{
            if(isset($_GET['metodo'])){
                
                switch ($_GET['metodo']) {
                    case 'RCompraInumos':
                        if($_GET['tipo']=='PDF'){                        
                            $pdf = new PDF('L','mm','A4');
                            $pdf->setTitulos("Compra de insumos","Desde:".$_GET['FI']." A ".$_GET['FF']);
                            $pdf->AddPage();
                            $pdf->SetFont('Arial','',10);
                            $ventas=$this->conexion->RCompraInumos($_GET['FI'],$_GET['FF']);
                            $pdf->ln(5);
                            if(count($ventas)!=0){ 
                                $pdf->Ln();
                                $pdf->SetLineWidth(0);
                                $pdf->Cell(70,7,"Nombre de Proveedor",1,0,'C');
                                $pdf->Cell(25,7,"factura",1,0);
                                $pdf->Cell(25,7,"fecha",1,0);
                                $pdf->Cell(25,7,"Clasificacion",1,0);
                                $pdf->Cell(25,7,"Nombre",1,0);
                                $pdf->Cell(25,7,"unidad",1,0);
                                $pdf->Cell(25,7,"cantidad",1,0);
                                $pdf->Cell(25,7,"costo",1,0);
                                $pdf->Cell(25,7,"importe",1,0);
                                $pdf->Ln();
                                foreach( $ventas as $row){  
                                    $pdf->Cell(70,7,$row[0],1,0,'C');
                                    $pdf->Cell(25,7,$row[1],1,0);
                                    $pdf->Cell(25,7,$row[2],1,0);
                                    $pdf->Cell(25,7,$row[3],1,0);
                                    $pdf->Cell(25,7,$row[4],1,0);
                                    $pdf->Cell(25,7,$row[5],1,0);
                                    $pdf->Cell(25,7,$row[6],1,0);
                                    $pdf->Cell(25,7,$row[7],1,0);
                                    $pdf->Cell(25,7,$row[8],1,0);
                                    $pdf->Ln();
                                    }
                                }else{
                                    $pdf->Ln(25);
                                    $pdf->Cell(100,6,"No existen compras",0,0);
                                }
                                $pdf->Ln(20);
                                $pdf->Output();
                        }else{
                            header("Pragma: public");
                            header("Expires: 0");
                            $filename = "nombreArchivoQueDescarga.xls";
                            header("Content-type: application/x-msdownload");
                            header("Content-Disposition: attachment; filename=$filename");
                            header("Pragma: no-cache");
                            header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
                            echo
                                "<table border='1'>
                                <tr>
                                    <th>Codigo</th>
                                    <th>Nombres</th>
                                    <th>Apellidos</th>
                                    <th>Telefono</th>
                                    <th>Ciudad</th>
                                </tr>
                                <tr>
                                    <td>00043</td>
                                    <td>Juan</td>
                                    <td>Pepe</td>
                                    <td>1544552115</td>
                                    <td>Caracas</td>
                                </tr>   
                                </table>";
                        }
                    break;                    
                    case 'RCompraInumos':
                        $pdf = new PDF('L','mm','A4');
                        $pdf->setTitulos("Compra de insumos","Desde:".$_GET['FI']." A ".$_GET['FF']);
                        $pdf->AddPage();
                        $pdf->SetFont('Arial','',10);
                        $ventas=$this->conexion->RCompraInumos($_GET['FI'],$_GET['FF']);
                        $pdf->ln(5);
                        if(count($ventas)!=0){ 
                            $pdf->Ln();
                            $pdf->SetLineWidth(0);
                            $pdf->Cell(70,7,"Nombre de Proveedor",1,0,'C');
                            $pdf->Cell(25,7,"factura",1,0);
                            $pdf->Cell(25,7,"fecha",1,0);
                            $pdf->Cell(25,7,"Clasificacion",1,0);
                            $pdf->Cell(25,7,"Nombre",1,0);
                            $pdf->Cell(25,7,"unidad",1,0);
                            $pdf->Cell(25,7,"cantidad",1,0);
                            $pdf->Cell(25,7,"costo",1,0);
                            $pdf->Cell(25,7,"importe",1,0);
                            $pdf->Ln();
                            foreach( $ventas as $row){  
                                $pdf->Cell(70,7,$row[0],1,0,'C');
                                $pdf->Cell(25,7,$row[1],1,0);
                                $pdf->Cell(25,7,$row[2],1,0);
                                $pdf->Cell(25,7,$row[3],1,0);
                                $pdf->Cell(25,7,$row[4],1,0);
                                $pdf->Cell(25,7,$row[5],1,0);
                                $pdf->Cell(25,7,$row[6],1,0);
                                $pdf->Cell(25,7,$row[7],1,0);
                                $pdf->Cell(25,7,$row[8],1,0);
                                $pdf->Ln();
                                }
                            }else{
                                $pdf->Ln(25);
                                $pdf->Cell(100,6,"No existen compras",0,0);
                            }
                            $pdf->Ln(20);
                            $pdf->Output();
                    break;

                    case 'RCompraInumosProveedor':
                        $pdf = new PDF('L','mm','A4');
                        $pdf->setTitulos("Compra de insumos por proveedor","Desde:".$_GET['FI']." A ".$_GET['FF']);
                        $pdf->AddPage();
                        $pdf->SetFont('Arial','',10);
                        $Resultado=$this->conexion->RCompraInumosProveedor($_GET['id'],$_GET['FI'],$_GET['FF']);
                        $proveedor=$Resultado["Proveedor"][0];
                        $datos=$Resultado["detalles"];
                        $pdf->ln(10);
                        $pdf->Cell(0,0,"Nombre del proveedor: ".$proveedor['nombre']."      "."Domicilio: ".$proveedor['domicilio']." ".$proveedor['ciudad']."        Telefono: ".$proveedor['telefono']."     email: ".$proveedor["email"]);
                        $pdf->ln(5);
                        if(count($datos)!=0){ 
                            $pdf->Ln();
                            $pdf->SetLineWidth(0);
                            $pdf->Cell(35,7,"Factura",1,0);
                            $pdf->Cell(35,7,"Cecha",1,0);
                            $pdf->Cell(35,7,"Clasificacion",1,0);
                            $pdf->Cell(35,7,"Nombre",1,0);
                            $pdf->Cell(35,7,"Unidad",1,0);
                            $pdf->Cell(35,7,"Cantidad",1,0);
                            $pdf->Cell(35,7,"Costo",1,0);
                            $pdf->Cell(35,7,"Importe",1,0);
                            $pdf->Ln();
                            foreach( $datos as $row){  
                                $pdf->Cell(35,7,$row[0],1,0);
                                $pdf->Cell(35,7,$row[1],1,0);
                                $pdf->Cell(35,7,$row[2],1,0);
                                $pdf->Cell(35,7,$row[3],1,0);
                                $pdf->Cell(35,7,$row[4],1,0);
                                $pdf->Cell(35,7,$row[5],1,0);
                                $pdf->Cell(35,7,$row[6],1,0);
                                $pdf->Cell(35,7,$row[7],1,0);
                                $pdf->Ln();
                                }
                            }else{
                                $pdf->Ln(25);
                                $pdf->Cell(100,6,"No existen compras",0,0);
                            }
                            $pdf->Ln(20);
                            $pdf->Output();
                    break;

                    case 'RCompraClasificacion':
                        $pdf = new PDF('L','mm','A4');
                        $pdf->setTitulos("Compra de insumos por proveedor","Desde:".$_GET['FI']." A ".$_GET['FF']);
                        $pdf->AddPage();
                        $pdf->SetFont('Arial','',10);
                        $Resultado=$this->conexion->RCompraClasificacion($_GET['id'],$_GET['FI'],$_GET['FF']);
                        $Clasificacion=$Resultado["Clasificacion"][0];
                        $datos=$Resultado["detalles"];
                        $pdf->ln(10);
                        $pdf->Cell(0,0,"Nombre del Clasificacion: ".$Clasificacion['concepto']."      "."Descripcion: ".$Clasificacion['descripcion']);
                        $pdf->ln(5);
                        if(count($datos)!=0){ 
                            $pdf->Ln();
                            $pdf->SetLineWidth(0);
                            $pdf->Cell(60,7,"idProveedor",1,0);
                            $pdf->Cell(30,7,"Factura",1,0);
                            $pdf->Cell(30,7,"Cecha",1,0);
                            $pdf->Cell(30,7,"Nombre",1,0);
                            $pdf->Cell(30,7,"Unidad",1,0);
                            $pdf->Cell(30,7,"Cantidad",1,0);
                            $pdf->Cell(30,7,"Costo",1,0);
                            $pdf->Cell(30,7,"Importe",1,0);
                            $pdf->Ln();
                            foreach( $datos as $row){  
                                $pdf->Cell(60,7,$row[0],1,0);
                                $pdf->Cell(30,7,$row[1],1,0);
                                $pdf->Cell(30,7,$row[2],1,0);
                                $pdf->Cell(30,7,$row[3],1,0);
                                $pdf->Cell(30,7,$row[4],1,0);
                                $pdf->Cell(30,7,$row[5],1,0);
                                $pdf->Cell(30,7,$row[6],1,0);
                                $pdf->Cell(30,7,$row[7],1,0);
                                $pdf->Ln();
                                }
                            }else{
                                $pdf->Ln(25);
                                $pdf->Cell(100,6,"No existen compras",0,0);
                            }
                            $pdf->Ln(20);
                            $pdf->Output();
                    break;
                    
                    case 'RInusmosClasificacion':
                        $pdf = new PDF('L','mm','A4');
                        $pdf->setTitulos("Compra de insumos por proveedor","");
                        $pdf->AddPage();
                        $pdf->SetFont('Arial','',10);
                        $Resultado=$this->conexion->RInusmosClasificacion($_GET['id']);
                        $Clasificacion=$Resultado["Clasificacion"][0];
                        $datos=$Resultado["detalles"];
                        $pdf->ln(10);
                        $pdf->Cell(0,0,"Nombre del Clasificacion: ".$Clasificacion['concepto']."      "."Descripcion: ".$Clasificacion['descripcion']);
                        $pdf->ln(5);
                        if(count($datos)!=0){ 
                            $pdf->Ln();
                            $pdf->SetLineWidth(0);
                            $pdf->Cell(30,7,"nombre",1,0);
                            $pdf->Cell(90,7,"descripcion",1,0);
                            $pdf->Cell(30,7,"unidad",1,0);
                            $pdf->Cell(30,7,"existencias",1,0);
                            $pdf->Cell(30,7,"maximo",1,0);
                            $pdf->Cell(30,7,"minimo",1,0);
                            $pdf->Cell(30,7,"costo promedio",1,0);
                            $pdf->Ln();
                            foreach( $datos as $row){  
                                $pdf->Cell(30,7,$row['nombre'],1,0);
                                $pdf->Cell(90,7,$row["descripcion"],1,0);
                                $pdf->Cell(30,7,$row["unidad"],1,0);
                                $pdf->Cell(30,7,$row["existencias"],1,0);
                                $pdf->Cell(30,7,$row["maximo"],1,0);
                                $pdf->Cell(30,7,$row["minimo"],1,0);
                                $pdf->Cell(30,7,$row["costoPromedio"],1,0);
                                $pdf->Ln();
                                }
                            }else{
                                $pdf->Ln(25);
                                $pdf->Cell(100,6,"No existen compras",0,0);
                            }
                            $pdf->Ln(20);
                            $pdf->Output();
                    break;
                    
                    case 'RInusmosClasificacion':
                        $pdf = new PDF('L','mm','A4');
                        $pdf->setTitulos("Compra de insumos por proveedor","");
                        $pdf->AddPage();
                        $pdf->SetFont('Arial','',10);
                        $Resultado=$this->conexion->RInusmosClasificacion($_GET['id']);
                        $Clasificacion=$Resultado["Clasificacion"][0];
                        $datos=$Resultado["detalles"];
                        $pdf->ln(10);
                        $pdf->Cell(0,0,"Nombre del Clasificacion: ".$Clasificacion['concepto']."      "."Descripcion: ".$Clasificacion['descripcion']);
                        $pdf->ln(5);
                        if(count($datos)!=0){ 
                            $pdf->Ln();
                            $pdf->SetLineWidth(0);
                            $pdf->Cell(30,7,"nombre",1,0);
                            $pdf->Cell(90,7,"descripcion",1,0);
                            $pdf->Cell(30,7,"unidad",1,0);
                            $pdf->Cell(30,7,"existencias",1,0);
                            $pdf->Cell(30,7,"maximo",1,0);
                            $pdf->Cell(30,7,"minimo",1,0);
                            $pdf->Cell(30,7,"costo promedio",1,0);
                            $pdf->Ln();
                            foreach( $datos as $row){  
                                $pdf->Cell(30,7,$row['nombre'],1,0);
                                $pdf->Cell(90,7,$row["descripcion"],1,0);
                                $pdf->Cell(30,7,$row["unidad"],1,0);
                                $pdf->Cell(30,7,$row["existencias"],1,0);
                                $pdf->Cell(30,7,$row["maximo"],1,0);
                                $pdf->Cell(30,7,$row["minimo"],1,0);
                                $pdf->Cell(30,7,$row["costoPromedio"],1,0);
                                $pdf->Ln();
                                }
                            }else{
                                $pdf->Ln(25);
                                $pdf->Cell(100,6,"No existen compras",0,0);
                            }
                            $pdf->Ln(20);
                            $pdf->Output();
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

}

new SubReportes();




