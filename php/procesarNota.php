<?php
include '../clases/ConexionTIS.php';

$conexINA=new ConexionTIS();
$conexINA->insertarNotaArchivosEntrega($_POST['codigoArchivo'], $_POST['codigoIntegrante'], $_POST['nota']);
echo $_POST['nota'];
?>
