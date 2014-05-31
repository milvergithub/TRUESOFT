<?php
include 'clases/GestionDocumentos.php';
$gestioDoc=new GestionDocumentos();
$codc=$gestioDoc->dameUltimaConvocatoria();
echo "<br>codConv=".$codc;
$gestioDoc->dameTodoDocumentosConvActual($codc);

?>
