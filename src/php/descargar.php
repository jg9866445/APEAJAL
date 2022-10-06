
<?php

$file =$_SERVER['DOCUMENT_ROOT'] ."/src/ActaSituacionFiscal/". $_GET["file"] .".pdf";
header('Content-Type: application/pdf');
header('Content-Disposition: attachment; filename="Archivo.pdf"');
$imagpdf = file_put_contents($image, file_get_contents($file)); 
echo $imagepdf;
?>