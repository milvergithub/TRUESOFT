<?php
include 'clases/GestionDocumentos.php';
$gestionDL=new GestionDocumentos();
$codc=$gestionDL->dameUltimaConvocatoria();
$gestionDL->dameTodoDocumentosLectura($codc);
?>

