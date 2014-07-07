<?php
include 'clases/GestionDocumentos.php';
$gestioDoc=new GestionDocumentos();
$codc=$gestioDoc->dameUltimaConvocatoria();
$gestioDoc->dameTodoDocumentosConvActual($codc);

?>
