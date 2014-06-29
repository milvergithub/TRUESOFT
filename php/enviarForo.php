<?php
session_start();
include '../clases/ConexionTIS.php';
include '../clases/GestionFiles.php';

$archivo = $_FILES["anexo"]['name'];
$origenDoc = $_FILES['anexo']['tmp_name'];
$contenido=$_POST['contenidoForo'];
$extencion=  strtolower(array_pop(explode(".", $archivo)));
$destino =  "../files/foro/archivoForo".$extencion;
$destinoReal="files/foro/archivoForo".$extencion;
$gestion=new GestionFiles();
$conexionforo=new ConexionTIS();
try {
   $conexionforo->foroEnviarForo($_SESSION['coduser'], $contenido, $destinoReal);
   $gestion->guardarDocumento($origenDoc, $destino);
} catch (Exception $exc) {
   
}


?>
