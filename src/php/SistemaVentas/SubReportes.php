<?php 

require_once($_SERVER['DOCUMENT_ROOT']."/src/php/auxiliar/log.php");
require_once($_SERVER['DOCUMENT_ROOT']."/src/php/SistemaVentas/Reportes.php");
require_once($_SERVER['DOCUMENT_ROOT']."/src/php/auxiliar/PDF.php");
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

                    case 'RSolicitudes':
                        if($_GET['tipo']=='PDF'){                        
                            $pdf = new PDF('L','mm','A4');
                            $pdf->setTitulos("Solicitudes","Desde:".$_GET['FI']." A ".$_GET['FF']);
                            $pdf->AddPage();
                            $pdf->SetFont('Arial','',7);
                            $ventas=$this->conexion->RSolicitudes($_GET['FI'],$_GET['FF']);
                            $pdf->ln(5);
                            if(count($ventas)!=0){ 
                                $pdf->Ln();
                                $pdf->SetLineWidth(0);
                                $pdf->SetWidths(array(25,25,60,60,25,25,25,25));
                                $pdf->Row(array("IdSolicitud","Fecha","Nombre del responable","Razon Social","IdPredio","Especie","Cantidad Solicitada","Precio"));
                                foreach( $ventas as $row){  
                                    $pdf->row($row);
                                    
                                    }
                                }else{
                                    $pdf->Ln();
                                    $pdf->Cell(100,6,"No existen solicitudes para estas fechas",0,0);
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
                                $writer->writeSheetRow('Sheet1', array("Solicitudes"));
                                $writer->writeSheetRow('Sheet1', array("Desde:",$_GET['FI'], " A: ",$_GET['FF']) );
                                $writer->writeSheetRow('Sheet1', array("IdSolicitud","Fecha","Nombre del responable","Razon Social","IdPredio","Especie","Cantidad Solicitada","Precio"));
                                $ventas=$this->conexion->RSolicitudes($_GET['FI'],$_GET['FF']);
                                foreach( $ventas as $row){ 
                                    $writer->writeSheetRow('Sheet1', array( $row[0],$row[1],$row[2],$row[3],$row[4],$row[5],$row[6],$row[7]));
                                }
                                $writer->writeToStdOut();
                        }
                    break;    

                    case 'RVentas':
                        if($_GET['tipo']=='PDF'){                        
                            $pdf = new PDF('L','mm','A4');
                            $pdf->setTitulos("Ventas","Desde:".$_GET['FI']." A ".$_GET['FF']);
                            $pdf->AddPage();
                            $pdf->SetFont('Arial','',7);
                            $ventas=$this->conexion->RVentas($_GET['FI'],$_GET['FF']);
                            $pdf->ln(5);
                            if(count($ventas)!=0){ 
                                $pdf->Ln();
                                $pdf->SetLineWidth(0);
                                $pdf->SetWidths(array(25,25,60,60,25,25,25,25));
                                $pdf->row(array("IdVenta","Fecha","Nombre del responable","Razon Social","IdPredio","Especie","Cantidad Solicitada","Precio"));
                                foreach( $ventas as $row){  
                                    $pdf->row($row);
                                    }
                                }else{
                                    $pdf->Ln();
                                    $pdf->Cell(100,6,"No existen Ventas para estas fechas",0,0);
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
                                $writer->writeSheetRow('Sheet1', array("Ventas"));
                                $writer->writeSheetRow('Sheet1', array("Desde:",$_GET['FI'], " A: ",$_GET['FF']) );
                                $writer->writeSheetRow('Sheet1', array("IdVenta","Fecha","Nombre del responable","Razon Social","IdPredio","Especie","Cantidad Solicitada","Precio"));
                                $ventas=$this->conexion->RVentas($_GET['FI'],$_GET['FF']);
                                foreach( $ventas as $row){ 
                                    $writer->writeSheetRow('Sheet1', array( $row[0],$row[1],$row[2],$row[3],$row[4],$row[5],$row[6],$row[7]));
                                }
                                $writer->writeToStdOut();
                        }
                    break;

                    case 'Rpago':
                        if($_GET['tipo']=='PDF'){                        
                            $pdf = new PDF('L','mm','A4');
                            $pdf->setTitulos("Pagos","Desde:".$_GET['FI']." A ".$_GET['FF']);
                            $pdf->AddPage();
                            $pdf->SetFont('Arial','',7);
                            $ventas=$this->conexion->Rpago($_GET['FI'],$_GET['FF']);
                            $pdf->ln(5);
                            if(count($ventas)!=0){ 
                                $pdf->Ln();
                                $pdf->SetLineWidth(0);
                                $pdf->SetWidths(array(25,60,60,25,25,60,25));
                                $pdf->row(array("idPago","Nombre Responsable","Razon Social","IdVenta","Fecha","Concepto General","Importe"));
                                foreach( $ventas as $row){  
                                    $pdf->row($row);
                                    }
                                }else{
                                    $pdf->Ln();
                                    $pdf->Cell(100,6,"No existen pagos para estas fechas",0,0);
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
                                $writer->writeSheetRow('Sheet1', array("Pagos"));
                                $writer->writeSheetRow('Sheet1', array("Desde:",$_GET['FI'], " A: ",$_GET['FF']) );
                                $writer->writeSheetRow('Sheet1', array("idPago","Nombre Responsable","Razon Social","IdVenta","Fecha","Concepto General","Importe"));
                                $ventas=$this->conexion->Rpago($_GET['FI'],$_GET['FF']);
                                foreach( $ventas as $row){ 
                                    $writer->writeSheetRow('Sheet1', array( $row[0],$row[1],$row[2],$row[3],$row[4],$row[5],$row[6]));
                                }
                                $writer->writeToStdOut();
                        }
                    break;

                    case 'Rsalida':
                        if($_GET['tipo']=='PDF'){                        
                            $pdf = new PDF('L','mm','A4');
                            $pdf->setTitulos("Salidas","Desde:".$_GET['FI']." A ".$_GET['FF']);
                            $pdf->AddPage();
                            $pdf->SetFont('Arial','',7);
                            $ventas=$this->conexion->Rsalida($_GET['FI'],$_GET['FF']);
                            $pdf->ln(5);
                            if(count($ventas)!=0){ 
                                $pdf->Ln();
                                $pdf->SetLineWidth(0);
                                $pdf->SetWidths(array(25,40,60,60,25,25,25));
                                $pdf->row(array("idSalida","Nombre del responsable","idPago","Fecha","idPredio","Especie","Cantidad Surtida"));

                                foreach( $ventas as $row){  
                                    $pdf->row($row);
                                    }
                                }else{
                                    $pdf->Ln();
                                    $pdf->Cell(100,6,"No existen salidas para estas fechas",0,0);
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
                                $writer->writeSheetRow('Sheet1', array("Salidas"));
                                $writer->writeSheetRow('Sheet1', array("Desde:",$_GET['FI'], " A: ",$_GET['FF']) );
                                $writer->writeSheetRow('Sheet1', array("idSalida","Nombre del responsable","idPago","Fecha","idPredio","Especie","Cantidad Surtida"));
                                $ventas=$this->conexion->Rsalida($_GET['FI'],$_GET['FF']);
                                foreach( $ventas as $row){ 
                                    $writer->writeSheetRow('Sheet1', array( $row[0],$row[1],$row[2],$row[3],$row[4],$row[5],$row[6]));
                                }
                                $writer->writeToStdOut();
                        }
                    break;

                    case 'RMermas':
                        if($_GET['tipo']=='PDF'){                        
                            $pdf = new PDF('L','mm','A4');
                            $pdf->setTitulos("Mermas","Desde:".$_GET['FI']." A ".$_GET['FF']);
                            $pdf->AddPage();
                            $pdf->SetFont('Arial','',7);
                            $ventas=$this->conexion->RMermas($_GET['FI'],$_GET['FF']);
                            $pdf->ln(5);
                            if(count($ventas)!=0){ 
                                $pdf->Ln();
                                $pdf->SetLineWidth(0);
                                $pdf->SetWidths(array(25,60,60,25,40,25));
                                $pdf->row(array("Fecha","Nombre responsable","Especie","Cantidad","Motivo","Motivo Merma"));
                                foreach( $ventas as $row){  
                                    $pdf->row($row);
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
                                $writer->writeSheetRow('Sheet1', array("Fecha","Nombre responsable","Especie","Cantidad","Motivo","Motivo Merma"));
                                $ventas=$this->conexion->RMermas($_GET['FI'],$_GET['FF']);
                                foreach( $ventas as $row){ 
                                    $writer->writeSheetRow('Sheet1', array( $row[0],$row[1],$row[2],$row[3],$row[4],$row[5]));
                                }
                                $writer->writeToStdOut();
                        }
                    break;

                    case 'RInventarioFisicio':
                        if($_GET['tipo']=='PDF'){                        
                            $pdf = new PDF('L','mm','A4');
                            $pdf->setTitulos("Inventario Fisico","");
                            $pdf->AddPage();
                            $pdf->SetFont('Arial','',7);
                            $ventas=$this->conexion->RInventarioFisicio();
                            $pdf->ln(5);
                            if(count($ventas)!=0){ 
                                $pdf->Ln();
                                $pdf->SetLineWidth(0);
                                $pdf->SetWidths(array(25,60,60,25,25));
                                $pdf->row(array("IdPlanta","Especie","Descripcion","Existencia","Precio"));
                                foreach( $ventas as $row){  
                                    $pdf->row($row);
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
                                $writer->writeSheetRow('Sheet1', array("Salidas"));
                                $writer->writeSheetRow('Sheet1', array("IdPlanta","Especie","Descripcion","Existencia","Precio"));
                                $ventas=$this->conexion->RInventarioFisicio();
                                foreach( $ventas as $row){ 
                                    $writer->writeSheetRow('Sheet1', array( $row[0],$row[1],$row[2],$row[3],$row[4]));
                                }
                                $writer->writeToStdOut();
                        }
                    break;  

                    case 'RInventarioVirtual':
                        if($_GET['tipo']=='PDF'){                        
                            $pdf = new PDF('L','mm','A4');
                            $pdf->setTitulos("Inventario Virtual","");
                            $pdf->AddPage();
                            $pdf->SetFont('Arial','',7);
                            $ventas=$this->conexion->RInventarioVirtual();
                            $pdf->ln(5);
                            if(count($ventas)!=0){ 
                                $pdf->Ln();
                                $pdf->SetLineWidth(0);
                                $pdf->SetWidths(array(25,60,60,25,25));
                                $pdf->row(array("IdPlanta","Especie","Descripcion","Existencia","Precio"));
                                foreach( $ventas as $row){
                                    $row[3]=$row[4]=="null"?$row[3]:$row[3]-$row[4];
                                    $pdf->row(array($row[0],$row[1],$row[2],$row[3],$row[5]));  
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
                                $writer->writeSheetRow('Sheet1', array("Salidas"));
                                $writer->writeSheetRow('Sheet1', array("IdPlanta","Especie","Descripcion","Existencia"));
                                $ventas=$this->conexion->RInventarioVirtual();
                                foreach( $ventas as $row){ 
                                    $row[3]=$row[4]=="null"?$row[3]:$row[3]-$row[4];
                                    $writer->writeSheetRow('Sheet1', array( $row[0],$row[1],$row[2],$row[3],$row[5]));
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
