<?php
$cadena=$_POST['sql'];
include '../clases/GrupoEmpresas.php';
$ge=new GrupoEmpresa();
$ge->getSimilarEmpresas($cadena);
?>
