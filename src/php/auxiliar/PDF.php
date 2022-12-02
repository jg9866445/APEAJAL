<?php
require_once($_SERVER['DOCUMENT_ROOT']."/src/Lib/fpdf/fpdf.php");

class PDF extends FPDF
{  
    public $nombre;
    public $datos;

    function setTitulos($nombre,$datos){
        $this->nombre = $nombre;
        $this->datos = $datos;
    }

    function Cell( $w, $h = 0, $t = '', $b = 0, $l = 0, $a = '', $f = false, $y = '' ) {

    parent::Cell( $w, $h, iconv( 'UTF-8', 'windows-1252', $t ), $b, $l, $a, $f, $y );

    }
// Cabecera de página
    function Header()
    {
        $this->Image($_SERVER['DOCUMENT_ROOT'].'/src/imagenes/Logo.jpeg', 0, 0, 35, 35);
        $this->SetFont('Arial','B',5);
        //$this->Cell(80);
        $this->Cell(500,0,"Fecha de impresion:".date("Y-m-d H:i:s"),0,0,'C');
        $this->SetFont('Arial','B',25);
        $this->ln(1);
        $this->Cell(80);
        $this->Cell(130,15,$this->nombre,0,0,'C');
        $this->SetFont('Arial','B',10);
        $this->ln(10);
        $this->Cell(80);
        $this->Cell(130,15,$this->datos,0,0,'C');
        // Salto de línea
        $this->Ln(1);
        $this->SetLineWidth(.5);
        $this->Line(0,35,$this->GetPageWidth(),35);
        $this->Ln(9);

    }

    // Pie de página
    function Footer()
    {
        // Posición: a 1,5 cm del final
        $this->SetY(-15);
        // Arial italic 8
        $this->SetFont('Arial','I',8);
        // Número de página
        $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
        $this->AliasNbPages();

    }

}