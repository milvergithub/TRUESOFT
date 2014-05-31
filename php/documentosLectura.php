<?php
include 'clases/GestionDocumentos.php';
$gestionDL=new GestionDocumentos();
$codc=$gestionDL->dameUltimaConvocatoria();
echo "<br/>codigoConv=".$codc;
$gestionDL->dameTodoDocumentosLectura($codc);
?>

