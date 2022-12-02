<?php 

require_once($_SERVER['DOCUMENT_ROOT']."/src/php/log.php");
require_once($_SERVER['DOCUMENT_ROOT']."/src/php/SistemaProduccion/Reportes.php");
require_once($_SERVER['DOCUMENT_ROOT']."/src/php/PDF.php");
require_once($_SERVER['DOCUMENT_ROOT']."/src/Lib/PHP_XLSXWriter/xlsxwriter.class.php");

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
                            $pdf->SetFont('Arial','',7);
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
                                    $pdf->Ln();
                                    $pdf->Cell(100,6,"No existen compras para estas fechas",0,0);
                                }
                                $pdf->Ln(20);
                                $pdf->Output();
                        }else{
                                $fileName = basename('fichero.xlsx');

                                header('Content-disposition: attachment; filename="'.XLSXWriter::sanitize_filename($fileName).'"');
                                header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
                                header('Content-Transfer-Encoding: binary');
                                header('Cache-Control: must-revalidate');
                                header('Pragma: public');   
                                $writer = new XLSXWriter();
                                $writer->writeSheetRow('Sheet1', array("Compra de insumos"));
                                $writer->writeSheetRow('Sheet1', array("Desde:",$_GET['FI'], " A: ",$_GET['FF']) );
                                $writer->writeSheetRow('Sheet1', array("Nombre de Proveedor","factura","fecha","Clasificacion","Nombre","unidad","cantidad","costo","importe"));
                                $ventas=$this->conexion->RCompraInumos($_GET['FI'],$_GET['FF']);
                                foreach( $ventas as $row){ 
                                    $writer->writeSheetRow('Sheet1', array( $row[0],$row[1],$row[2],$row[3],$row[4],$row[5],$row[6],$row[7],$row[8]));
                                }
                                $writer->writeToStdOut();
                        }
                    break;                    

                    case 'RCompraInumosProveedor':
                        if($_GET['tipo']=='PDF'){
                            $pdf = new PDF('L','mm','A4');
                            $pdf->setTitulos("Compra de insumos por proveedor","Desde:".$_GET['FI']." A ".$_GET['FF']);
                            $pdf->AddPage();
                            $pdf->SetFont('Arial','',7);
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
                                $pdf->Cell(35,7,"Fecha",1,0);
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
                                    $pdf->Ln();
                                    $pdf->Cell(100,6,"No existen compras para estas fechas y este proveedor",0,0);
                                }
                                $pdf->Ln(20);
                                $pdf->Output();
                            }else{
                                    $fileName = basename('fichero.xlsx');

                                    header('Content-disposition: attachment; filename="'.XLSXWriter::sanitize_filename($fileName).'"');
                                    header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
                                    header('Content-Transfer-Encoding: binary');
                                    header('Cache-Control: must-revalidate');
                                    header('Pragma: public');   
                                    $writer = new XLSXWriter();
                                    $writer->writeSheetRow('Sheet1', array("Compra de insumos por proveedor"));
                                    $writer->writeSheetRow('Sheet1', array("Desde:",$_GET['FI'], " A: ",$_GET['FF']) );
                                    $Resultado=$this->conexion->RCompraInumosProveedor($_GET['id'],$_GET['FI'],$_GET['FF']);
                                    $proveedor=$Resultado["Proveedor"][0];
                                    $ventas=$Resultado["detalles"];
                                    $writer->writeSheetRow('Sheet1', array("Nombre del proveedor: ",$proveedor['nombre'],"Domicilio:",$proveedor['domicilio']." ".$proveedor['ciudad'],"Telefono: ",$proveedor['telefono'],"Email: ",$proveedor["email"]));
                                    $writer->writeSheetRow('Sheet1', array("factura","fecha","Clasificacion","Nombre","unidad","cantidad","costo","importe"));
                                    foreach( $ventas as $row){ 
                                        $writer->writeSheetRow('Sheet1', array( $row[0],$row[1],$row[2],$row[3],$row[4],$row[5],$row[6],$row[7]));
                                    }
                                    $writer->writeToStdOut();
                            }
                    break;

                    case 'RCompraClasificacion':
                        if($_GET['tipo']=='PDF'){
                            $pdf = new PDF('L','mm','A4');
                            $pdf->setTitulos("Compra de insumos por clasificacion","Desde:".$_GET['FI']." A ".$_GET['FF']);
                            $pdf->AddPage();
                            $pdf->SetFont('Arial','',7);
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
                                    $pdf->Ln();
                                    $pdf->Cell(100,6,"No existen compras para esta clasificaicon en estas fechas",0,0);
                                }
                                $pdf->Ln(20);
                                $pdf->Output();
                                }else{
                                    $fileName = basename('fichero.xlsx');

                                    header('Content-disposition: attachment; filename="'.XLSXWriter::sanitize_filename($fileName).'"');
                                    header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
                                    header('Content-Transfer-Encoding: binary');
                                    header('Cache-Control: must-revalidate');
                                    header('Pragma: public');   
                                    $writer = new XLSXWriter();
                                    $writer->writeSheetRow('Sheet1', array("Compra de insumos por clasifiacion"));
                                    $writer->writeSheetRow('Sheet1', array("Desde:",$_GET['FI'], " A: ",$_GET['FF']) );
                                    $Resultado=$this->conexion->RCompraClasificacion($_GET['id'],$_GET['FI'],$_GET['FF']);
                                    $Clasificacion=$Resultado["Clasificacion"][0];
                                    $ventas=$Resultado["detalles"];
                                    $writer->writeSheetRow('Sheet1', array("Nombre del Clasificacion: ",$Clasificacion['concepto'],"Descripcion:",$Clasificacion['descripcion']));
                                    $writer->writeSheetRow('Sheet1', array("Nombre de Proveedor","factura","fecha","Nombre","unidad","cantidad","costo","importe"));
                                    foreach( $ventas as $row){ 
                                        $writer->writeSheetRow('Sheet1', array( $row[0],$row[1],$row[2],$row[3],$row[4],$row[5],$row[6],$row[7]));
                                    }
                                    $writer->writeToStdOut();
                            }
                    break;
                    
                    case 'RInusmosClasificacion':
                        if($_GET['tipo']=='PDF'){
                            $pdf = new PDF('L','mm','A4');
                            $pdf->setTitulos("insumos por clasificacion","");
                            $pdf->AddPage();
                            $pdf->SetFont('Arial','',7);
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
                                    $pdf->Ln();
                                    $pdf->Cell(100,6,"No existen insumos para esta clasificacion",0,0);
                                }
                                $pdf->Ln(20);
                                $pdf->Output();
                        }else{
                             $fileName = basename('fichero.xlsx');

                            header('Content-disposition: attachment; filename="'.XLSXWriter::sanitize_filename($fileName).'"');
                            header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
                            header('Content-Transfer-Encoding: binary');
                            header('Cache-Control: must-revalidate');
                            header('Pragma: public');   
                            $writer = new XLSXWriter();
                            $writer->writeSheetRow('Sheet1', array("Insumos por clasifiacion"));
                            $Resultado=$this->conexion->RInusmosClasificacion($_GET['id']);
                            $Clasificacion=$Resultado["Clasificacion"][0];
                            $detalles=$Resultado["detalles"];
                            $writer->writeSheetRow('Sheet1', array("Nombre del Clasificacion: ",$Clasificacion['concepto'],"Descripcion:",$Clasificacion['descripcion']));
                            $writer->writeSheetRow('Sheet1', array("nombre","descripcion","unidad","existencias","maximo","minimo","costo promedio"));
                            foreach( $detalles as $row){ 
                                $writer->writeSheetRow('Sheet1', array( $row['nombre'],$row["descripcion"],$row["unidad"],$row["existencias"],$row["maximo"],$row["minimo"],$row["costoPromedio"]));
                            }
                            $writer->writeToStdOut();
                        }
                    break;
                    
                    case 'ROrdenProduccion':
                             if($_GET['tipo']=='PDF'){
                            $pdf = new PDF('L','mm','A4');
                            $pdf->setTitulos("Orden de produccion","Desde:".$_GET['FI']." A ".$_GET['FF']);
                            $pdf->AddPage();
                            $pdf->SetFont('Arial','',7);
                            $Resultado=$this->conexion->ROrdenProduccion($_GET['FI'],$_GET['FF']);
                            $pdf->ln(15);
                            if(count($Resultado)!=0){ 
                                $pdf->Ln();
                                $pdf->SetLineWidth(0);
                                $pdf->Cell(15,7,"idOrden",1,0);
                                $pdf->Cell(40,7,"responsable",1,0);
                                $pdf->Cell(50,7,"planta Forestal",1,0);
                                $pdf->Cell(20,7,"fecha Orden",1,0);
                                $pdf->Cell(20,7,"fecha apoximada",1,0);
                                $pdf->Cell(30,7,"descripcion",1,0);
                                $pdf->Cell(22,7,"cantidad Esperada",1,0);
                                $pdf->Cell(22,7,"cantidad Lograda",1,0);
                                $pdf->Cell(22,7,"costo Produccion",1,0);
                                $pdf->Cell(22,7,"fecha Termino",1,0);
                                $pdf->Cell(20,7,"estado",1,0);
                                $pdf->Ln();
                                foreach( $Resultado as $row){  
                                    $pdf->Cell(15,7,$row[0],1,0);
                                    $pdf->Cell(40,7,$row[1],1,0);
                                    $pdf->Cell(50,7,$row[2],1,0);
                                    $pdf->Cell(20,7,$row[3],1,0);
                                    $pdf->Cell(20,7,$row[4],1,0);
                                    $pdf->Cell(30,7,$row[5],1,0);
                                    $pdf->Cell(22,7,$row[6],1,0);
                                    if($row[10]=="Terminado"){
                                        $pdf->Cell(22,7,$row[7],1,0);
                                        $pdf->Cell(22,7,$row[8],1,0);
                                        $pdf->Cell(22,7,$row[9],1,0);
                                    }else{
                                        $pdf->Cell(22,7,"--",1,0);
                                        $pdf->Cell(22,7,"--",1,0);
                                        $pdf->Cell(22,7,"--",1,0);
                                    }
                                    $pdf->Cell(20,7,$row[10],1,0);
                                    $pdf->Ln();
                                    }
                                }else{
                                    $pdf->Ln();
                                    $pdf->Cell(100,6,"No existen ordenes de produccion para esta fecha",0,0);
                                }
                                $pdf->Ln(20);
                                $pdf->Output();
                                }else{
                                    $fileName = basename('fichero.xlsx');

                                    header('Content-disposition: attachment; filename="'.XLSXWriter::sanitize_filename($fileName).'"');
                                    header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
                                    header('Content-Transfer-Encoding: binary');
                                    header('Cache-Control: must-revalidate');
                                    header('Pragma: public');   
                                    $writer = new XLSXWriter();
                                    $writer->writeSheetRow('Sheet1', array("Orden de produccion"));
                                    $writer->writeSheetRow('Sheet1', array("Desde:",$_GET['FI'], " A: ",$_GET['FF']) );

                                    $Resultado=$this->conexion->ROrdenProduccion($_GET['FI'],$_GET['FF']);
                                    $writer->writeSheetRow('Sheet1', array("idOrden","responsable","planta Forestal","fecha Orden","fecha apoximada","descripcion","cantidad Esperada","cantidad Lograda","costo Produccion","fecha Termino","estado"));
                                    foreach( $Resultado as $row){ 
                                        if($row[10]=="Terminado")
                                            $writer->writeSheetRow('Sheet1', array( $row[0],$row[1],$row[2],$row[3],$row[4],$row[5],$row[6],$row[7],$row[8],$row[9],$row[10]));
                                        else
                                            $writer->writeSheetRow('Sheet1', array( $row[0],$row[1],$row[2],$row[3],$row[4],$row[5],$row[6],"---","---","---",$row[10]));
                                    }
                                    $writer->writeToStdOut();
                            }
                    break;
 
                    case 'ROrdenProduccionEstados':
                             if($_GET['tipo']=='PDF'){
                            $pdf = new PDF('L','mm','A4');
                            $pdf->setTitulos("Orden de produccion por estado","Desde:".$_GET['FI']." A ".$_GET['FF']);
                            $pdf->AddPage();
                            $pdf->SetFont('Arial','',7);
                            $pdf->Cell(0,0,"Estado".$_GET['Estado']);
                            $Resultado=$this->conexion->ROrdenProduccionEstados($_GET['Estado'],$_GET['FI'],$_GET['FF']);
                            $pdf->ln(15);
                            if(count($Resultado)!=0){ 
                                if($_GET['Estado']=="Terminado"){
                                    $pdf->Ln();
                                    $pdf->SetLineWidth(0);
                                    $pdf->Cell(15,7,"idOrden",1,0);
                                    $pdf->Cell(40,7,"responsable",1,0);
                                    $pdf->Cell(50,7,"planta Forestal",1,0);
                                    $pdf->Cell(20,7,"fecha Orden",1,0);
                                    $pdf->Cell(20,7,"fecha apoximada",1,0);
                                    $pdf->Cell(50,7,"descripcion",1,0);
                                    $pdf->Cell(22,7,"cantidad Esperada",1,0);
                                    $pdf->Cell(22,7,"cantidad Lograda",1,0);
                                    $pdf->Cell(22,7,"costo Produccion",1,0);
                                    $pdf->Cell(22,7,"fecha Termino",1,0);
                                    $pdf->Ln();
                                    
                                    foreach( $Resultado as $row){  
                                        $pdf->Cell(15,7,$row[0],1,0);
                                        $pdf->Cell(40,7,$row[1],1,0);
                                        $pdf->Cell(50,7,$row[2],1,0);
                                        $pdf->Cell(20,7,$row[3],1,0);
                                        $pdf->Cell(20,7,$row[4],1,0);
                                        $pdf->Cell(50,7,$row[5],1,0);
                                        $pdf->Cell(22,7,$row[6],1,0);
                                        $pdf->Cell(22,7,$row[7],1,0);
                                        $pdf->Cell(22,7,$row[8],1,0);
                                        $pdf->Cell(22,7,$row[9],1,0);
                                        $pdf->Ln();
                                        }
                                    }else{   
                                        $pdf->Ln();
                                        $pdf->SetLineWidth(0);
                                        $pdf->Cell(15,7,"idOrden",1,0);
                                        $pdf->Cell(40,7,"responsable",1,0);
                                        $pdf->Cell(50,7,"planta Forestal",1,0);
                                        $pdf->Cell(20,7,"fecha Orden",1,0);
                                        $pdf->Cell(20,7,"fecha apoximada",1,0);
                                        $pdf->Cell(50,7,"descripcion",1,0);
                                        $pdf->Cell(22,7,"cantidad Esperada",1,0);
                                        $pdf->Ln();
                                        
                                        foreach( $Resultado as $row){  
                                            $pdf->Cell(15,7,$row[0],1,0);
                                            $pdf->Cell(40,7,$row[1],1,0);
                                            $pdf->Cell(50,7,$row[2],1,0);
                                            $pdf->Cell(20,7,$row[3],1,0);
                                            $pdf->Cell(20,7,$row[4],1,0);
                                            $pdf->Cell(50,7,$row[5],1,0);
                                            $pdf->Cell(22,7,$row[6],1,0);
                                            $pdf->Ln();
                                            }                                      
                                    }
                                }else{
                                    $pdf->Ln();
                                    $pdf->Cell(100,6,"No existen ordenes de produccion para estas fechas con este estado",0,0);
                                }
                                $pdf->Ln(20);
                                $pdf->Output();
                                }else{
                                    $fileName = basename('fichero.xlsx');

                                    header('Content-disposition: attachment; filename="'.XLSXWriter::sanitize_filename($fileName).'"');
                                    header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
                                    header('Content-Transfer-Encoding: binary');
                                    header('Cache-Control: must-revalidate');
                                    header('Pragma: public');   
                                    $writer = new XLSXWriter();
                                    $writer->writeSheetRow('Sheet1', array("Orden de produccion por estado"));
                                    $writer->writeSheetRow('Sheet1', array("Desde:",$_GET['FI'], " A: ",$_GET['FF']) );
                                    $writer->writeSheetRow('Sheet1', array("Estado:",$_GET['Estado']) );
                                    $Resultado=$this->conexion->ROrdenProduccionEstados($_GET['Estado'],$_GET['FI'],$_GET['FF']);
                                    if($_GET['Estado']=="Terminado"){
                                        $writer->writeSheetRow('Sheet1', array("idOrden","responsable","planta Forestal","fecha Orden","fecha apoximada","descripcion","cantidad Esperada","cantidad Lograda","costo Produccion","fecha Termino"));
                                        foreach( $Resultado as $row){ 
                                                $writer->writeSheetRow('Sheet1', array( $row[0],$row[1],$row[2],$row[3],$row[4],$row[5],$row[6],$row[7],$row[8],$row[9]));
                                        }
                                    }else{
                                        $writer->writeSheetRow('Sheet1', array("idOrden","responsable","planta Forestal","fecha Orden","fecha apoximada","descripcion","cantidad Esperada"));
                                        foreach( $Resultado as $row){ 
                                                $writer->writeSheetRow('Sheet1', array( $row[0],$row[1],$row[2],$row[3],$row[4],$row[5],$row[6]));
                                        }
                                    }
                                    $writer->writeToStdOut();
                            }
                    break;
 
                    case 'RValeSalidaOrdenProduccion':
                        if($_GET['tipo']=='PDF'){
                            $pdf = new PDF('L','mm','A4');
                            $pdf->setTitulos("Vale de salida por orden de prouduccion","Desde:".$_GET['FI']." A ".$_GET['FF']);
                            $pdf->AddPage();
                            $pdf->SetFont('Arial','',7);
                            $Resultado=$this->conexion->RValeSalidaOrdenProduccion($_GET['id'],$_GET['FI'],$_GET['FF']);
                            $Orden=$Resultado["Orden"][0];
                            $datos=$Resultado["detalles"];
                            $pdf->ln(10);
                            $pdf->Cell(0,0,"responsable:".$Orden['responsable']."  "."puesto:".$Orden['puesto']);                            
                            $pdf->ln(4);
                            $pdf->Cell(0,0,"planta:".$Orden['planta']."  "." descripcion:".$Orden['descripcion']);
                            $pdf->ln(4);
                            $pdf->Cell(0,0,"Fecha apoximada de termino:".$Orden['fechaAproxTermino']."  "." descripcion:".$Orden['descripcionOrden']."  "." cantidad Esperada:".$Orden['cantidadEsperada']);
                            $pdf->ln(5);
                            if(count($datos)!=0){ 
                                $pdf->Ln();
                                $pdf->SetLineWidth(0);
                                $pdf->Cell(40,7,"idVale",1,0);
                                $pdf->Cell(40,7,"fecha",1,0);
                                $pdf->Cell(40,7,"responsable",1,0);
                                $pdf->Cell(40,7,"nombre",1,0);
                                $pdf->Cell(40,7,"cantidad",1,0);
                                $pdf->Ln();
                                foreach( $datos as $row){  
                                    $pdf->Cell(40,7,$row['idVale'],1,0);
                                    $pdf->Cell(40,7,$row["fecha"],1,0);
                                    $pdf->Cell(40,7,$row["responsable"],1,0);
                                    $pdf->Cell(40,7,$row["nombre"],1,0);
                                    $pdf->Cell(40,7,$row["cantidad"],1,0);
                                    $pdf->Ln();
                                    }
                                }else{
                                    $pdf->Ln();
                                    $pdf->Cell(100,6,"No existen vales de salida para esta orden de produccion en esta fechas",0,0);
                                }
                                $pdf->Ln(20);
                                $pdf->Output();
                            }else{
                                    $fileName = basename('fichero.xlsx');

                                    header('Content-disposition: attachment; filename="'.XLSXWriter::sanitize_filename($fileName).'"');
                                    header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
                                    header('Content-Transfer-Encoding: binary');
                                    header('Cache-Control: must-revalidate');
                                    header('Pragma: public');   
                                    $writer = new XLSXWriter();
                                    $writer->writeSheetRow('Sheet1', array("Vale de salida por orden de prouduccion"));
                                    $writer->writeSheetRow('Sheet1', array("Desde:",$_GET['FI'], " A: ",$_GET['FF']) );
                                    $Resultado=$this->conexion->RValeSalidaOrdenProduccion($_GET['id'],$_GET['FI'],$_GET['FF']);
                                    $Orden=$Resultado["Orden"][0];
                                    $datos=$Resultado["detalles"];

                                    $writer->writeSheetRow('Sheet1', array("responsable:",$Orden['responsable'],"puesto:",$Orden['puesto']));
                                    $writer->writeSheetRow('Sheet1', array("planta:",$Orden['planta']," descripcion:",$Orden['descripcion']) );
                                    $writer->writeSheetRow('Sheet1', array("Fecha apoximada de termino:",$Orden['fechaAproxTermino']," descripcion:",$Orden['descripcionOrden']," cantidad Esperada:",$Orden['cantidadEsperada']) );
                    

                                        $writer->writeSheetRow('Sheet1', array("idVale","fecha","responsable","nombre","cantidad"));
                                        foreach( $datos as $row){ 
                                                $writer->writeSheetRow('Sheet1', array( $row["idVale"],$row["fecha"],$row["responsable"],$row["nombre"],$row["cantidad"]));
                                        }

                                    $writer->writeToStdOut();
                            }
                    break;
 
                    case 'RValeSalida':
                        if($_GET['tipo']=='PDF'){
                            $pdf = new PDF('L','mm','A4');
                            $pdf->setTitulos("Vale de salida","Desde:".$_GET['FI']." A ".$_GET['FF']);
                            $pdf->AddPage();
                            $pdf->SetFont('Arial','',7);
                            $Resultado=$this->conexion->RValeSalida($_GET['FI'],$_GET['FF']);
                            $pdf->ln(10);
                            if(count($Resultado)!=0){ 
                                $pdf->Ln();
                                $pdf->SetLineWidth(0);
                                $pdf->Cell(40,7,"idOrden",1,0);
                                $pdf->Cell(40,7,"descripcion",1,0);
                                $pdf->Cell(40,7,"idVale",1,0);
                                $pdf->Cell(40,7,"fecha",1,0);
                                $pdf->Cell(40,7,"responsable",1,0);
                                $pdf->Cell(40,7,"nombre",1,0);
                                $pdf->Cell(40,7,"cantidad",1,0);
                                $pdf->Ln();
                                foreach( $Resultado as $row){  
                                    $pdf->Cell(40,7,$row['idOrden'],1,0);
                                    $pdf->Cell(40,7,$row['descripcion'],1,0);
                                    $pdf->Cell(40,7,$row['idVale'],1,0);
                                    $pdf->Cell(40,7,$row["fecha"],1,0);
                                    $pdf->Cell(40,7,$row["responsable"],1,0);
                                    $pdf->Cell(40,7,$row["nombre"],1,0);
                                    $pdf->Cell(40,7,$row["cantidad"],1,0);
                                    $pdf->Ln();
                                    }
                                }else{
                                    $pdf->Ln();
                                    $pdf->Cell(100,6,"No existen vales de salida en estas fechas",0,0);
                                }
                                $pdf->Ln(20);
                                $pdf->Output();
                            }else{
                                    $fileName = basename('fichero.xlsx');

                                    header('Content-disposition: attachment; filename="'.XLSXWriter::sanitize_filename($fileName).'"');
                                    header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
                                    header('Content-Transfer-Encoding: binary');
                                    header('Cache-Control: must-revalidate');
                                    header('Pragma: public');   
                                    $writer = new XLSXWriter();
                                    $writer->writeSheetRow('Sheet1', array("Vale de salida por orden de prouduccion"));
                                    $writer->writeSheetRow('Sheet1', array("Desde:",$_GET['FI'], " A: ",$_GET['FF']) );
                                    $Resultado=$this->conexion->RValeSalida($_GET['FI'],$_GET['FF']);
                                    $writer->writeSheetRow('Sheet1', array("idOrden","descripcion","idVale","fecha","responsable","nombre","cantidad"));
                                    foreach( $Resultado as $row){ 
                                            $writer->writeSheetRow('Sheet1', array( $row["idOrden"],$row["descripcion"],$row["idVale"],$row["fecha"],$row["responsable"],$row["nombre"],$row["cantidad"]));
                                    }

                                    $writer->writeToStdOut();
                            }
                    break;

                    case 'RDevolucionOrdenProduccion':
                        if($_GET['tipo']=='PDF'){
                            $pdf = new PDF('L','mm','A4');
                            $pdf->setTitulos("Vale de salida por orden de prouduccion","Desde:".$_GET['FI']." A ".$_GET['FF']);
                            $pdf->AddPage();
                            $pdf->SetFont('Arial','',7);
                            $Resultado=$this->conexion->RDevolucionOrdenProduccion($_GET['id'],$_GET['FI'],$_GET['FF']);
                            $Orden=$Resultado["Orden"][0];
                            $datos=$Resultado["detalles"];
                            $pdf->ln(10);
                            $pdf->Cell(0,0,"responsable:".$Orden['responsable']."  "."puesto:".$Orden['puesto']);                            
                            $pdf->ln(4);
                            $pdf->Cell(0,0,"planta:".$Orden['planta']."  "." descripcion:".$Orden['descripcion']);
                            $pdf->ln(4);
                            $pdf->Cell(0,0,"Fecha apoximada de termino:".$Orden['fechaAproxTermino']."  "." descripcion:".$Orden['descripcionOrden']."  "." cantidad Esperada:".$Orden['cantidadEsperada']);
                            $pdf->ln(5);
                            if(count($datos)!=0){ 
                                $pdf->Ln();
                                $pdf->SetLineWidth(0);
                                $pdf->Cell(40,7,"idDevolucion",1,0);
                                $pdf->Cell(40,7,"fecha",1,0);
                                $pdf->Cell(40,7,"responsable",1,0);
                                $pdf->Cell(40,7,"nombre",1,0);
                                $pdf->Cell(40,7,"cantidad",1,0);
                                $pdf->Ln();
                                foreach( $datos as $row){  
                                    $pdf->Cell(40,7,$row['idDevolucion'],1,0);
                                    $pdf->Cell(40,7,$row["fecha"],1,0);
                                    $pdf->Cell(40,7,$row["responsable"],1,0);
                                    $pdf->Cell(40,7,$row["nombre"],1,0);
                                    $pdf->Cell(40,7,$row["cantidad"],1,0);
                                    $pdf->Ln();
                                    }
                                }else{
                                    $pdf->Ln();
                                    $pdf->Cell(100,6,"No existen vales de devolucion para esta orden de produccion en estas fechas",0,0);
                                }
                                $pdf->Ln(20);
                                $pdf->Output();
                            }else{
                                    $fileName = basename('fichero.xlsx');

                                    header('Content-disposition: attachment; filename="'.XLSXWriter::sanitize_filename($fileName).'"');
                                    header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
                                    header('Content-Transfer-Encoding: binary');
                                    header('Cache-Control: must-revalidate');
                                    header('Pragma: public');   
                                    $writer = new XLSXWriter();
                                    $writer->writeSheetRow('Sheet1', array("Vale de salida por orden de prouduccion"));
                                    $writer->writeSheetRow('Sheet1', array("Desde:",$_GET['FI'], " A: ",$_GET['FF']) );
                                    $Resultado=$this->conexion->RDevolucionOrdenProduccion($_GET['id'],$_GET['FI'],$_GET['FF']);
                                    $Orden=$Resultado["Orden"][0];
                                    $datos=$Resultado["detalles"];

                                    $writer->writeSheetRow('Sheet1', array("responsable:",$Orden['responsable'],"puesto:",$Orden['puesto']));
                                    $writer->writeSheetRow('Sheet1', array("planta:",$Orden['planta']," descripcion:",$Orden['descripcion']) );
                                    $writer->writeSheetRow('Sheet1', array("Fecha apoximada de termino:",$Orden['fechaAproxTermino']," descripcion:",$Orden['descripcionOrden']," cantidad Esperada:",$Orden['cantidadEsperada']) );
                    

                                        $writer->writeSheetRow('Sheet1', array("idDevolucion","fecha","responsable","nombre","cantidad"));
                                        foreach( $datos as $row){ 
                                                $writer->writeSheetRow('Sheet1', array( $row["idDevolucion"],$row["fecha"],$row["responsable"],$row["nombre"],$row["cantidad"]));
                                        }

                                    $writer->writeToStdOut();
                            }
                    break;
 
                    case 'RDevolucion':
                        if($_GET['tipo']=='PDF'){
                            $pdf = new PDF('L','mm','A4');
                            $pdf->setTitulos("Mermas","Desde:".$_GET['FI']." A ".$_GET['FF']);
                            $pdf->AddPage();
                            $pdf->SetFont('Arial','',7);
                            $Resultado=$this->conexion->RDevolucion($_GET['FI'],$_GET['FF']);
                            $pdf->ln(10);
                            if(count($Resultado)!=0){ 
                                $pdf->Ln();
                                $pdf->SetLineWidth(0);
                                $pdf->Cell(40,7,"idOrden",1,0);
                                $pdf->Cell(40,7,"descripcion",1,0);
                                $pdf->Cell(40,7,"idDevolucion",1,0);
                                $pdf->Cell(40,7,"fecha",1,0);
                                $pdf->Cell(40,7,"responsable",1,0);
                                $pdf->Cell(40,7,"nombre",1,0);
                                $pdf->Cell(40,7,"cantidad",1,0);
                                $pdf->Ln();
                                foreach( $Resultado as $row){  
                                    $pdf->Cell(40,7,$row['idOrden'],1,0);
                                    $pdf->Cell(40,7,$row['descripcion'],1,0);
                                    $pdf->Cell(40,7,$row['idDevolucion'],1,0);
                                    $pdf->Cell(40,7,$row["fecha"],1,0);
                                    $pdf->Cell(40,7,$row["responsable"],1,0);
                                    $pdf->Cell(40,7,$row["nombre"],1,0);
                                    $pdf->Cell(40,7,$row["cantidad"],1,0);
                                    $pdf->Ln();
                                    }
                                }else{
                                    $pdf->Ln();
                                    $pdf->Cell(100,6,"No existen vales de devolucion para estas fechas",0,0);
                                }
                                $pdf->Ln(20);
                                $pdf->Output();
                            }else{
                                    $fileName = basename('fichero.xlsx');

                                    header('Content-disposition: attachment; filename="'.XLSXWriter::sanitize_filename($fileName).'"');
                                    header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
                                    header('Content-Transfer-Encoding: binary');
                                    header('Cache-Control: must-revalidate');
                                    header('Pragma: public');   
                                    $writer = new XLSXWriter();
                                    $writer->writeSheetRow('Sheet1', array("Vale de salida por orden de prouduccion"));
                                    $writer->writeSheetRow('Sheet1', array("Desde:",$_GET['FI'], " A: ",$_GET['FF']) );
                                    $Resultado=$this->conexion->RValeSalida($_GET['FI'],$_GET['FF']);
                                    $writer->writeSheetRow('Sheet1', array("idOrden","descripcion","idDevolucion","fecha","responsable","nombre","cantidad"));
                                    foreach( $Resultado as $row){ 
                                            $writer->writeSheetRow('Sheet1', array( $row["idOrden"],$row["descripcion"],$row["idDevolucion"],$row["fecha"],$row["responsable"],$row["nombre"],$row["cantidad"]));
                                    }

                                    $writer->writeToStdOut();
                            }
                    break;  
                    
                    case 'RMerma':
                        if($_GET['tipo']=='PDF'){
                            $pdf = new PDF('L','mm','A4');
                            $pdf->setTitulos("Mermas","Desde:".$_GET['FI']." A ".$_GET['FF']);
                            $pdf->AddPage();
                            $pdf->SetFont('Arial','',7);
                            $Resultado=$this->conexion->RMermas($_GET['FI'],$_GET['FF']);
                            $pdf->ln(10);
                            if(count($Resultado)!=0){ 
                                $pdf->Ln();
                                $pdf->SetLineWidth(0);
                                $pdf->Cell(40,7,"fecha",1,0);
                                $pdf->Cell(40,7,"nombre",1,0);
                                $pdf->Cell(40,7,"nombre",1,0);
                                $pdf->Cell(40,7,"cantidad",1,0);
                                $pdf->Cell(40,7,"motivo",1,0);
                                $pdf->Ln();
                                foreach( $Resultado as $row){  
                                    $pdf->Cell(40,7,$row['fecha'],1,0);
                                    $pdf->Cell(40,7,$row['nombre'],1,0);
                                    $pdf->Cell(40,7,$row['nombre'],1,0);
                                    $pdf->Cell(40,7,$row["cantidad"],1,0);
                                    $pdf->Cell(40,7,$row["motivo"],1,0);
                                    $pdf->Ln();
                                    }
                                }else{
                                    $pdf->Ln();
                                    $pdf->Cell(100,6,"No existen mermas para estas fechas",0,0);
                                }
                                $pdf->Ln(20);
                                $pdf->Output();
                            }else{
                                    $fileName = basename('fichero.xlsx');

                                    header('Content-disposition: attachment; filename="'.XLSXWriter::sanitize_filename($fileName).'"');
                                    header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
                                    header('Content-Transfer-Encoding: binary');
                                    header('Cache-Control: must-revalidate');
                                    header('Pragma: public');   
                                    $writer = new XLSXWriter();
                                    $writer->writeSheetRow('Sheet1', array("Mermas"));
                                    $writer->writeSheetRow('Sheet1', array("Desde:",$_GET['FI'], " A: ",$_GET['FF']) );
                                    $Resultado=$this->conexion->RMermas($_GET['FI'],$_GET['FF']);
                                    $writer->writeSheetRow('Sheet1', array("fecha","nombre","nombre","cantidad","motivo"));
                                    foreach( $Resultado as $row){ 
                                            $writer->writeSheetRow('Sheet1', array( $row["fecha"],$row["nombre"],$row["nombre"],$row["cantidad"],$row["motivo"]));
                                    }

                                    $writer->writeToStdOut();
                            }
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




